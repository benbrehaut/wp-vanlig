<?php
/**
 * The template for displaying the site footer.
 *
 * @package WordPress
 * @subpackage halos
 * @since 1.0
 * @version 1.0
 */
?>

<footer class="site-footer" role="contentinfo">
    <div class="site-footer__col">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'site-footer-nav',
                'container' => false,
                'fallback_cb'    => false // Do not fall back to wp_page_menu()
            ) );
        ?>
    </div>
    <div class="site-footer__copy">
        &copy; <?php echo date("Y"); ?>
    </div>
</footer>
