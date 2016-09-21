<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

    <header role="banner">

      <nav id="navbar" class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand" rel="home">
              <!-- <img
                src="<?php bloginfo('template_directory'); ?>/dist/images/logo.png"
                alt="<?php bloginfo('description') ?>" /> -->
              WP Boilerplate
            </a>

            <div class="collapse-controls">
              <button type="button" class="navbar-toggle menu-toggle"
                data-toggle="collapse"
                data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
              </button>
            </div>
          </div>

          <?php
            wp_nav_menu(array(
              'theme_location' => 'primary',
              'container' => 'ul',
              'menu_id' => 'navbar-menu',
              'menu_class' => 'nav navbar-nav navbar-right collapse navbar-collapse navbar-menu',
              'depth' => 2
            ));
          ?>

          <ul class="nav navbar-nav navbar-languages">
            <?php // pll_the_languages(array('display_names_as' => 'slug')); ?>
          </ul>

        </div>
      </nav>

    </header>

    <div id="content-main" class="container">
      <div class="row">
