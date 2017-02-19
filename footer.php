<?php
/**
 * The footer for our theme
 *
 * This is the template that displays the ending of the page
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage halos
 * @since 1.0
 * @version 1.0
 */

?>
</main>
<!-- site-content -->

<!-- site-footer -->
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
<!-- /site-footer -->

<!-- SVG Icons -->
<div class="element-hidden">
    <?php include_once('assets/img/icons/svg-defs.svg'); ?>
</div>
<!-- /SVG Icons -->
<?php wp_footer(); ?>
</body>
