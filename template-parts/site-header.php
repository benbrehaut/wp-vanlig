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

<header id="masthead" class="o-site-header u-slab-tertiary" role="banner">
  <div class="l-wrap o-site-header__row">
    <div class="o-site-header__logo">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="u-text-color-primary">
        <?php get_template_part('template-parts/site-logo'); ?>
      </a>
    </div>
    <div class="o-site-header__toggler">
      <button role="button" class="js-site-toggle-menu u-text-color-secondary u-text-caps o-site-header__toggle">Menu</button>
    </div>
    <nav class="js-site-menu o-site-header__nav" role="navigation">
      <?php
        wp_nav_menu( array(
          'theme_location'  => 'site-header-nav',
          'container'       => false,
          'menu_class'      => 'o-site-navigation o-unstyled-list',
          'fallback_cb'     => false, // Do not fall back to wp_page_menu()
          'walker'          => new Vanlig_Nav_Walker,
        ) );
      ?>
    </nav>
  </div>
  <div class="o-site-header__search">
    <?php // get_search_form(); ?>
  </div>
</header>
