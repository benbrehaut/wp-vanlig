<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="post-header">
        <?php the_title(); ?>
    </header>
    <div class="post-content">
        <?php the_content(); ?>
        <a href="<?php the_permalink(); ?>">Read More</a>
    </div>
</article>
