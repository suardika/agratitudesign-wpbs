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
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <div class="search-result">
            <div class="card ml-3 my-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail('bloglistImg', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
                    </a>
                  </div>
                  <div class="col-lg-6">
                    <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="card-text">
                      <?php if (has_excerpt()) {
                      echo get_the_excerpt();
                      } else {
                      echo wp_trim_words(get_the_content(), 18);
                      } ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-danger">Read More &rarr;</a>
                  </div>
                </div>
              </div>
              <div class="card-footer text-muted">
                Posted on <?php the_time('M'); ?> <?php the_time('d'); ?>, <?php the_time('Y'); ?> by
                <a href="<?php the_author_link(); ?> "><?php the_author(); ?></a>
              </div>
            </div>
          </div>


          <?php endwhile; else : ?>
          <div class="search-result col-lg-12">
            <div class="card border-warning ml-3 my-3">
              <div class="card-body align-items-center d-flex justify-content-center">
                  <p class="display-4 text-center"><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
              </div>
            </div>
          </div>          
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
      <?php get_sidebar(); ?>
    </div>
  </div>
</section>
<?php
get_footer();
?>