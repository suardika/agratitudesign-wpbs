<?php
/**
 * agratitudesign_telaga enqueue scripts
 *
 * @package agratitudesign_telaga
 */

function wp_bootstrap_starter_scripts() {

    wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.purify.min.css' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.purify.min.css' );
    wp_enqueue_style( 'Lora_font', '//fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Poppins:300,400,500,600,700');
    wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/css/animate.purify.min.css' );
    wp_enqueue_style( 'themestyle-css', get_template_directory_uri() . '/assets/css/themestyle.purify.min.css' );

    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/assets/js/html5.js', array(), '', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'jquery_js', get_template_directory_uri() . '/assets/js/jquery.slim.min.js', '', '', true );
    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery_js'), '', true );
    wp_enqueue_script( 'popper_js', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery_js'), '', true );
    wp_enqueue_script( 'googlemap_js', '//maps.googleapis.com/maps/api/js', '', '', true );

    wp_enqueue_script( 'jquery-easing_js', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array('jquery_js'), '', true );
    wp_enqueue_script( 'wow_js', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery_js'), '', true );
    wp_enqueue_script( 'owl-carousel_js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery_js'), '', true );
    wp_enqueue_script( 'superfish_js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(''), '', true );
    wp_enqueue_script( 'skip-link-focus-fix_js', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '', true );
    wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/assets/js/theme-script.min.js', array(''), '', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_starter_scripts' );


