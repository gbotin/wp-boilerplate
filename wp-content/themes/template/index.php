<?php get_header(); ?>

<main id="main" class="col-sm-8" role="main">

  <section class="index">

    <?php get_template_part('templates/page-header') ?>

    <?php

      if (have_posts()) :

        while (have_posts()) : the_post();

          get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());

        endwhile;

        ?>
          <footer>
            <?php paginator(); ?>
          </footer>
        <?php

      else:

      get_template_part('templates/content', 'none');

      endif;

    ?>

  </section>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
