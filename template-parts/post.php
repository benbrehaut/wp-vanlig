<?php
/**
 * The template for displaying the a post item.
 *
 * @package WordPress
 * @subpackage vanlig
 * @since 1.0
 * @version 2.0
 */
 ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class('post articles-grid__item'); ?>>
    <header class="post-header">
      <h2 class="post__title heading-2">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h2>
      <time class="post__date"><?php echo get_the_date(); ?></time>
      <?php the_post_thumbnail(); ?>
    </header>
    <div class="post-content">
      <?php the_excerpt(); ?>
    </div>
    <footer class="post-footer">
      <a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More</a>
    </footer>
</article>
