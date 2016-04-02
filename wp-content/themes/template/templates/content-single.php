<?php while (have_posts()) : the_post(); ?>

  <article <?php post_class(); ?>>

    <?php get_template_part('templates/page-header') ?>

    <section>
      <?php the_content(); ?>
    </section>

    <footer>

      <div class="pull-right">
        <span class="metas small">
          <?php get_template_part('templates/entry-meta') ?>
        </span>
      </div>

      <div class="clearfix"></div>
      <?php pager(); ?>
    </footer>

    <?php comments_template('/templates/comments.php'); ?>

  </article>

<?php endwhile; ?>
