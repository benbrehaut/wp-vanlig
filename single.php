<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage vanlig
 * @since 1.0
 * @version 2.0
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="post-header">
            <?php the_title('<h1 class="heading-1">','</h1>'); ?>
            <h4 class="heading-4">Post by: <?php the_author(); ?></h4>
        </header>
        <div class="post-content">
            <?php the_content(); ?>
        </div>

        <!-- Comments -->
        <?php comments_template(); ?>
        <!-- Comments -->

        <!-- Sharing -->
        <?php get_template_part('template-parts/module-sharing'); ?>
        <!-- /Sharing -->
    </article>
<?php endwhile;?>

<?php get_sidebar(); ?>
<?php get_footer();
