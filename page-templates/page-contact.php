<?php
/**
* The main template file for the front-page.
*
* Template Name: Contact
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package WordPress
* @subpackage halos
* @since 1.0
* @version 1.0
*/

get_header();
?>

<?php
	if ( have_posts() ) :

		/* Start the Loop */
		while ( have_posts() ) : the_post();

		    the_content();

		endwhile;

	endif;
?>

<?php get_footer();
