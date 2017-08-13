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

  <!-- main footer part -->
  <div class="site-footer__main _slab-primary _text-color-secondary">

    <div class="site-footer__row">

      <!-- main footer links -->
      <section class="site-footer__col">
        <h2 class="heading-3">Links</h2>
        <?php
          wp_nav_menu( array(
              'theme_location' => 'site-footer-nav',
              'container' => false,
              'menu_class' => 'site-footer-nav site-footer-nav__list',
              'fallback_cb' => false, // Do not fall back to wp_page_menu()
              'walker' => new Vanlig_Nav_Walker,
          ) );
        ?>
      </section>
      <!-- /main footer links -->

      <!-- main footer info -->
      <section class="site-footer__col">
        <h2 class="heading-3">Info</h2>

        <ul class="_unstyled-list">
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
      <section class="site-footer__col">
        <h2 class="heading-3">Address</h2>
        <?php if ( get_field('address', 'options') ) { ?>
          <address>
            <?php the_field('address', 'options'); ?>
          </address>
        <?php } ?>
      </section>
      <!-- /site address -->

    </div>

    <!-- site social platforms -->
    <section class="site-footer__social _text-c">
      <h2 class="heading-3">Social Platforms</h2>

      <ul class="site-social _unstyled-list">
        <?php if ( get_field('facebook_url', 'options') ) { ?>
          <li class="site-social__item site-social__item--facebook">
            <a href="<?php the_field('facebook_url', 'options'); ?>">
              Facebook
            </a>
          </li>
        <?php } ?>
        <?php if ( get_field('twitter_url', 'options') ) { ?>
          <li class="site-social__item site-social__item--twitter">
            <a href="<?php the_field('twitter_url', 'options'); ?>">
              Twitter
            </a>
          </li>
        <?php } ?>
        <?php if ( get_field('pinterest_url', 'options') ) { ?>
          <li class="site-social__item site-social__item--pinterest">
            <a href="<?php the_field('pinterest_url', 'options'); ?>">
              Pinterest
            </a>
          </li>
        <?php } ?>
        <?php if ( get_field('instagram_url', 'options') ) { ?>
          <li class="site-social__item site-social__item--instagram">
            <a href="<?php the_field('instagram_url', 'options'); ?>">
              Instagram
            </a>
          </li>
        <?php } ?>
        <?php if ( get_field('google_plus_url', 'options') ) { ?>
          <li class="site-social__item site-social__item--googleplus">
            <a href="<?php the_field('google_plus_url', 'options'); ?>">
              Google Plus
            </a>
          </li>
        <?php } ?>
        <?php if ( get_field('linkedin_url', 'options') ) { ?>
          <li class="site-social__item site-social__item--linkedin">
            <a href="<?php the_field('linkedin_url', 'options'); ?>">
              LinkedIn
            </a>
          </li>
        <?php } ?>
        <?php if ( get_field('youtube_url', 'options') ) { ?>
          <li class="site-social__item site-social__item--youtube">
            <a href="<?php the_field('youtube_url', 'options'); ?>">
              YouTube
            </a>
          </li>
        <?php } ?>
        <?php if ( get_field('houzz_url', 'options') ) { ?>
          <li class="site-social__item site-social__item--houzz">
            <a href="<?php the_field('houzz_url', 'options'); ?>">
              Houzz
            </a>
          </li>
        <?php } ?>
      </ul>
    </section>
    <!-- /site social platforms -->

  </div>
  <!-- /main footer part -->

  <!-- bottom footer part -->
  <div class="site-footer__bottom">
    <div class="site-footer__row">
      <div class="site-footer__notice">
        &copy; <?php echo date("Y"); ?> of <?php bloginfo('name'); ?>
      </div>
    </div>
  </div>
  <!-- bottom footer part -->

</footer>
