<?php
/**
 * agratitudesign_telaga enqueue scripts
 *
 * @package agratitudesign_telaga
 */


function wp_bootstrap_starter_scripts() {

    wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.purify.min.css' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.purify.min.css' );
    wp_enqueue_style( 'themestyle-css', get_template_directory_uri() . '/assets/css/themestyle.purify.min.css' );
    wp_enqueue_style( 'Lora_font', '//fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Poppins:300,400,500,600,700');

    // Internet Explorer HTML5 support
    // wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/assets/js/html5.js', array(), '', false );
    // wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'jquery_js', get_template_directory_uri() . '/assets/js/jquery.slim.min.js', '', '', true );
    wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/src/bootstrap/js/bootstrap.bundle.min.js', array('jquery_js'), '', true );
    wp_enqueue_script('popper_js', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery_js'), '', true );

}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_starter_scripts' );

//     wp_enqueue_script( 'jquery_js', get_template_directory_uri() . '/assets/js/jquery.min.js', '', '', true );
//     wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), '', true );   
//     wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/assets/js/modernizr.js', '', '', true );
//     wp_enqueue_script( 'googlemap_js', 'https://maps.googleapis.com/maps/api/js', '', '', true );
//     wp_enqueue_script( 'jquery_sharrre_js', get_template_directory_uri() . '/assets/js/jquery.sharrre.js', array('jquery', 'bootstrap_js'), '', true );
//     wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/assets/js/gaia.js', array('jquery', 'bootstrap_js'), '', true );

// <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
// <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

// <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
// <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

// function wp_bootstrap_starter_scripts() {
//     // load bootstrap css
//     wp_enqueue_style( 'wp-bootstrap-starter-bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.purify.min.css' );
//     // load bootstrap css
//     wp_enqueue_style( 'wp-bootstrap-starter-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.purify.min.css');
//     // load AItheme styles
//     // load WP Bootstrap Starter styles
//     wp_enqueue_style( 'themestyle-css', get_template_directory_uri() . '/assets/css/themestyle.purify.min.css' );  
//     // wp_enqueue_style( 'wp-bootstrap-starter-style', get_stylesheet_uri() );
//     if(get_theme_mod( 'preset_style_setting' ) === 'poppins-lora') {
//         wp_enqueue_style( 'wp-bootstrap-starter-poppins-lora-font', '//fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Poppins:300,400,500,600,700' );
//     }
//     if(get_theme_mod( 'preset_style_setting' ) === 'montserrat-merriweather') {
//         wp_enqueue_style( 'wp-bootstrap-starter-montserrat-merriweather-font', '//fonts.googleapis.com/css?family=Merriweather:300,400,400i,700,900|Montserrat:300,400,400i,500,700,800' );
//     }
//     if(get_theme_mod( 'preset_style_setting' ) === 'poppins-poppins') {
//         wp_enqueue_style( 'wp-bootstrap-starter-poppins-font', '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' );
//     }
//     if(get_theme_mod( 'preset_style_setting' ) === 'roboto-roboto') {
//         wp_enqueue_style( 'wp-bootstrap-starter-roboto-font', '//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i' );
//     }
//     if(get_theme_mod( 'preset_style_setting' ) === 'arbutusslab-opensans') {
//         wp_enqueue_style( 'wp-bootstrap-starter-arbutusslab-opensans-font', '//fonts.googleapis.com/css?family=Arbutus+Slab|Open+Sans:300,300i,400,400i,600,600i,700,800' );
//     }
//     if(get_theme_mod( 'preset_style_setting' ) === 'oswald-muli') {
//         wp_enqueue_style( 'wp-bootstrap-starter-oswald-muli-font', '//fonts.googleapis.com/css?family=Muli:300,400,600,700,800|Oswald:300,400,500,600,700' );
//     }
//     if(get_theme_mod( 'preset_style_setting' ) === 'montserrat-opensans') {
//         wp_enqueue_style( 'wp-bootstrap-starter-montserrat-opensans-font', '//fonts.googleapis.com/css?family=Montserrat|Open+Sans:300,300i,400,400i,600,600i,700,800' );
//     }
//     if(get_theme_mod( 'preset_style_setting' ) === 'robotoslab-roboto') {
//         wp_enqueue_style( 'wp-bootstrap-starter-robotoslab-roboto', '//fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Roboto:300,300i,400,400i,500,700,700i' );
//     }
//     if(get_theme_mod( 'preset_style_setting' ) && get_theme_mod( 'preset_style_setting' ) !== 'default') {
//         wp_enqueue_style( 'wp-bootstrap-starter-'.get_theme_mod( 'preset_style_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/typography/'.get_theme_mod( 'preset_style_setting' ).'.css', false, '' );
//     }
//     //Color Scheme
//     /*if(get_theme_mod( 'preset_color_scheme_setting' ) && get_theme_mod( 'preset_color_scheme_setting' ) !== 'default') {
//         wp_enqueue_style( 'wp-bootstrap-starter-'.get_theme_mod( 'preset_color_scheme_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/color-scheme/'.get_theme_mod( 'preset_color_scheme_setting' ).'.css', false, '' );
//     }else {
//         wp_enqueue_style( 'wp-bootstrap-starter-default', get_template_directory_uri() . '/inc/assets/css/presets/color-scheme/blue.css', false, '' );
//     }*/
//     wp_enqueue_script('jquery');
//     // wp_enqueue_script( 'jquery_js', get_template_directory_uri() . '/assets/js/jquery.slim.min.js', '', '', true );
//     // Internet Explorer HTML5 support
//     wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/assets/js/html5.js', array(), '3.7.0', false );
//     wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );
//     // load bootstrap js
//     wp_enqueue_script('wp-bootstrap-starter-popper', get_template_directory_uri() . '/assets/js/popper.min.js', array() );
//     wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array() );
//     wp_enqueue_script('wp-bootstrap-starter-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.js', array() );
//     wp_enqueue_script( 'wp-bootstrap-starter-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
//     if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
//         wp_enqueue_script( 'comment-reply' );
//     }
// }
// add_action( 'wp_enqueue_scripts', 'wp_bootstrap_starter_scripts' );


