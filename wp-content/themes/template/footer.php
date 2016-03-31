    </div><!-- .row -->

  </div><!-- .container -->

  <footer id="footer" class="container">

    <div class="row">

      <?php for ($i = 0; $i < 4; $i++) : ?>
        <div class="col-xs-6 col-md-3">
          <?php
            wp_nav_menu(array(
              'theme_location' => 'footer-pos-' . $i,
              'container' => 'ul',
              'menu_class' => 'list-unstyled',
              'depth' => 0
            ));
          ?>
        </div>
      <?php endfor; ?>

    </div>

    <div class="row">
      <div class="col-xs-12 text-center">
        <p role="contentinfo">
          &copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>.
        </p>
      </div>
    </div>

  </footer>

  <?php wp_footer(); ?>

	</body>
</html>
