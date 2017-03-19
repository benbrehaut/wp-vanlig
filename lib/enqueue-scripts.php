<?php
/**
* Enqueue theme stylesheets and javascript files
*
* {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
* {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
*
* @package WordPress
* @subpackage halos
* @since 1.0
* @version 1.0
*/

function theme_scripts() {
    // Enqueue the main Stylesheet.

    $theme_css = get_template_directory() . '/assets/css/style.css';

    wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/assets/css/style.css', array(), filemtime( $theme_css ), 'all' );

    // Deregister the jquery version bundled with WordPress, as it does get old.
    wp_deregister_script( 'jquery' );

    // CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
    wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '1.0.0', true );

    // Enqueue the main javascript file.
    // By default its the uncompressed version, but you can easily change this

    $theme_js = get_template_directory() . '/assets/js/scripts.js';

    wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), filemtime( $theme_js ), true );

    // Add the comment-reply library on pages where it is necessary
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/**
* Add html5shim to header
**/
function add_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');


?>
