<?php get_header(); ?>

<main id="main" class="col-sm-8" role="main">

	<section class="error-404 not-found">

		<header>
			<h1>
        <?php _e( 'Oups! Cette page n\'a pas êté trouvée.', 'template' ); ?>
      </h1>
		</header>

		<article>
			<p><?php _e( 'Il semble que rien n\'a été trouvé à cet endroit. Essayez peut-être une recherche ?', 'template' ); ?></p>
			<?php get_search_form(); ?>
		</article>

	</section>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
