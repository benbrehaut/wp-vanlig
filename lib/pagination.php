<?php
/**
* Pagination
*
* Custom Pagination for use. Call using pagination();
* For custom post pages, you must query_posts with their $args();
*
* @package WordPress
* @subpackage vanlig
* @since 1.0
* @version 2.0
*/

function pagination( $args = null ) {
  $defaults = array(
    'page' => null,
    'pages' => null,
    'range' => 2,
    'gap' => 3,
    'anchor' => 0,
    'before' => '<div class="pagination" role="navigation" aria-label="Pagination"><ul class="page-numbers">',
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
    $ellipsis = "<li class='page-numbers__item page-numbers__item--dot'><span>...</span></li>";

    if ($page > 1 && !empty($previouspage)) {
      $output .= "<li class='page-numbers__item'><a class='page-numbers__number' href='" . get_pagenum_link($page - 1) . "' class='prev page-numbers'>< Prev</a></li>";
    }

    $min_links = $range * 2 + 1;
    $block_min = min($page - $range, $pages - $min_links);
    $block_high = max($page + $range, $min_links);
    $left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
    $right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

    if ($left_gap && !$right_gap) {
      $output .= sprintf('%s%s%s',
        paginate_loop(1, $anchor),
        $ellipsis,
        paginate_loop($block_min, $pages, $page)
      );
    }
    else if ($left_gap && $right_gap) {
    $output .= sprintf('%s%s%s%s%s',
      paginate_loop(1, $anchor),
      $ellipsis,
      paginate_loop($block_min, $block_high, $page),
      $ellipsis,
      paginate_loop(($pages - $anchor + 1), $pages)
      );
    }
    else if ($right_gap && !$left_gap) {
      $output .= sprintf('%s%s%s',
      paginate_loop(1, $block_high, $page),
        $ellipsis,
        paginate_loop(($pages - $anchor + 1), $pages)
      );
    }
    else {
      $output .= paginate_loop(1, $pages, $page);
    }

    if ($page < $pages && !empty($nextpage)) {
      $output .= "<li class='page-numbers__item'><a class='page-numbers__number' href='" . get_pagenum_link($page + 1) . "' class='next page-numbers'>Next ></a></li>";
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
    ? "<li class='page-numbers__item'><span class='page-numbers__number page-numbers__number--current'>$i</span></li>"
    : "<li class='page-numbers__item'><a class='page-numbers__number' href='" . get_pagenum_link($i) . "'>$i</a></li>";
  }
  
  return $output;
}


?>
