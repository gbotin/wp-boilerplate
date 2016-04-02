<article <?php post_class(); ?>>

  <header>
    <h2>
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h2>
  </header>

  <section>
    <div class="row">

      <?php if (has_post_thumbnail()) : ?>
        <div class="col-sm-4">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="thumbnail">
            <?php the_post_thumbnail(['auto', '200']); ?>
          </a>
        </div>
      <?php endif; ?>

      <div class="<?php echo (has_post_thumbnail() ? "col-sm-8" : "col-sm-12"); ?>">
        <?php the_excerpt(); ?>
        <a href="<?php echo get_permalink(); ?>"><?php _e('Lire la suite &rarr;', 'template') ?></a>
      </div>
    </div>
  </section>

  <footer>

    <div class="pull-right">
      <span class="metas small">
        <?php get_template_part('templates/entry-meta') ?>
        <span>
          -
          <span class="comments">
            <?php
              comments_popup_link(
                __( 'Laisser un commentaire', 'template' ),
                __( '1 Commentaire', 'template' ),
                __( '% Commentaires', 'template' ),
                '',
                __('Commentaires fermés', 'template')
              );
            ?>
          </span>
        </span>
      </span>
    </div>

    <div class="clearfix"></div>
    <hr>
  </footer>

</article>
