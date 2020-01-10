<?php
/**
 * Template name: Flexible content.
 * Template Post Type: page // Add other CPT slugs to allow use there.
 *
 * @package  WordPress
 * @subpackage  Starter Theme
 */

$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'template-flexible.twig', 'page.twig' ), $context );
