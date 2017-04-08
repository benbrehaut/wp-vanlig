<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage halos
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head itemscope itemtype="http://schema.org/WebSite">
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- .site-wrapper -->
<div id="page" class="site">

<!-- Skip to content -->
<a href="#content" class="skip-link _sr-hidden">Skip to Content</a>
<!-- /Skip to content -->

<!-- JS Warning -->
<noscript>
  <div class="_text-c site-notice site-notice--warning">
    <strong>JavaScript seems to be disabled in your browser.</strong><br />
    You must have JavaScript enabled in your browser to utilize the full functionality of this website.
  </div>
</noscript>
<!-- /JS Warning -->

<!-- IE 9 < warning -->
<!--[if lte IE 9]>
	<div class="_text-c site-notice site-notice--warning">
		<p>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	</div>
<![endif]-->
<!-- /IE 9 < warning -->

<!-- site-header -->
<?php get_template_part('template-parts/site-header'); ?>
<!-- /site-header -->

<!-- site-content -->
<main id="content" class="site-content" role="main">
