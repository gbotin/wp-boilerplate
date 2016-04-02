<article <?php post_class(); ?>>

  <?php get_template_part('templates/page-header') ?>

  <section>
    <?php the_content(); ?>
  </section>

  <footer>
    <?php pager(); ?>
  </footer>

</article>
