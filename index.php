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
      <div class="col-md">
        <div class="card">
          <img class="card-img-top" src="<?php echo get_bloginfo('template_directory');?>/assets/img/slider/slider-01.jpg" alt="Card image cap">
          <div class="card-header bg-primary text-white">
            <div class="meta-tags">
              <small class="text-white">
                <span class="date"><i class="fa fa-user mr-2"></i> Written by Jeff</span>
                <span class="date"><i class="fa fa-calendar mx-2"></i>on Mar 23, 2018</span>
                <div class="comments"><a class="text-white" href="#"><i class="fa fa-comment mr-2"></i>24 Comments</a></div>
              </small>
            </div>
          </div>
          <div class="card-body bg-secondary text-black mb-3">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-danger">Readmore..</a>
          </div>
        </div>
      </div>
      <div class="col-md">
        <div class="card">
          <img class="card-img-top" src="<?php echo get_bloginfo('template_directory');?>/assets/img/slider/slider-01.jpg" alt="Card image cap">
          <div class="card-header bg-primary text-white">
            <div class="meta-tags">
              <small class="text-white">
                <span class="date"><i class="fa fa-user mr-2"></i> Written by Jeff</span>
                <span class="date"><i class="fa fa-calendar mx-2"></i>on Mar 23, 2018</span>
                <div class="comments"><a class="text-white" href="#"><i class="fa fa-comment mr-2"></i>24 Comments</a></div>
              </small>
            </div>
          </div>
          <div class="card-body bg-secondary text-black mb-3">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-danger">Readmore..</a>
          </div>
        </div>
      </div>
      <div class="col-md">
        <div class="card">
          <img class="card-img-top" src="<?php echo get_bloginfo('template_directory');?>/assets/img/slider/slider-01.jpg" alt="Card image cap">
          <div class="card-header bg-primary text-white">
            <div class="meta-tags">
              <small class="text-white">
                <span class="date"><i class="fa fa-user mr-2"></i> Written by Jeff</span>
                <span class="date"><i class="fa fa-calendar mx-2"></i>on Mar 23, 2018</span>
                <div class="comments"><a class="text-white" href="#"><i class="fa fa-comment mr-2"></i>24 Comments</a></div>
              </small>
            </div>
          </div>
          <div class="card-body bg-secondary text-black mb-3">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-danger">Readmore..</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
// get_sidebar();
get_footer();
?>