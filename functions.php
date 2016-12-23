<?php
/**
* halos functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package WordPress
* @subpackage halos
* @since 1.0
*/

// WordPress Clean up
require_once( 'lib/cleanup.php' );

// WordPress Base support
require_once( 'lib/wp-base.php' );

// Register Menus
require_once( 'lib/navigation.php' );

// Theme Stylesheets and Javascript files
require_once( 'lib/enqueue-scripts.php' );

// Theme Custom Work
require_once( 'lib/theme-custom.php' );

// Making all assets relative, instead of full links.
require_once( 'lib/relative-theme-assets.php' );

?>
