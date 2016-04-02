<header>
  <h1>
    <?php

      if (is_home()) :

        if (get_option('page_for_posts', true)) :

          echo get_the_title(get_option('page_for_posts', true));

        else :

          _e('Derniers articles', 'template');

        endif;

      elseif (is_archive()) :

        echo get_the_archive_title();

      elseif (is_search()) :

        printf( __( 'Résultats de recherche pour : %s', 'template' ), '<span>' . esc_html(get_search_query()) . '</span>' );

      elseif (is_404()) :

        _e( 'Oups! Cette page n\'a pas êté trouvée.', 'template' );

      else :

        echo get_the_title();

      endif;

    ?>
  </h1>
</header>
