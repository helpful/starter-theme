<?php
/**
 * Archive filtering functions.
 *
 * Relevant docs:
 * https://developer.wordpress.org/reference/hooks/pre_get_posts/
 * https://developer.wordpress.org/reference/hooks/parse_tax_query/
 *
 * @package  WordPress
 * @subpackage  Starter Theme
 */

/**
 * Enable filters on native archive pages.
 * Currently taxonomy archives.
 * This handles basic filters, taxonomies handled in seperate function.
 *
 * @param  object $query WP_Query object.
 * @return object        Modified WP_Query object.
 */
/*function starter_theme_taxonomy_archive_basic_filters( $query ) {

	// Make sure we only touch the query we mean to.
	if ( ! is_admin() ) {
		if ( $query->is_tax() && $query->is_main_query() ) {

			// Keyword search.
			$filter_keyword = '';
			if ( ! empty( $_GET['fkeyword'] ) ) {
				$filter_keyword = filter_input( INPUT_GET, 'fkeyword', FILTER_SANITIZE_STRING );
				$query->set( 's', $filter_keyword );
			}

			// Post type.
			$filter_type = '';
			if ( ! empty( $_GET['ftype'] ) ) {
				$filter_type = filter_input( INPUT_GET, 'ftype', FILTER_SANITIZE_STRING );
				$query->set( 'post_type', $filter_type );
			}

			// Year.
			$filter_year = '';
			if ( ! empty( $_GET['fyear'] ) ) {
				$filter_year = filter_input( INPUT_GET, 'fyear', FILTER_SANITIZE_NUMBER_INT );
				$query->set( 'year', $filter_year );
			}
		}
	}

	return $query;
}
add_filter( 'pre_get_posts', 'starter_theme_taxonomy_archive_basic_filters' );*/




/**
 * Enable taxonomy filters on native archive pages.
 * Currently taxonomy archives.
 * Basic filters handled in seperate function.
 *
 * @param  object $query WP_Query object.
 * @return object        Modified WP_Query object.
 */
/*function starter_theme_taxonomy_archive_taxonomy_filters( $query ) {

	// Make sure we only touch the query we mean to.
	if ( ! is_admin() ) {
		if ( $query->is_tax() && ! $query->is_main_query() ) {

			// Location taxonomy.
			if ( ! empty( $_GET['flocation'] ) ) {
				$filter_location             = filter_input( INPUT_GET, 'flocation', FILTER_SANITIZE_STRING );
				$tax_query                   = [
					'taxonomy' => 'location',
					'field'    => 'slug',
					'terms'    => $filter_location,
					'operator' => 'IN',
				];
				$query->tax_query->queries[] = $tax_query;
			}

			// Topic taxonomy.
			if ( ! empty( $_GET['ftopic'] ) ) {
				$filter_topic                = filter_input( INPUT_GET, 'ftopic', FILTER_SANITIZE_STRING );
				$tax_query                   = [
					'taxonomy' => 'topic',
					'field'    => 'slug',
					'terms'    => $filter_topic,
					'operator' => 'IN',
				];
				$query->tax_query->queries[] = $tax_query;
			}

		}
	}

	return $query;
}
add_action( 'parse_tax_query', 'starter_theme_taxonomy_archive_taxonomy_filters', 0 );*/
