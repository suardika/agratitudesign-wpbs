<?php
/**
 * Agratitudesign WPBS4 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Agratitudesign WPBS4
 */

if ( ! function_exists( 'agratitudesign_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function agratitudesign_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Agratitudesign WPBS4, use a find and replace
	 * to change 'agratitudesign' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'agratitudesign', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support('post-thumbnails');
	add_image_size('bloglistImg', 350, 195, true);
	add_image_size('postImg', 730, 245, true);
	// add_image_size('sliderImg', 1920, 1080, true);

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'agratitudesign' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'agratitudesign_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

}
endif;
add_action( 'after_setup_theme', 'agratitudesign_setup' );

function agratitudesign_custom_logo_setup() {
    $defaults = array(
        'height'      => 200,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'agratitudesign_custom_logo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function agratitudesign_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'agratitudesign_content_width', 640 );
}
add_action( 'after_setup_theme', 'agratitudesign_content_width', 0 );

/**
 * Add mu-plugin Scritps
 */
require get_template_directory() . '/inc/mu-plugin.php';

/**
 * Add CSS/JS Scritps
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Add breadcrumb Scritps
 */
require_once get_template_directory() . '/inc/bootstrap-breadcrumb.php';

/**
 * Add pagination Scritps
 */
require_once get_template_directory() . '/inc/bootstrap-pagination.php';

/**
 * Register Widget Areas
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load plugin compatibility file.
 */
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';

/**
 * Bootstrap Walker.
 */
require_once get_template_directory() . '/inc/bootstrap-walker.php';

