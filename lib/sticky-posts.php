<?php
/**
 * Adjusting the class of Sticky Posts
 *
 * @package WordPress
 * @subpackage vanlig
 * @since 1.0
 * @version 2.0
 */

function sticky_posts( $classes ) {
  
  global $post;

  if ( is_sticky( $post->ID ) ) {
    $classes[] = 'post--sticky';
  }

  return $classes;
}
add_filter('post_class','sticky_posts');

 ?>
