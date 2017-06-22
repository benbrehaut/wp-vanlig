<?php
/**
 * The main template file for the front-page.
 *
 * Template Name: Front Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage vanlig
 * @since 1.0
 * @version 2.0
 */

get_header();
?>

<?php
	if ( have_posts() ) :

		/* Start the Loop */
		while ( have_posts() ) : the_post();

		    get_template_part('template-parts/post');

		endwhile;

	endif;
?>

<?php get_footer();
