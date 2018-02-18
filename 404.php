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
          <div class="content-404 col-lg-12">
            <div class="card border-danger bg-danger text-white ml-3 my-3">
              <div class="card-body align-items-center d-flex justify-content-center">
                  <p class="display-1 text-center"><?php esc_html_e( 'Error 404' ); ?></p>
              </div>
            </div>
          </div>  
        </div>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</section>
<?php
get_footer();
?>


