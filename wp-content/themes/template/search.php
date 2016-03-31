<?php get_header(); ?>

<main id="main" class="col-sm-8" role="main">

  <section class="search">

  	<header>
  		<h1>
        <?php printf( __( 'Résultats de recherche pour : %s', 'template' ), '<span>' . esc_html(get_search_query()) . '</span>' ); ?>
      </h1>
  	</header>

    <?php get_template_part('loop') ?>
    <?php get_template_part('pagination') ?>

  </section>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
