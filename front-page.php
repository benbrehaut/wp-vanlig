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
		while ( have_posts() ) : the_post();
?>

	<section class="l-wrap">
		<div class="l-grid l-grid__cols">
			<?php the_content(); ?>
		</div>
	</section>

<?php
		endwhile;
	endif;
?>

<?php get_footer();
