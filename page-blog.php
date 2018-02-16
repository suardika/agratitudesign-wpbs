<?php
/*
Template Name: Blog Grid Template
*/
get_header(); ?>
<section id="blog">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<!-- pagination custom query -->
					<?php 
					$temp = $wp_query; 
					$wp_query = null; 
					$wp_query = new WP_Query(); 
					$wp_query->query('showposts=2&post_type=post'.'&paged='.$paged); 
					while ($wp_query->have_posts()) : $wp_query->the_post(); 
					?>
					<div class="col-sm-6">
						<div class="card my-3">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('bloglistImg', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
							</a>
							<div class="card-header bg-primary text-white">
								<div class="meta-tags">
									<a class="text-white" href="<?php the_permalink(); ?>">
										<span class="date"><i class="fa fa-user mr-2"></i>Written by <?php the_author(); ?>  |</span>
										<span class="date"><i class="fa fa-calendar mx-2"></i>on  <?php the_time('M'); ?> <?php the_time('d'); ?>, <?php the_time('Y'); ?></span>
									</a>
									<div class="comments"><a class="text-white" href="<?php comments_link(); ?>"><i class="fa fa-comment mr-2"></i><?php comments_number(); ?></a></div>
								</div>
							</div>
							<div class="card-body bg-secondary text-black">
								<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
								<p class="card-text">
									<?php if (has_excerpt()) {
									echo get_the_excerpt();
									} else {
									echo wp_trim_words(get_the_content(), 18);
									} ?>
								</p>
								<a href="<?php the_permalink(); ?>" class="btn btn-danger">Readmore..</a>
							</div>
						</div>
					</div>
					<?php endwhile; ?>

				</div>
				<div id="agr-pagination">
					<?php
					// echo paginate_links();
					if ( function_exists('wp_bootstrap_pagination') )
					wp_bootstrap_pagination();
					?>
				</div>
				<?php 
				  $wp_query = null; 
				  $wp_query = $temp;  // Reset
				?>
			</div>
			<?php get_sidebar( 'blog' ); ?>
		</div>
	</div>
</section>
<?php
get_footer();
?>