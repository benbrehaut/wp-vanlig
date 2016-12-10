<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage halos
 * @since 1.0
 * @version 1.0
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="post-header">
            <?php the_title(); ?>
        </header>
        <div class="post-content">
            <?php the_content(); ?>
        </div>
        <?php comments_template(); ?>
    </article>
<?php endwhile;?>

<?php get_sidebar(); ?>
<?php get_footer();
