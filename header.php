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

		<!-- Navigation -->
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
			<div class="container">
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<!-- <ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="about.html">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="services.html">Services</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.html">Contact</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Portfolio
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
								<a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
								<a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
								<a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
								<a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
								<a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Blog
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
								<a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
								<a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
								<a class="dropdown-item" href="blog-post.html">Blog Post</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Other Pages
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
								<a class="dropdown-item" href="full-width.html">Full Width Page</a>
								<a class="dropdown-item" href="sidebar.html">Sidebar Page</a>
								<a class="dropdown-item" href="faq.html">FAQ</a>
								<a class="dropdown-item" href="404.html">404</a>
								<a class="dropdown-item" href="pricing.html">Pricing Table</a>
							</div>
						</li>
					</ul> -->
		            <?php
		            $args = array(
		              'theme_location' => 'primary',
		              'depth'      => 2,
		              'container'  => false,
		              'menu_class'     => 'navbar-nav ml-auto',
		              'walker'     => new Bootstrap_Walker_Nav_Menu()
		              );
		            if (has_nav_menu('primary')) {
		              wp_nav_menu($args);
		            }
		            ?>	
				</div>
			</div>
		</nav>
		<!-- SHOWCASE SLIDER -->
		<section id="showcase">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item carousel-image-1 active" style="background-image: url('<?php echo get_bloginfo('template_directory');?>/assets/img/slider/slider-03.jpg')" >
						<div class="container">
							<div class="carousel-caption d-none d-sm-block text-right mb-5">
								<h1 class="display-3">Heading One</h1>
								<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae consequuntur architecto eius magni nobis nulla eaque. Deserunt sunt, distinctio quos.</p>
								<a href="#" class="btn btn-danger btn-lg">Sign Up Now</a>
							</div>
						</div>
					</div>
					<div class="carousel-item carousel-image-2" style="background-image: url('<?php echo get_bloginfo('template_directory');?>/assets/img/slider/slider-03.jpg')">
						<div class="container">
							<div class="carousel-caption d-none d-sm-block mb-5">
								<h1 class="display-3">Heading Two</h1>
								<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae consequuntur architecto eius magni nobis nulla eaque. Deserunt sunt, distinctio quos.</p>
								<a href="#" class="btn btn-primary btn-lg">Learn More</a>
							</div>
						</div>
					</div>
					<div class="carousel-item carousel-image-1" style="background-image: url('<?php echo get_bloginfo('template_directory');?>/assets/img/slider/slider-03.jpg')">
						<div class="container">
							<div class="carousel-caption d-none d-sm-block text-right mb-5">
								<h1 class="display-3">Heading Three</h1>
								<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae consequuntur architecto eius magni nobis nulla eaque. Deserunt sunt, distinctio quos.</p>
								<a href="#" class="btn btn-success btn-lg">Learn More</a>
							</div>
						</div>
					</div>
				</div>
				<a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a href="#myCarousel" data-slide="next" class="carousel-control-next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</div>
		</section>
