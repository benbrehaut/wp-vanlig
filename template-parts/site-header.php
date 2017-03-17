<?php
/**
 * The template for displaying the site header.
 *
 * @package WordPress
 * @subpackage halos
 * @since 1.0
 * @version 1.0
 */
?>

<header id="masthead" class="site-header _slab-secondary" role="banner">
  <div class="site-logo">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <?php get_template_part('template-parts/site-logo'); ?>
      </a>
  </div>
  <nav class="site-nav" role="navigation">
      <?php
          wp_nav_menu( array(
              'theme_location'  => 'site-header-nav',
              'container'       => false,
              'menu_class'      => 'site-nav__list',
              'fallback_cb'     => false // Do not fall back to wp_page_menu()
          ) );
      ?>
  </nav>
  <div class="site-search">
      <?php get_search_form(); ?>
  </div>
</header>
