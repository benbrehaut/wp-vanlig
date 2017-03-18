<?php
/**
 * The template for displaying the a post item.
 *
 * @package WordPress
 * @subpackage halos
 * @since 1.0
 * @version 1.0
 */
 ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class('post post-articles__item'); ?>>
    <header class="post-header">
      <a href="<?php the_permalink(); ?>">
        <?php the_title('<h2 class="post__title heading-2">','</h2>'); ?>
      </a>
      <time class="post__date"><?php the_date(); ?></time>
      <?php the_post_thumbnail(); ?>
    </header>
    <div class="post-content">
      <?php the_content(); ?>
    </div>
    <footer class="post-footer">
      <a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More</a>
    </footer>
</article>
