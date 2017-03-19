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

/**
* Add main CSS and JS files
**/
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
* Handles JavaScript detection.
*
* Adds a `js` class to the root `<html>` element when JavaScript is detected.
*/
function js_detection() {
	echo "<script async>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'js_detection', 0 );

/**
* Add html5shim to header
**/
function add_ie_html5_shim () {
  echo '<!--[if lt IE 9]>';
  echo '<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>';
  echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');

/**
* Add Google Analyrics to head
**/
function google_analytics() { ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-XXXXXXXX-X', 'auto'); // Change me
    ga('send', 'pageview');

  </script>
<?php }
add_action( 'wp_head', 'google_analytics', 10 );

?>
