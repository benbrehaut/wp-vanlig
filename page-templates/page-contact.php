<?php
/**
* The main template file for the contact us page
*
* Template Name: Contact Us
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

		    the_content();

		endwhile;

	endif;
?>

<?php get_footer();
