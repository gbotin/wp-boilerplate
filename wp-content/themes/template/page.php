<?php get_header(); ?>

<main id="main" class="col-sm-8" role="main">

  <section class="page">

    <?php while (have_posts()) : the_post(); ?>

      <?php get_template_part('templates/content', 'page'); ?>

    <?php endwhile; ?>

  </section>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
