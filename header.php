<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
			*
			* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
			*
			* @package Agratitudesign WPBS4
			*/
	?>
	<!DOCTYPE html>
	<html <?php language_attributes(); ?>>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/assets/img/favicon/favicon.ico">
			<title>
			<?php wp_title( '|', true, 'right' ); ?>
			<?php bloginfo( 'name' ); ?>
			</title>
			<?php wp_head(); ?>
		</head>
		<body <?php body_class(); ?>>
			<nav class="top-nav top-nav-inverse bg-dark">
				<div class="container">
					<div class="py-1 clearfix">
						<div class="float-left">
							<a href="tel:+6236292638" class="mr-2 text-xs text-white"><small><i class="fa fa-phone mr-1"></i>+62-362-92638</small></a>
							<a href="mailto:hello@yoursite.com" class="mr-2 text-xs text-white"><small><i class="fa fa-envelope mr-1"></i>telaga10@gmail.com</small></a>
						</div>
						<div class="social-media-icon float-right">
							<a href="#x" class="btn btn-secondary btn-sm mr-2"><i class="fa fa-facebook"></i></a>
							<a href="#x" class="btn btn-secondary btn-sm mr-2"><i class="fa fa-twitter"></i></a>
							<a href="#x" class="btn btn-secondary btn-sm "><i class="fa fa-instagram"></i></a>
						</div>
					</div>
					</div><!-- / container -->
					</nav><!-- / top-nav-primary -->
					<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top py-0">
						<div class="container no-padding">
							<?php
								// Display the Custom Logo
								the_custom_logo();
								// No Custom Logo, just display the site's name
								if (!has_custom_logo()) {
							?>
							<a  href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?></a>
							<?php }
							?>
							<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="main-menu">
								<!-- / navbar-nav -->
								<?php
								wp_nav_menu( array(
								'theme_location'  => 'primary',
								'container'       => false,
								'menu_class'      => '',
								'fallback_cb'     => '__return_false',
							'items_wrap'      => '<ul id="%1$s" class="navbar-nav mr-auto mt-3 mt-lg-0 %2$s">%3$s</ul>',
							'depth'           => 2,
							'walker'          => new WP_Bootstrap_Navwalker()
							) );
							?>
							<form class="form-inline ml-auto pt-2 pt-md-0" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
								<input class="form-control mr-sm-1" type="search" value="<?php echo get_search_query() ?>" placeholder="Search..." name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
								<button type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" class="btn btn-primary my-2 my-sm-0">
								<i class="fa fa-search"></i>
								</button>
							</form>
							
						</div>
						<!-- main-menu -->
					</div>
					<!-- container -->
				</nav>
				<?php if ( is_front_page() ) { ?>
				<?php get_template_part( 'template-parts/content', 'frontpage' ); ?>
				<?php }	?>
				<?php if (!is_front_page()) {?>
				<?php if (is_page('blog')) {?>
				<section id="page-header" style="background-image: url('<?php echo get_bloginfo('template_directory');?>/assets/img/slider/slider-12.jpg')" >
					<div class="banner-overlay"></div>
					<div class="container">
						<div class="row">
							<div class="title-header col-md-12 m-auto text-center">
								<h1 class="display-5 text-uppercase text-warning">Welcome to our <?php wp_title(''); ?></h1>
								<p class="d-none d-lg-block">Please feel free to explore our project and services !</h1>
								</div>
							</div>
							<div class="d-none d-md-block">
								<?php bootstrap_breadcrumb(); ?>
							</div>
						</div>
					</div>
				</section>
				<?php } else {?>
				<section id="page-header" style="background-image: url('<?php echo get_bloginfo('template_directory');?>/assets/img/slider/slider-10.jpg')" >
					<div class="banner-overlay"></div>
					<div class="container">
						<div class="row">
							<div class="title-header col-md-12 m-auto text-center">
								<h1 class="display-5 text-uppercase text-warning"><?php the_title(); ?></h1>
								<!-- <p class="d-none d-lg-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate eaque quasi neque nostrum, itaque accusamus reprehenderit.</h1> -->
							</div>
						</div>
						<div class="d-none d-md-block">
							<?php bootstrap_breadcrumb(); ?>
						</div>
					</section>
					<?php }	?>
					<?php }	?>