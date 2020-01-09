<?php
/**
 * Funstions relating to forms and their processing.
 *
 * Relevant docs:
 * https://docs.gravityforms.com/
 *
 * @package  WordPress
 * @subpackage  Starter Theme
 */

/**
 * Remove tabindex from any gravity forms for accessiblity.
 */
add_filter( 'gform_tabindex', '__return_false' );
