<?php
/**
* The sidebar for our theme
*
* This is the template that acts as a sidebar for some pages.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WordPress
* @subpackage halos
* @since 1.0
* @version 1.0
*/
?>

<aside class="sidebar" role="complementary">
  <!-- widgets -->
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
  <!-- widgets -->

  <!-- recent posts -->
  <ul class="sidebar-posts">
    <?php
      $recent_posts = wp_get_recent_posts(array( 'orderby' => 'post_date', 'numberposts' => 4, ) );
      foreach( $recent_posts as $recent ) { ?>
        <li class="sidebar-posts__article">
          <a href="<?php echo get_permalink($recent["ID"]) ?>"><?php echo $recent["post_title"] ?></a>
        </li>
      <?php }
      wp_reset_query();
    ?>
  </ul>
  <!-- /recent posts -->

  <!-- categories -->
  <ul class="sidebar-categories">
    <?php
      wp_list_categories( array(
        'orderby'    => 'name',
        'title_li'   => '',
        'show_count' => true,  // show post count
      ) );
    ?>
  </ul>
  <!-- /categories -->

  <!-- archives -->
    <ul class="sidebar-archives">
      <?php wp_get_archives(array(
        'orderby'    => 'name',
        'type'       => 'monthly',
        'show_count' => true,  // show post count
      ) ); ?>
    </ul>
  <!-- /archives -->
</aside>
