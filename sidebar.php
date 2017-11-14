<?php
/**
* The sidebar for our theme
*
* This is the template that acts as a sidebar for some pages.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WordPress
* @subpackage vanlig
* @since 1.0
* @version 2.0
*/
?>

<aside class="c-sidebar" role="complementary">
  <!-- widgets -->
    <?php // dynamic_sidebar( 'sidebar-1' ); ?>
  <!-- widgets -->

  <!-- recent posts -->
  <h4 class="heading-4">Recent Posts</h4>
  <ul class="c-sidebar-posts">
    <?php
      $recent_posts = wp_get_recent_posts(array( 'orderby' => 'post_date', 'numberposts' => 3, 'post_type' => 'post', 'post_status' => 'publish,', ) );
      foreach( $recent_posts as $recent ) { ?>
        <li class="c-sidebar-posts__item">
          <a class="c-sidebar-post__link" href="<?php echo get_permalink($recent["ID"]) ?>"><?php echo $recent["post_title"] ?></a>
        </li>
      <?php }
      wp_reset_query();
    ?>
  </ul>
  <!-- /recent posts -->

  <!-- categories -->
  <h4 class="heading-4">Categories</h4>
  <ul class="c-sidebar-categories">
    <?php
      $post_categories = get_categories(array ('orderby' => 'name', 'title_li' => '', ));
      foreach ($post_categories as $post_category) { ?>
        <li class="c-sidebar-categories__item">
          <a class="c-sidebar-categories__link" href="<?php echo get_category_link($post_category->term_id); ?>"><?php echo $post_category->name; ?> (<?php echo $post_category->count; ?>)</a>
        </li>
      <?php }
    ?>
  </ul>
  <!-- /categories -->

  <!-- archives -->
  <h4 class="heading-4">Archives</h4>
  <ul class="c-sidebar-archives">
    <?php wp_get_archives(array(
      'orderby'    => 'name',
      'type'       => 'monthly',
      'show_count' => true,  // show post count
    ) ); ?>
  </ul>
  <!-- /archives -->
</aside>
