<?php

function custom_excerpt_more() {
  return ' &hellip;';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );
