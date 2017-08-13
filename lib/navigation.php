<?php
/**
* vanlig menus
*
* Registering WordPress menu locations for the theme.
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package WordPress
* @subpackage vanlig
* @since 1.0
* @version 2.0
*/

/*
* Register some basic navigation menus
*/
register_nav_menus( array(
  'site-header-nav' => __( 'Site Header Navigation', 'vanlig' ),
  'site-footer-nav' => __( 'Site Footer Navigation', 'vanlig' )
) );

/*
* Sidebar Widgets
*/
function sidebar_widgets() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vanlig' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sidebar_widgets' );
