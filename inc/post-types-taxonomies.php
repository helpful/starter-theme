<?php
/**
 * Register custom post types, taxonomies, and related functions.
 *
 * Relevant docs:
 * https://github.com/johnbillion/extended-cpts
 * https://developer.wordpress.org/reference/functions/register_post_type/
 * https://developer.wordpress.org/reference/functions/register_taxonomy/
 *
 * @package  WordPress
 * @subpackage  Starter Theme
 */

/**
 * Register post types and taxonomies.
 */
/*add_action( 'init', function () {

	register_extended_post_type(
		'resource',
		[
			'has_archive'     => false,
			'capability_type' => 'post',
			'menu_icon'       => 'dashicons-media-text',
			'supports'        => [ 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ],
			'admin_cols'      => [
				'xxx'         => [
					'title'    => 'Xxx',
					'taxonomy' => 'xxx',
				],
				'xxx'          => [
					'post_field' => 'post_date',
					'default'    => 'DESC',
				],
			],
			'admin_filters'   => [
				'xxx'         => [
					'title'    => 'Xxx',
					'taxonomy' => 'xxx',
				],
			],
		],
		[
			'singular' => 'Xxx',
			'plural'   => 'Xxxs',
			'slug'     => 'xxx'
		]
	);

	register_extended_taxonomy(
		'xxx', // Slug.
		[
			'xxx', // Post type(s) to apply to.
		],
		[
			'hierarchical' => false,
		],
		[
			'singular' => 'Xxx',
			'plural'   => 'Xxxs',
			'slug'     => 'xxx',
		]
	);

} );*/




/**
 * Change dashboard Posts to News
 */
/*function starter_theme_change_post_labels() {
	$get_post_type              = get_post_type_object( 'post' );
	$labels                     = $get_post_type->labels;
	$labels->name               = 'News';
	$labels->singular_name      = 'News';
	$labels->add_new            = 'Add News';
	$labels->add_new_item       = 'Add News';
	$labels->edit_item          = 'Edit News';
	$labels->new_item           = 'News';
	$labels->view_item          = 'View News';
	$labels->search_items       = 'Search News';
	$labels->not_found          = 'No News found';
	$labels->not_found_in_trash = 'No News found in Trash';
	$labels->all_items          = 'All News';
	$labels->menu_name          = 'News';
	$labels->name_admin_bar     = 'News';
}
add_action( 'init', 'starter_theme_change_post_labels' );*/
