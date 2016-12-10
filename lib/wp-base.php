<?php
/**
 * A base support for all things WP
 *
 * @package WordPress
 * @subpackage halos
 * @since 1.0
 * @version 1.0
 */

/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/
function wp_base_setup() {
    /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
    add_theme_support( 'title-tag' );

    /*
    * Menu Support
    */
    add_theme_support( 'menus' );

    /*
    * Declare WooCommerce support
    * http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
    */
    add_theme_support( 'woocommerce' );

    /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
    add_theme_support( 'post-thumbnails' );

    /*
    * RSS thing..
    */
    add_theme_support( 'automatic-feed-links' );

    /*
    * Enable support for Post Formats
    * This has been commented out as it is not used for many projects
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
    /*
    add_theme_support( 'post-formats', array(
        'aside',
        'gallery'
    ) );
    */

    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
}
add_action( 'after_setup_theme', 'wp_base_setup' );

?>
