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

			      <form class="form-inline ml-auto pt-2 pt-md-0" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			        <input class="form-control mr-sm-1" type="text" value="<?php echo get_search_query(); ?>" placeholder="Search..." name="s" id="s">
			        <button type="submit" id="searchsubmit" value="<?php esc_attr_x('Search', 'b4st') ?>" class="btn btn-primary my-2 my-sm-0">
			          <i class="fa fa-search"></i>
			        </button>
			      </form>
	                              
	            </div>
	            <!-- main-menu -->
	        </div>
	        <!-- container -->
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
					<div class="carousel-item carousel-image-1 active" style="background-image: url('<?php echo get_bloginfo('template_directory');?>/assets/img/slider/slider-10.jpg')" >
						<div class="dark-overlay"></div>
						<div class="container">
							<div class="carousel-caption d-none d-sm-block text-center mb-5">
								<h1 class="display-3 animated wow fadeInDown" data-wow-delay=".7s">TELAGA BALI</h1>
								<p class="lead animated wow fadeInUp" data-wow-delay=".9s">TELAGA, Specialized in the process engineering of water industries particularly in the field of desalination water/sewage and industrial effluent treatment plant.</p>
								<a href="#" class="btn btn-danger btn-lg animated wow fadeInUp" data-wow-delay=".11s">Readmore</a>
							</div>
						</div>
					</div>
					<div class="carousel-item carousel-image-2" style="background-image: url('<?php echo get_bloginfo('template_directory');?>/assets/img/slider/slider-03.jpg')">
						<div class="dark-overlay"></div>
						<div class="container">
							<div class="carousel-caption d-none d-sm-block mb-5">
								<h1 class="display-3 animated wow fadeInDown" data-wow-delay=".7s">Plants/Products</h1>
								<p class="lead animated wow fadeInUp" data-wow-delay=".9s">TELAGA plants/products combine, Asian, American and European technologies and experience in this field where our team engineers continuously researching and developing new process treatment and finding the quality equipment/products that is most reliable and cost effective that meets clients satisfaction and approval because the price you pay is the quality you afford to purchase</p>
								<a href="#" class="btn btn-danger btn-lg animated wow fadeInUp" data-wow-delay=".11s">Readmore</a>
							</div>
						</div>
					</div>
					<div class="carousel-item carousel-image-1" style="background-image: url('<?php echo get_bloginfo('template_directory');?>/assets/img/slider/slider-06.jpg')">
						<div class="dark-overlay"></div>
						<div class="container">
							<div class="carousel-caption d-none d-sm-block text-center mb-5">
								<h1 class="display-3 animated wow fadeInDown" data-wow-delay=".7s">TELAGA Group</h1>
								<p class="lead animated wow fadeInUp" data-wow-delay=".9s">TELAGA and Group have supplied many plants throughout Jawa, Sumatera, Kalimantan, Bali and Lombok where successful plants performance based on good engineering design and quality products were behind the normal growth of the company.</p>
								<a href="#" class="btn btn-danger btn-lg animated wow fadeInUp" data-wow-delay=".11s">Readmore</a>
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
