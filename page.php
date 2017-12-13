<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agratitudesign_telaga
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

// please remove after this

//    <!-- Bootstrap CSS -->
//    <link rel="stylesheet" href="css/bootstrap.min.css">
//    <!-- Owl Carosel -->
//    <link rel="stylesheet" href="css/owl.carousel.min.css">
//    <link rel="stylesheet" href="css/owl.theme.default.min.css">

//    <link rel="stylesheet" href="css/font-awesome.min.css">
//    <link rel="stylesheet" href="css/animate.css">
//    <link rel="stylesheet" href="css/venobox.css">
// <link rel="stylesheet" href="css/style.css">

// <!-- jQuery first, then Popper.js, then Bootstrap JS -->
// <script src="js/jquery.min.js"></script>
// <script src="js/popper.min.js"></script>
// <script src="js/bootstrap.min.js"></script>
// <!-- All Plugin js -->
// <script src="js/plugin.min.js"></script>
// <!-- Custom js -->
// <script src="js/custom.js"></script>
