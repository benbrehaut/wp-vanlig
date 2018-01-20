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

<footer class="o-site-footer" role="contentinfo">

  <!-- main footer part -->
  <div class="o-site-footer__main u-text-color-secondary">

    <div class="l-wrap">

      <!-- main footer links -->
      <section class="o-site-footer__col">
        <h2 class="o-heading-3">Links</h2>
        <?php
          wp_nav_menu( array(
              'theme_location' => 'site-footer-nav',
              'container' => false,
              'menu_class' => 'o-site-footer-nav o-site-footer-nav__list o-unstyled-list',
              'fallback_cb' => false, // Do not fall back to wp_page_menu()
              'walker' => new Vanlig_Nav_Walker,
          ) );
        ?>
      </section>
      <!-- /main footer links -->

      <!-- main footer info -->
      <section class="o-site-footer__col">
        <h2 class="o-heading-3">Info</h2>

        <ul class="o-unstyled-list">
          <?php if ( get_field('telephone_number', 'options') ) { ?>
            <li>
              <a href="tel:<?php the_field('telephone_number', 'options'); ?>">
                Call us: <?php the_field('telephone_number', 'options'); ?>
              </a>
            </li>
          <?php } ?>
          <?php if ( get_field('fax_number', 'options') ) { ?>
            <li>
              <a href="fax:<?php the_field('fax_number', 'options'); ?>">
                Fax: <?php the_field('fax_number', 'options'); ?>
              </a>
            </li>
          <?php } ?>
          <?php if ( get_field('email_address', 'options') ) { ?>
            <li>
              <a href="fax:<?php the_field('email_address', 'options'); ?>">
                Email: <?php the_field('email_address', 'options'); ?>
              </a>
            </li>
          <?php } ?>
        </ul>
        <!-- /main footer info -->

      </section>
      <!-- /main footer info -->

      <!-- site address -->
      <section class="o-site-footer__col">
        <h2 class="o-heading-3">Address</h2>
        <?php if ( get_field('address', 'options') ) { ?>
          <address>
            <?php the_field('address', 'options'); ?>
          </address>
        <?php } ?>
      </section>
      <!-- /site address -->

    </div>

    <div class="l-wrap">

      <!-- site social platforms -->
      <section class="o-site-footer__social">
        <h2 class="o-heading-3">Social Platforms</h2>

        <ul class="o-site-social o-unstyled-list">
          <?php if ( get_field('facebook_url', 'options') ) { ?>
            <li class="o-site-social__item o-site-social__item--facebook">
              <a href="<?php the_field('facebook_url', 'options'); ?>">
                <span class="u-element-hidden">Facebook</span>
              </a>
            </li>
          <?php } ?>
          <?php if ( get_field('twitter_url', 'options') ) { ?>
            <li class="o-site-social__item o-site-social__item--twitter">
              <a href="<?php the_field('twitter_url', 'options'); ?>">
                <span class="u-element-hidden">Twitter</span>
              </a>
            </li>
          <?php } ?>
          <?php if ( get_field('pinterest_url', 'options') ) { ?>
            <li class="site-social__item o-site-social__item--pinterest">
              <a href="<?php the_field('pinterest_url', 'options'); ?>">
                <span class="u-element-hidden">Pinterest</span>
              </a>
            </li>
          <?php } ?>
          <?php if ( get_field('instagram_url', 'options') ) { ?>
            <li class="o-site-social__item o-site-social__item--instagram">
              <a href="<?php the_field('instagram_url', 'options'); ?>">
                <span class="u-element-hidden">Instagram</span>
              </a>
            </li>
          <?php } ?>
          <?php if ( get_field('google_plus_url', 'options') ) { ?>
            <li class="o-site-social__item o-site-social__item--googleplus">
              <a href="<?php the_field('google_plus_url', 'options'); ?>">
                <span class="u-element-hidden">Google Plus</span>
              </a>
            </li>
          <?php } ?>
          <?php if ( get_field('linkedin_url', 'options') ) { ?>
            <li class="o-site-social__item o-site-social__item--linkedin">
              <a href="<?php the_field('linkedin_url', 'options'); ?>">
                <span class="u-element-hidden">LinkedIn</span>
              </a>
            </li>
          <?php } ?>
          <?php if ( get_field('youtube_url', 'options') ) { ?>
            <li class="o-site-social__item o-site-social__item--youtube">
              <a href="<?php the_field('youtube_url', 'options'); ?>">
                <span class="u-element-hidden">YouTube</span>
              </a>
            </li>
          <?php } ?>
          <?php if ( get_field('houzz_url', 'options') ) { ?>
            <li class="o-site-social__item o-site-social__item--houzz">
              <a href="<?php the_field('houzz_url', 'options'); ?>">
                <span class="u-element-hidden">Houzz</span>
              </a>
            </li>
          <?php } ?>
        </ul>
      </section>
      <!-- /site social platforms -->

    </div>

  </div>
  <!-- /main footer part -->

  <!-- bottom footer part -->
  <div class="o-site-footer__bottom u-text u-text-color-secondary">
    <div class="l-wrap">
      <div class="o-site-footer__notice">
        &copy; <?php echo date("Y"); ?> of <?php bloginfo('name'); ?>
      </div>
      <nav class="o-site-footer__bottom-nav">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'site-footer-bottom-nav',
                'container' => false,
                'menu_class' => 'o-site-footer-bottom-nav o-site-footer-nav__list o-unstyled-list',
                'fallback_cb' => false, // Do not fall back to wp_page_menu()
                'walker' => new Vanlig_Nav_Walker,
            ) );
          ?>
      </nav>
    </div>
  </div>
  <!-- bottom footer part -->

</footer>
