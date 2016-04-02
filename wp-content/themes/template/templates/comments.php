<?php
  if (post_password_required()) {
    return;
  }
?>

<section id="comments" class="comments">

  <?php if (have_comments()) : ?>
    <h2>
      <?php printf(_nx('One response to &ldquo;%2$s&rdquo;', '%1$s responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'sage'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>'); ?>
    </h2>

    <ol class="comment-list">
      <?php
        wp_list_comments(array(
          'style' => 'ol',
          'short_ping' => true
        ));
      ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
      <nav>
        <ul class="pagination">
          <?php if (get_previous_comments_link()) : ?>
            <li><?php previous_comments_link(__('&laquo;', 'template')); ?></li>
          <?php endif; ?>

          <?php if (get_next_comments_link()) : ?>
            <li><?php next_comments_link(__('&raquo;', 'template')); ?></li>
          <?php endif; ?>
        </ul>
      </nav>
    <?php endif; ?>
  <?php endif; ?>

  <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="alert alert-warning">
      <?php _e('Les commentaires sont fermés.', 'template'); ?>
    </div>
  <?php endif; ?>

  <?php
    comment_form(array(
      'class_form' => 'form-horizontal',
      'class_submit' => 'btn btn-default',
      'comment_field' => '
        <div class="form-group">
          <label for="comment" class="col-sm-2 control-label">' . _x( 'Comment', 'noun' ) . '</label>
          <div class="col-sm-8">
            <textarea id="comment" name="comment" class="form-control" cols="45" rows="8"></textarea>
          </div>
        </div>',
      'fields' => apply_filters('comment_form_default_fields', array(
  			'author' => '
          <div class="form-group">
            <label for="author" class="col-sm-2 control-label">' . __( 'Nom' ) . '</label>
            <div class="col-sm-4">
              <input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" />
            </div>
          </div>',
  			'email'  => '
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">' . __( 'Adresse email' ) . '</label>
            <div class="col-sm-4">
              <input id="email" name="email" class="form-control" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"/>
		        </div>
          </div>',
  			'url'    => '
          <div class="form-group">
            <label for="url" class="col-sm-2 control-label">' . __( 'Site web' ) . '</label>
            <div class="col-sm-4">
              <input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"/>
            </div>
          </div>'
      	))
    ));
  ?>

</section>
