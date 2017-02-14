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
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>
<body <?php body_class('site'); ?>>

<!-- IE 9 < warning -->
<!--[if lte IE 9]>
	<div class="site-notice">
		<p>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	</div>
<![endif]-->
<!-- /IE 9 < warning -->

<!-- site-header -->
<header id="masthead" class="site-header" role="banner">
    <div class="site-title">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php get_template_part('template-parts/site-logo'); ?>
            <?php bloginfo( 'name' ); ?>
        </a>
    </div>
    <nav class="site-nav" role="navigation">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'site-header-nav',
                'container' => false,
                'fallback_cb'    => false // Do not fall back to wp_page_menu()
            ) );
        ?>
    </nav>
    <div class="site-search">
        <?php get_search_form(); ?>
    </div>
</header>
<!-- /site-header -->

<!-- site-content -->
<main class="site-content" role="main">
