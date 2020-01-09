<?php
/**
 * Register custom user roles.
 *
 * Relevant docs:
 * https://developer.wordpress.org/reference/functions/add_role/
 *
 * @package  WordPress
 * @subpackage  Starter Theme
 */

/**
 * Register custom roles for front end only user type.
 */
function starter_theme_register_front_end_user() {

	add_role(
		'member',
		'Member',
		[
			'read' => true,
			'level_1' => true,
		]
	);

}
add_action( 'after_setup_theme', 'starter_theme_register_front_end_user' );




/**
 * Hide the admin bar for front end only user roles.
 */
function starter_theme_hide_admin_bar() {
	if ( ! current_user_can( 'edit_posts' ) && ! is_admin() ) {
		show_admin_bar( false );
	}
}
add_action( 'after_setup_theme','starter_theme_hide_admin_bar' );




/**
 * Don't let front end users into wp-admin.
 */
function starter_theme_protect_wpadmin() {
	if ( is_admin() && ! current_user_can( 'edit_posts' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
		wp_redirect( home_url() );
		exit;
	}
}
add_action( 'admin_init', 'starter_theme_protect_wpadmin' );
