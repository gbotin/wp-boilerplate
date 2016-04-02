<?php get_header(); ?>

<main id="main" class="col-sm-8" role="main">

	<section class="error-404 not-found">

		<?php get_template_part('templates/page-header') ?>

		<article>
			<p><?php _e( 'Il semble que rien n\'a été trouvé à cet endroit. Essayez peut-être une recherche ?', 'template' ); ?></p>
			<?php get_search_form(); ?>
		</article>

	</section>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
