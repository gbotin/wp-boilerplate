<?php
/*
Plugin Name: Plugin Template
Version: 1.0
*/

add_action( 'widgets_init', 'plugin_template_init' );

function plugin_template_init() {
	register_widget( 'plugin_template_widget' );
}

class plugin_template_widget extends WP_Widget
{

  public function __construct()
  {
    $widget_details = array(
      'classname' => 'plugin_template_widget'
    );

    parent::__construct( 'plugin_template_widget', 'Plugin Template Widget', $widget_details );
  }

  // Rendering
  public function widget( $args, $instance )
  {

  }

  // Updating
  public function update( $new_instance, $old_instance )
  {
    return $new_instance;
  }

  // Form
  public function form( $instance )
  {
    $content = isset( $instance[ 'content' ] ) ? $instance[ 'content' ] : '';

    ?>

    <!-- INPUTS -->
    <p>
      <label for="<?php echo $this->get_field_id('content') ?>"><?php _e('Content', 'template'); ?></label>
      <input
        type="text"
        id="<?php echo $this->get_field_id('content') ?>"
        name="<?php echo $this->get_field_name('content') ?>"
        value="<?php echo esc_attr($content); ?>"
        />
    </p>

    <?php
  }

}

?>
