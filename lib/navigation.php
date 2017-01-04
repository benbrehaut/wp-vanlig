<?php
/**
* halos menus
*
* Registering WordPress menu locations for the theme.
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package WordPress
* @subpackage halos
* @since 1.0
* @version 1.0
*/

/*
* Register some basic navigation menus
*/
register_nav_menus( array(
    'site-header-nav' => __( 'Site Header Navigation', 'halos' ),
    'site-footer-nav' => __( 'Site Footer Navigation', 'halos' )
) );

/*
* Sidebar Widgets
*/

function sidebar_widgets() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'halos' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sidebar_widgets' );

/*
* Pagination
*/
function pagination( $args = null ) {

     $defaults = array(
          'page' => null,
          'pages' => null,
          'range' => 2,
          'gap' => 3,
          'anchor' => 0,
          'before' => '<div class="pagination"><ul class="page-numbers">',
          'after' => '</ul></div>',
          'nextpage' => '<i class="icon-chevron-right"></i>',
          'previouspage' => '<i class="icon-chevron-left"></i>',
          'echo' => 1
     );

     $r = wp_parse_args( $args, $defaults );
     extract( $r, EXTR_SKIP );

     if ( !$page && !$pages ) {
          global $wp_query;

          $page = get_query_var('paged');
          $page = !empty($page) ? intval($page) : 1;

          $posts_per_page = intval(get_query_var('posts_per_page'));
          $pages = intval(ceil($wp_query->found_posts / $posts_per_page));
     }

     $output = "";
     if ($pages > 1) {
          $output .= "$before";
          $ellipsis = "<li class='page-number__item page-number__item--dot'><span>...</span></li>";

          if ($page > 1 && !empty($previouspage)) {
               $output .= "<li class='page-number__item'><a class='page-numbers__number' href='" . get_pagenum_link($page - 1) . "' class='prev page-numbers'>< Prev</a></li>";
          }

          $min_links = $range * 2 + 1;
          $block_min = min($page - $range, $pages - $min_links);
          $block_high = max($page + $range, $min_links);
          $left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
          $right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

          if ($left_gap && !$right_gap) {
               $output .= sprintf('%s%s%s',
                    ti_paginate_loop(1, $anchor),
                    $ellipsis,
                    ti_paginate_loop($block_min, $pages, $page)
               );
          }
          else if ($left_gap && $right_gap) {
               $output .= sprintf('%s%s%s%s%s',
                    ti_paginate_loop(1, $anchor),
                    $ellipsis,
                    ti_paginate_loop($block_min, $block_high, $page),
                    $ellipsis,
                    ti_paginate_loop(($pages - $anchor + 1), $pages)
               );
          }
          else if ($right_gap && !$left_gap) {
               $output .= sprintf('%s%s%s',
                    ti_paginate_loop(1, $block_high, $page),
                    $ellipsis,
                    ti_paginate_loop(($pages - $anchor + 1), $pages)
               );
          }
          else {
               $output .= ti_paginate_loop(1, $pages, $page);
          }

          if ($page < $pages && !empty($nextpage)) {
               $output .= "<li class='page-number__item'><a class='page-numbers__number' href='" . get_pagenum_link($page + 1) . "' class='next page-numbers'>Next ></a></li>";
          }

          $output .= $after;
     }

     if ($echo) {
          echo $output;
     }

     return $output;
}

function paginate_loop($start, $max, $page = 0) {
     $output = "";
     for ($i = $start; $i <= $max; $i++) {
          $output .= ($page === intval($i))
               ? "<li class='page-number__item'><span class='page-numbers__number page-numbers__number--current'>$i</span></li>"
               : "<li class='page-number__item'><a class='page-numbers__number' href='" . get_pagenum_link($i) . "'>$i</a></li>";
     }
     return $output;
}
