<?php
/**
 * agratitudesign_telaga enqueue scripts
 *
 * @package agratitudesign_telaga
 */

function agratitudesign_scripts() {

	wp_enqueue_style( 'agratitudesign-style', get_stylesheet_uri() );

	wp_enqueue_script( 'agratitudesign-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'agratitudesign-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'agratitudesign_scripts' );
