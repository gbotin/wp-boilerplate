<?php get_header(); ?>

<main id="main" class="col-sm-8" role="main">

  <section class="archive">

    <header>
      <h1><?php the_archive_title(); ?></h1>
    </header>

    <?php get_template_part('loop') ?>
    <?php get_template_part('pagination') ?>

  </section>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
