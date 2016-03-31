<?php

function entry_meta() {

  echo '<ul class="entry-meta">';

  if ( 'post' === get_post_type() ) {
    echo '<li>';
    entry_author();
    echo ', ';
    entry_date();
    echo '</li>';
  }

	if ( 'post' === get_post_type() ) {
    echo '<li class="taxonomies">';
		entry_taxonomies();
    echo '</li>';
	}
  echo '</ul>';

	if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
    comments_popup_link('Aucun commentaire', '1 commentaire', '% commentaires', 'Commentaires désactivés pour cet article');
	}

}

function entry_author() {
  printf('<span class="author"><span>%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span>',
    __('Par', 'template'),
    esc_url(get_author_posts_url(get_the_author_meta('ID'))),
    get_the_author()
  );
}

function entry_date() {
	$time_string = sprintf('<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
    esc_attr( get_the_date( 'c' ) ),
    get_the_date()
  );

	printf( '<span>%1s </span>%s',
		__( 'le', 'template' ),
		$time_string
	);
}

function entry_taxonomies() {
	$categories_list = get_the_category_list(', ');
	if ( $categories_list ) {
		printf( '<span class="cat-links">%1$s</span>',
			$categories_list
		);
	}
}
