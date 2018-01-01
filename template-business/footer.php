<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agratitudesign WPBS4
 */

?>

<!-- Footer -->
<footer class="py-5 bg-dark">
	<div class="container">
		<p class="m-0 text-center text-white">
			&copy; <?php bloginfo( 'name' );
					echo ' - ';
					echo date("Y"); ?>
		</p>
	</div>
	<!-- /.container -->
</footer>
<?php wp_footer(); ?>
</body>
</html>
