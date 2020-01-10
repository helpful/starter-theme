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
		'event',
		[
			'has_archive'      => false,
			'capability_type'  => 'post',
			'menu_icon'        => 'dashicons-calendar-alt',
			'supports'         => [ 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author' ],
			'delete_with_user' => false,
			//'rewrite'        => [
			//	'permastruct' => '/xxx/%event%' // Set xxx if you need it to be different to the slug.
			//],
			'admin_cols'       => [
				'logo' => [
					'title'          => 'Logo',
					'featured_image' => 'thumbnail', // Image size to use.
					'width'          => 50,
					'height'         => 50,
				],
				'location'         => [
					'title'    => 'Location',
					'taxonomy' => 'location',
				],
				'event_date' => [
					'title'    => 'Event date',
					'meta_key' => 'event_date',
				],
				'date'          => [
					'title'      => 'Publish date',
					'post_field' => 'post_date',
					'default'    => 'DESC',
				],
			],
			'admin_filters'   => [
				'location'         => [
					'title'    => 'Location',
					'taxonomy' => 'location',
				],
			],
		],
		[
			'singular' => 'Event',
			'plural'   => 'Events',
			'slug'     => 'event'
		]
	);

	register_extended_taxonomy(
		'location', // Slug.
		[
			'event', // Post type(s) to apply to.
		],
		[
			//'meta_box'     => 'radio', // Set to customise interface - options: false, 'simple', 'radio', 'dropdown' - latter 2 allow single value to be selected only.
			'hierarchical' => false,
			//'required'     => false // Set to enforce selection.
		],
		[
			'singular' => 'Location',
			'plural'   => 'Locations',
			'slug'     => 'location',
		]
	);

} );*/




/**
 * Re-label Posts as News in wp-admin.
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




/**
 * Re-label Tags to Themes in wp-admin (to match front-end).
 */
/*function starter_theme_label_tags_themes() {
	global $wp_taxonomies;
	$labels = &$wp_taxonomies['post_tag']->labels;
	$labels->name = 'Themes';
	$labels->singular_name = 'Themes';
	$labels->search_items = 'Search themes';
	$labels->all_items = 'Themes';
	$labels->separate_items_with_commas = 'Separate themes with commas';
	$labels->choose_from_most_used = 'Choose from the most used themes';
	$labels->popular_items = 'Popular themes';
	$labels->edit_item = 'Edit theme';
	$labels->view_item = 'View theme';
	$labels->update_item = 'Update theme';
	$labels->add_new_item = 'Add new theme';
	$labels->new_item_name = 'New theme';
	$labels->add_or_remove_items = 'Add or remove theme';
	$labels->not_found = 'Theme not found';
	$labels->no_terms = 'No themes';
	$labels->items_list_navigation = 'Themes list navigation';
	$labels->items_list = 'List of themes';
	$labels->back_to_items = '← Back to themes';
	$labels->menu_name = 'Themes';
}
add_action( 'init', 'starter_theme_label_tags_themes' );*/
