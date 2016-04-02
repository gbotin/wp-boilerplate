<?php get_header(); ?>

<main id="main" class="col-sm-8" role="main">

  <section class="search">

  	<?php get_template_part('templates/page-header') ?>

    <?php

      if (have_posts()) :

        while (have_posts()) : the_post();

          get_template_part('templates/content', 'search');

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
