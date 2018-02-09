<?php
/**
 * Enqueue scripts and styles.
 *
 * @package agratitudesign_telaga
 * 
 */

function agratitudesign_scripts() {
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'Lora_font', '//fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Poppins:300,400,500,600,700');
    wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyBh9b1rNCp6kOi5JeMHiRP4klDymBeoEWk', NULL, '1.0', true);
    wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.css' );
    wp_enqueue_style( 'ekko-lightbox_css', get_template_directory_uri() . '/assets/css/ekko-lightbox.css' );
    wp_enqueue_style( 'themestyle_css', get_template_directory_uri() . '/assets/css/themestyle.css' );

    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/assets/js/html5shiv.min.js', array(), '', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'jquery_js', get_template_directory_uri() . '/assets/js/jquery.min.js', NULL, '', true );
    wp_enqueue_script( 'popper_js', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery_js'), '', true );
    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery_js'), '', true );
    wp_enqueue_script( 'superfish_js', get_template_directory_uri() . '/assets/js/superfish.min.js', array(''), '', true );
    wp_enqueue_script( 'skiplinkfocus_js', get_template_directory_uri() . '/assets/js/skip-link-focus.min.js', array(), '', true );
    wp_enqueue_script( 'theme_script', get_template_directory_uri() . '/assets/js/themescript.js', array('jquery_js'), '', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'agratitudesign_scripts' );


/**
 * Filter the HTML script tag of `leadgenwp-fa` script to add `defer` attribute.
 *
*/
function agratitudesign_defer_scripts( $tag, $handle, $src ) {
	// The handles of the enqueued scripts we want to defer
	$defer_scripts = array( 
		'agratitudesign-fa'
	);
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer></script>';
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'agratitudesign_defer_scripts', 10, 3 );

add_filter( 'show_admin_bar', '__return_false' );

