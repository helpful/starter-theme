<?php
/**
 * Template name: Events listing.
 * Template Post Type: page // Add other CPT slugs to allow use there.
 *
 * @package  WordPress
 * @subpackage  Starter Theme
 */

$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;

$events = [
	'post_type'      => [ 'event' ],
	'posts_per_page' => -1,
	'order'          => 'ASC',
	'page'           => get_query_var( 'paged', 1 ),
];
$context['events']    = Timber::get_posts( $events );
$context['locations'] = wp_list_pluck( get_terms( [ 'taxonomy' => 'location' ] ), 'name', 'slug' );

Timber::render( array( 'template-events.twig', 'page.twig' ), $context );
