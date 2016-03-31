<?php

function template_comment($comment, $args, $depth) {

  ?>

    <div id="comment-<?php comment_ID() ?>"  class="comment-body">

      <div class="comment-author vcard">
        <?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
      </div>

      <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
        <br />
      <?php endif; ?>

      <div class="comment-content">
        <?php comment_text(); ?>
      </div>

      <div class="comment-meta">
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
          <?php
            printf( __('- Le %1$s à %2$s', 'template'), get_comment_date(),  get_comment_time() );
          ?>
        </a>
        <?php edit_comment_link( __('(Éditer)', 'template'), '  ', '' ); ?>
      </div>

      <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
      </div>
    </div>

  <?php

}
