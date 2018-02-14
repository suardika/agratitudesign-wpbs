<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Agratitudesign WPBS4
 */

?>
		<!-- SHOWCASE SLIDER -->
		<section id="showcase">

			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<div class="carousel-inner">
					<?php
						$counter = 1;
						$homeSlideshow = new WP_Query(array(
						'posts_per_page' => 5,
						'post_type' => 'slideshow',
						'post_status' => 'publish',
						'orderby' => 'date',
						'order' => 'ASC'
					  ));
					?>
					<?php while ($homeSlideshow->have_posts()) : $homeSlideshow->the_post(); ?> 

					<?php
						// $image_object = get_field('image_slider');
						// $image_size = 'large';
						// $image_url = $image_object['sizes'][$image_size];
						// 
						$image = get_field('image_slider');
					?>
					<div class="carousel-item carousel-image-1 <?php echo $counter==1 ? "active": ""; ?>" style="background-image: url('<?php echo $image[url]; ?>')" >
						<div class="dark-overlay"></div>
						<div class="container">
							<div class="carousel-caption d-none d-sm-block text-center mb-5">
								<h1 class="display-3 animated wow fadeInDown" data-wow-delay=".7s"><?php the_title(); ?></h1>
								<p class="animated wow fadeInUp" data-wow-delay=".9s"><?php echo get_the_content(); ?></p>
								<a href="<?php the_field('slider_link_text'); ?>" class="btn btn-danger btn-lg animated wow fadeInUp" data-wow-delay=".11s"><?php the_field('slider_link_value'); ?></a>
							</div>
						</div>
					</div>
					<?php $counter++; endwhile; wp_reset_postdata(); ?>
				</div>	

				<a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a href="#myCarousel" data-slide="next" class="carousel-control-next">
					<span class="carousel-control-next-icon"></span>
				</a>


			</div>


		</section>


