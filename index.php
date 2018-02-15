<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Agratitudesign WPBS4
*/
get_header(); ?>
<section id="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          <?php
          // $homepagePosts = new WP_Query(array(
          // 'post_type'      => 'post',
          // 'posts_per_page' => 2,
          // 'orderby' => 'rand',
          // ));
          ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
          <?php endwhile; else : ?>
          <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
          <?php endif; ?>
        </div>
        <div id="agr-pagination">
          <?php
          // echo paginate_links();
          if ( function_exists('wp_bootstrap_pagination') )
          wp_bootstrap_pagination();
          ?>
        </div>
      </div>
      <?php get_sidebar( 'blog' ); ?>
    </div>
  </div>
</section>
<?php
get_footer();
?>