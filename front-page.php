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
      <div class="col-md-6 m-auto text-center">
        <h2 class="mt-4">Read Our Blog</h2>
        <hr class="lines">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, saepe.</p>
      </div>
    </div>
    <div class="row">

      <?php
        $homepagePosts = new WP_Query(array(
          'posts_per_page' => 3,
          'orderby' => 'rand',
        ));
      ?>
      <?php while ($homepagePosts->have_posts()) : $homepagePosts->the_post(); ?>

        <div class="col-md">
          <div class="card">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('bloglistImg', ['class' => 'card-img-top', 'title' => 'Feature image']); ?>
            </a>
            <div class="card-header bg-primary text-white">
              <div class="meta-tags">
                <small>
                  <a class="text-white" href="<?php the_permalink(); ?>">
                    <span class="date"><i class="fa fa-user mr-2"></i>Written by <?php the_author(); ?>  |</span>
                    <span class="date"><i class="fa fa-calendar mx-2"></i>on  <?php the_time('M'); ?> <?php the_time('d'); ?>, <?php the_time('Y'); ?></span>
                  </a>
                  <div class="comments"><a class="text-white" href="<?php comments_link(); ?>"><i class="fa fa-comment mr-2"></i><?php comments_number(); ?></a></div>
                </small>
              </div>
            </div>
            <div class="card-body bg-secondary text-black mb-3">
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
      <?php endwhile; wp_reset_postdata(); ?>

    </div>
  </div>
</section>

<?php
// get_sidebar();
get_footer();
?>