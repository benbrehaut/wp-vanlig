<?php
/**
 * Cleaning up some output of WordPress that is redundent.
 *
 * @package WordPress
 * @subpackage vanlig
 * @since 1.0
 * @version 2.0
 */

/**
* Clean up wp_head output.
**/
function cleanup_head() {
	// EditURI link.
	remove_action( 'wp_head', 'rsd_link' );

	// Category feed links.
	remove_action( 'wp_head', 'feed_links_extra', 3 );

	// Post and comment feed links.
	remove_action( 'wp_head', 'feed_links', 2 );

	// Windows Live Writer.
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// Index link.
	remove_action( 'wp_head', 'index_rel_link' );

	// Previous link.
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

	// Start link.
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

	// Canonical.
	remove_action( 'wp_head', 'rel_canonical', 10, 0 );

	// Shortlink.
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

	// Links for adjacent posts.
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

	// WP version.
	remove_action( 'wp_head', 'wp_generator' );

	// Emoji detection script.
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

	// Emoji styles.
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action( 'init', 'cleanup_head' );

/**
* Disable autosave for posts
**/
function disable_autosave() {
  wp_deregister_script( 'autosave' );
}
add_action( 'admin_init', 'disable_autosave' );

/**
* Remove WP version from RSS Feed
**/
function remove_rss_wp_version() {
    return '';
}
add_filter( 'the_generator', 'remove_rss_wp_version' );

/**
* Remove P tags wrapping images from WYSISYG fields.
**/
function filter_ptags_images($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

/**
* Removes WooCommerce wrapper divs
**/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
