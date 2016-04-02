<span class="author"><?php _e( 'Par', 'template' ); ?> <?php the_author_posts_link(); ?>, </span>
<span class="date">
  <time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
    <?php _e('le'); ?> <?php the_time('j F Y'); ?>
  </time>
</span>
