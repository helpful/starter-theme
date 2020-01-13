<?php
/**
 * Core functions
 *
 * @package  WordPress
 * @subpackage  Starter Theme
 */

/**
 * Load vendors.
 */
require_once get_template_directory() . '/vendor/autoload.php';

/**
 * Initialise Timber.
 */
$timber = new Timber\Timber();


/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function( $template ) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class starter_theme_Site extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		parent::__construct();
	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 *
	 * @return string
	 */
	public function add_to_context( $context ) {
		$context['menu']             = new Timber\Menu( 'primary' );
		$context['menu_footer']      = new Timber\Menu( 'footer' );
		/*$context['sidebar']          = Timber::get_widgets( 'sidebar' );
		$context['footer_left']      = Timber::get_widgets( 'footer_left' );
		$context['footer_middle']    = Timber::get_widgets( 'footer_middle' );
		$context['footer_right']     = Timber::get_widgets( 'footer_right' );*/
		$context['site']             = $this;
		$context['site']->login_url  = wp_login_url( get_permalink() );
		$context['site']->logout_url = wp_logout_url( $context['site']->url );
		$context['logged_in']        = is_user_logged_in();
		$context['current_user']     = new Timber\User();

		return $context;
	}

	public function theme_supports() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}

	public function register_menus() {
		register_nav_menus(
			[
				'primary' => 'Main',
				'footer'  => 'Footer',
			]
		);
	}

	/**
	 * Enqueue scripts and styles.
	 */
	public function enqueue_scripts() {
		// Styles.
		wp_enqueue_style( 'starter-theme-main', get_template_directory_uri() . '/assets/css/main.css', [], filemtime( get_template_directory() . '/assets/css/main.css' ) );
		//wp_enqueue_style( 'starter-theme-style', get_stylesheet_uri() );

		// Scripts.
		wp_enqueue_script( 'starter-theme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', [ 'jquery' ], '', true );
		wp_enqueue_script( 'starter-theme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', [ 'jquery' ], '', true );
		wp_enqueue_script( 'starter-theme-validation', get_template_directory_uri() . '/assets/js/validation.js', [ 'jquery' ], '', true );
		wp_enqueue_script( 'starter-theme-imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.js', [ 'jquery' ], '', true );

		wp_enqueue_script( 'starter-theme-main', get_template_directory_uri() . '/assets/js/main.js', [ 'jquery' ], filemtime( get_template_directory() . '/assets/js/main.js' ), true );

	}

}
new starter_theme_Site();




/**
 * Custom Post types and Taxonomies.
 */
require_once 'inc/post-types-taxonomies.php';

/**
 * Custom fields.
 */
require_once 'inc/custom-fields.php';

/**
 * Forms.
 */
require_once 'inc/forms.php';

/**
 * User roles.
 */
require_once 'inc/user-roles.php';

/**
 * Post type archive filtering.
 */
require_once 'inc/archive-filters.php';

/**
 * Functions for use in templates.
 */
require_once 'inc/template-functions.php';
