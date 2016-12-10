<?php
/**
 * Place all custom code within this file
 *
 * @package WordPress
 * @subpackage halos
 * @since 1.0
 * @version 1.0
 */

/**
* Handles JavaScript detection.
*
* Adds a `js` class to the root `<html>` element when JavaScript is detected.
*/
function js_detection() {
	echo "<script async>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'js_detection', 0 );

/**
* Add ACF theme Settings to WP
*/
if( function_exists('acf_add_options_page') ) {

	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title' 	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));

}
