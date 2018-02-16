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
          <!-- Post Content Column -->
          <div class="col-md-12">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="post-content-body mt-3">
              <?php the_post_thumbnail('postImg', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
              <hr>
              <small>
              By <?php the_author(); ?>
              on <?php echo the_time('l, F jS, Y');?>
              in <?php the_category( ', ' ); ?>.
              <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
              </small>
              <hr>
              <?php the_content(); ?>
            </div>

            <ul class="pagination justify-content-left mb-4">
              <?php
              $post_permalink = get_permalink();
              $previous_post = get_permalink(get_adjacent_post(false,'',false));
              $next_post = get_permalink(get_adjacent_post(false,'',true));
              
              if( $post_permalink != $previous_post ):
              ?>
              <li class="page-item"><a class="page-link" href="<?php echo $previous_post; ?>">&larr; Older Page</a></li>
              <?php endif; ?>
              <?php if( $post_permalink != $next_post ): ?>
              <li class="page-item"><a class="page-link" href="<?php echo $next_post; ?>">Newer Page &rarr;</a></li>
              <?php endif; ?>
            </ul>

            <?php endwhile; else: ?>
            <p>No content is appearing for this page!</p>
            <?php endif; ?>            
            <hr>

          </div>
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