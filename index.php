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

<div class="container">
    <div class="breadcrumb">
        <a class="breadcrumb-item" href="#">Home</a>
        <a class="breadcrumb-item" href="#">Fruit</a>
        <span class="breadcrumb-item active">Pears</span>
    </div>
</div>


<?php
// get_sidebar();
get_footer();