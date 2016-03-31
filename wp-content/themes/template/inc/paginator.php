<?php

function paginator() {

  if (is_singular()) {
    return;
  }

  global $wp_query;

  if ($wp_query->max_num_pages <= 1) {
    return;
  }

  $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
  $max = intval($wp_query->max_num_pages);

  if ($paged >= 1) {
    $links[] = $paged;
  }

  if ($paged >= 3) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
  }

  if (($paged + 2) <= $max) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
  }

  echo '<div class="text-center"><ul class="pagination">';

  if (get_previous_posts_link()) {
    echo '<li>' . get_previous_posts_link('<i class="fa fa-angle-double-left"></i>') . '</li>';
  }

  if (!in_array(1, $links)) {
    $class = 1 == $paged ? ' class="first active"' : ' class="first"';
    printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

    if (!in_array(2, $links)) {
      echo '<li><span class="btn disabled">...</span></li>';
    }
  }

  sort($links);
  foreach ((array)$links as $link) {
    $class = $paged == $link ? ' class="last active"' : ' class="last"';
    printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
  }

  if (!in_array($max, $links)) {
    if (!in_array($max - 1, $links)) {
      echo '<li><span class="btn disabled">...</span></li>' . "\n";
    }
    $class = $paged == $max ? ' class="active"' : '';
    printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
  }

  if (get_next_posts_link()) {
    echo '<li>' . get_next_posts_link('<i class="fa fa-angle-double-right"></i>') . '</li>';
  }

  echo '</ul></div>' . "\n";

}
