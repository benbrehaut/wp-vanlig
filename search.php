<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage vanlig
 * @since 1.0
 * @version 2.0
 */
get_header(); ?>

<?php if ( have_posts() ) : ?>

    <h2>You searched for: <?php echo get_search_query(); ?> </h2>

    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('template-parts/post'); ?>
    <?php endwhile; ?>

<?php endif;?>

<?php get_footer();
