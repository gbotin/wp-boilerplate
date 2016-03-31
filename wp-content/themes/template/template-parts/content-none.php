<section class="no-results not-found">

  <header class="page-header">
		<h1 class="page-title"><?php _e( 'Aucun résultat', 'template' ); ?></h1>
	</header>

	<div class="page-content">
		<?php if (is_search()) : ?>

      <p><?php _e( 'Désolé, mais rien ne correspond à vos termes de recherche. Veuillez réessayer avec d\'autres mots-clés.', 'template' ); ?></p>

    <?php else : ?>

    	<p><?php _e( 'Il semble que rien n\'a été trouvé à cet endroit. Essayez peut-être une recherche ?', 'template' ); ?></p>

    <?php endif; ?>

    <?php get_search_form(); ?>
	</div>

</section>
