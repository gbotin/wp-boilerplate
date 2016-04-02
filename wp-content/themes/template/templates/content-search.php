<article <?php post_class(); ?>>

  <header>
    <h2>
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h2>
  </header>

  <section>
    <?php the_excerpt(); ?>
  </section>

  <footer>
    <div class="pull-right">
      <span class="metas small">
        <?php get_template_part('templates/entry-meta') ?>
      </span>
    </div>

    <div class="clearfix"></div>
    <hr>
  </footer>

</article>
