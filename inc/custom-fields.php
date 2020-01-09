<?php
/**
 * Register ACF custom meta fields.
 *
 * Relevant docs:
 * https://github.com/StoutLogic/acf-builder
 * https://www.advancedcustomfields.com/resources/
 *
 * @package  WordPress
 * @subpackage  Starter Theme
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Prevent WP loading the list of all meta fields to improve performance.
 * Since we're using ACF it's redundant.
 */
add_filter( 'acf/settings/remove_wp_meta_box', '__return_true' );




/**
 * Register theme options page.
 */
/*if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		[
			'page_title' 	=> 'Theme Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-settings',
			'capability'	=> 'list_users',
		]
	);
}*/




/**
 * Modify TinyMCE editor to remove H1 and H2.
 *
 * @param array $init  TinyMCE parameters.
 * @return array $init TinyMCE parameters.
 */
function starter_theme_tinymce_remove_h1_h2( $init ) {
	$init['block_formats'] = 'Paragraph=p;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre';
	return $init;
}
add_filter( 'tiny_mce_before_init', 'starter_theme_tinymce_remove_h1_h2' );




/**
 * Define field groups.
 */
/*$field_group_one = new FieldsBuilder( 'field_group_one_slug',[
	'style'      => 'seamless',
	'position'   => 'acf_after_title',
	'menu_order' => 0,
] );
$field_group_one
	->addCheckbox( 'synchronize',[
		'label'         => 'Member role',
		'choices'       => [
			'not' => 'Preserve Member role',
		],
		'return_format' => 'value',
		'layout'        => 'horizontal',
	] )
	->setLocation( 'user_form','==','all' )
	->and( 'current_user_role','==','administrator' )
	->and( 'user_role','==','member' )
	->or( 'user_role','==','follower' );*/

/**
 * Register and create fields.
 */
/*$acf_fields = [
	$field_group_one,
];
add_action( 'acf/init', function () use ( $acf_fields ) {
	foreach ( $acf_fields as $acf_field ) {
		if ( $acf_field instanceof FieldsBuilder ) {
			acf_add_local_field_group( $acf_field->build() );
		}
	}
} );*/
