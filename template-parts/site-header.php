<?php
/**
 * The template for displaying the site header.
 *
 * @package WordPress
 * @subpackage vanlig
 * @since 1.0
 * @version 2.0
 */
?>

<header id="masthead" class="site-header _slab-primary" role="banner">
  <div class="site-header__top">
    <div class="site-logo">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="_text-color-secondary">
        <?php get_template_part('template-parts/site-logo'); ?>
      </a>
    </div>
    <div class="site-header__toggler js-site-toggle-menu">
      <button role="button" class="_text-color-secondary _text-caps btn">Menu</button>
    </div>
    <nav class="js-site-menu site-nav-wrapper" role="navigation">
      <?php
        wp_nav_menu( array(
          'theme_location'  => 'site-header-nav',
          'container'       => false,
          'menu_class'      => 'site-nav site-nav__list',
          'fallback_cb'     => false, // Do not fall back to wp_page_menu()
          'walker'          => new Vanlig_Nav_Walker,
        ) );
      ?>
    </nav>
  </div>
  <div class="site-header__bottom">
    <div class="site-search">
        <?php // get_search_form(); ?>
    </div>
  </div>
</header>
