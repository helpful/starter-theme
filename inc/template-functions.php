<?php
/**
 * Utility functions for use in templates.
 *
 * @package  WordPress
 * @subpackage  Starter Theme
 */

/**
 * Get taxonomy term IDs that exist against given post type(s).
 *
 * @param  string/array $taxonomies Taxonomy(ies) to query.
 * @param  string/array $post_types Post type(s) to query.
 * @return array                    Array of relevant term_ids.
 */
function starter_theme_terms_used_by_post_type( $taxonomies, $post_types ) {

	$term_ids = [];
	$cache_key = md5( implode( ',', (array) $taxonomies ) . implode( ',',  (array) $post_types ) );

	if ( false === ( $term_ids = get_transient( $cache_key ) ) ) {

		global $wpdb;
		$post_types = array_map( 'esc_sql', (array) $post_types );
		$post_types = "'" . implode( "', '", $post_types ) . "'";
		$taxonomies = array_map( 'esc_sql', (array) $taxonomies );
		$taxonomies = "'" . implode( "', '", $taxonomies ) . "'";

		$term_ids = $wpdb->get_col(
			"
			SELECT t.term_id
			from $wpdb->terms AS t
			INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id
			INNER JOIN $wpdb->term_relationships AS r ON r.term_taxonomy_id = tt.term_taxonomy_id
			INNER JOIN $wpdb->posts AS p ON p.ID = r.object_id
			WHERE
				p.post_type IN (
					{$post_types}
				)
				AND tt.taxonomy IN (
					{$taxonomies}
				)
			GROUP BY t.term_id
			"
		);

		if ( ! empty( $term_ids ) ) {
			set_transient( $cache_key, $term_ids );
		}
	}

	return $term_ids;
}




/**
 * Get list of years that items published against given post type(s).
 *
 * @param  string/array $post_types Post type(s) to query.
 * @return array                    Array of relevant term_ids.
 */
function starter_theme_years_post_type_published( $post_types ) {

	$years = [];
	$cache_key = md5( implode( ',',  (array) $post_types ) );

	if ( false === ( $term_ids = get_transient( $cache_key ) ) ) {

		global $wpdb;
		$post_types = array_map( 'esc_sql', (array) $post_types );
		$post_types = "'" . implode( "', '", $post_types ) . "'";

		$term_ids = $wpdb->get_col(
			"
			SELECT DISTINCT( YEAR( post_date ) ) AS 'year'
			FROM wp_posts
			WHERE post_type IN ( {$post_types} )
			ORDER BY YEAR( post_date ) DESC
			"
		);

		if ( ! empty( $years ) ) {
			set_transient( $cache_key, $years );
		}
	}

	return $years;
}
