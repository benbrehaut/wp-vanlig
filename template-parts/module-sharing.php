<?php
/**
 * The module for sharing posts
 *
 * @package WordPress
 * @subpackage halos
 * @since 1.0
 * @version 1.0
 */
 ?>

 <section class="social-links">
   <h3 class="heading-3">Share</h3>
     <ul class="social-links__list">
         <li class="social-links__item">
             <a class="social-links__link social-link__link--facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share on Facebook." target="_blank" rel="noopener">
               <span>Share on Facebook</span>
             </a>
         </li>
         <li class="social-links__item">
             <a class="social-links__link social-links__link--twitter" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!" target="_blank" rel="noopener">
               <span>Share on Twitter</span>
             </a>
         </li>
         <li class="social-links__item">
             <a class="social-links__link social-links__link--pinterest" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>&description=<?php the_title(); ?>" target="_blank" rel="noopener">
               <span>Share on Pinterest</span>
             </a>
         </li>
         <li class="social-links__item">
             <a class="social-links__link social-links__link--email" href="mailto:?Subject=Look what I found on this cool website&Body=<?php the_permalink() ?>%0D%0A " target="_blank" rel="noopener">
               <span>Share on Email</span>
             </a>
         </li>
     </ul>
 </section>
