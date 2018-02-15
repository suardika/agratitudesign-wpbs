<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function agratitudesign_widgets_init() {
  /*
  Sidebar (one widget area)
   */
  register_sidebar( array(
    'name'            => __( 'Sidebar', 'agratitudesign' ),
    'id'              => 'sidebar-widget-area',
    'description'     => __( 'The sidebar widget area', 'agratitudesign' ),
    'before_widget'   => '<div class="%1$s %2$s card my-3">',
    'after_widget'    => '</div>',
    'before_title'    => '<h2 class="card-header text-white bg-dark">',
    'after_title'     => '</h2>',
  ) );

  /*
  Footer (1, 2, 3, or 4 areas)
  Flexbox `col-sm` gives the correct the column width:
  * If only 1 widget, then this will have full width ...
  * If 2 widgets, then these will each have half width ...
  * If 3 widgets, then these will each have third width ...
  * If 4 widgets, then these will each have quarter width ...
  ... above the Bootstrap `sm` breakpoint.
   */
  register_sidebar( array(
    'name'            => __( 'Footer', 'agratitudesign' ),
    'id'              => 'footer-widget-area',
    'description'     => __( 'The footer widget area', 'agratitudesign' ),
    'before_widget'   => '<div class="%1$s %2$s col-sm">',
    'after_widget'    => '</div>',
    'before_title'    => '<h5 class="h5">',
    'after_title'     => '</h5>',
  ) );
}
add_action( 'widgets_init', 'agratitudesign_widgets_init' );



