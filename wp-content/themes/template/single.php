<?php get_header(); ?>

<main id="main" class="col-sm-8" role="main">

  <section class="single">

    <?php get_template_part('templates/content-single', get_post_type()); ?>

  </section>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
