<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
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

		    get_template_part('template-parts/post');

		endwhile;

	endif;
?>

<?php get_footer();
