<form role="search" method="get" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">

  <div class="form-group">
    <input
      type="search"
      class="form-control"
      placeholder="<?php _e( 'Rechercher...', 'template' ); ?>"
      value="<?php echo get_search_query(); ?>"
      name="s"
      title="<?php _e( 'Rechercher :', 'template' ); ?>" />
  </div>

	<button type="submit" class="btn btn-primary">
    <?php _e( 'Rechercher', 'template' ); ?>
  </button>

</form>
