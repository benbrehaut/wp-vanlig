<?php
/**
* Enqueue theme stylesheets and javascript files
*
* {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
* {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
*
* @package WordPress
* @subpackage vanlig
* @since 1.0
* @version 2.0
*/

/**
* Add main CSS and JS files
**/
function theme_scripts() {

  // Enqueue the main Stylesheet.
  // By default its the uncompressed version, but you can easily change this
  wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/assets/css/dist/main.css', array(), 'all' );

  // Deregister the jquery version bundled with WordPress, as it does get old.
  wp_deregister_script( 'jquery' );

  // CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
  wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', true );

  // Enqueue the main javascript file.
  // By default its the uncompressed version, but you can easily change this
  wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/assets/js/dist/main.js', array('jquery'), true );

  // Add the comment-reply library on pages where it is necessary
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/**
* Remove wp-embed script
* So far could not find any issues with this, but you can easily remove this block code if need be.
**/
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

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
* Removes Contact form 7 main stylesheet
**/
function contact_form_styles() {
  wp_deregister_style( 'contact-form-7' );
}
add_action( 'wp_print_styles', 'contact_form_styles', 100 );

/**
* Add Favicons to site and also admin area
**/
function favicons_head() { ?>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/assets/img/favicon/favicon.ico"/>
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#1e1e1e">
	<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#1e1e1e">
<?php }
add_action( 'wp_head', 'favicons_head' );

/**
* Add Google Analyrics to head
**/
function google_analytics() {

  if ($_SERVER['HTTP_HOST']==="test-theme.uk" || $_SERVER['HTTP_HOST']==="www.test-theme.uk") { ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-XXXXXXXX-X', 'auto'); // Change me
      ga('send', 'pageview');
    </script>
  <?php } else if ($_SERVER['HTTP_HOST']==="dev.test-theme.uk") { ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-XXXXXXXX-X', 'auto'); // Change me
    ga('send', 'pageview');
  </script>
  <?php
    }
}
add_action( 'wp_head', 'google_analytics', 10 );

?>
