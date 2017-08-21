<?php
/**
* Vanlig functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package WordPress
* @subpackage vanlig
* @since 1.0
* @version 2.0
*/

// WordPress Admin
require_once( 'lib/admin.php' );

// WordPress Clean up
require_once( 'lib/cleanup.php' );

// WordPress Base support
require_once( 'lib/wp-base.php' );

// Register Menus
require_once( 'lib/navigation.php' );

// Pagination
require_once( 'lib/pagination.php' );

// Breadcrumbs
require_once( 'lib/breadcrumbs.php' );

// Menu Walker
require_once( 'lib/class-vanlig-nav-walker.php' );

// TGM Plugin activation
require_once get_stylesheet_directory() . '/lib/tgm_pa.php';

// Theme Stylesheets and Javascript files
require_once( 'lib/enqueue-scripts.php' );

// Sticky Posts
require_once( 'lib/sticky-posts.php' );

// Add to the body_class function
require_once( 'lib/body-class-adjustment.php' );

// Theme Custom Work
require_once( 'lib/theme-custom.php' );

// Making all assets relative, instead of full links.
require_once( 'lib/relative-theme-assets.php' );

?>
