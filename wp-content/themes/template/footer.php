    </div><!-- .row -->

  </div><!-- .container -->

  <footer id="footer" class="container">

    <hr>

    <div class="row">
        <?php dynamic_sidebar( 'footer' ); ?>
    </div>

    <hr>

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
