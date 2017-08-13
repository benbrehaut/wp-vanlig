<?php
/**
 * The template for displaying the site footer.
 *
 * @package WordPress
 * @subpackage vanlig
 * @since 1.0
 * @version 2.0
 */
?>

<footer class="site-footer _slab-secondary _text-color-primary" role="contentinfo">

  <div class="site-footer__main">
    <div class="site-footer__col">
      <?php
        wp_nav_menu( array(
            'theme_location' => 'site-footer-nav',
            'container' => false,
            'menu_class' => 'site-footer-nav site-footer-nav__list',
            'fallback_cb' => false, // Do not fall back to wp_page_menu()
            'walker' => new Vanlig_Nav_Walker,
        ) );
      ?>
    </div>
  </div>

  <div class="site-footer__bottom">
    <div class="site-footer__notice">
      &copy; <?php echo date("Y"); ?> of <?php bloginfo('name'); ?>
    </div>
  </div>

</footer>
