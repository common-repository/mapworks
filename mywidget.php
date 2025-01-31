<?php
/**
Plugin name: mapwidget
Description: This plugin will keep a database of entities and search them provide map on front end. want professional version check <a href="http://magento.ifyouknowit.com">Go pro</a> 
*/
class map_widget extends WP_Widget {
        
        public function __construct() {
		parent::WP_Widget(false,'Search maps','description=To search maps');
        }

        public function form( $instance ) {
               // outputs the options form on admin
		if( $instance) {
		     $title = esc_attr($instance['title']);    
		} else {
		     $title = '';
		}
         ?>

		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
	<?php
        }

        public function update( $new_instance, $old_instance ) {
               // processes widget options to be saved

	     	      $instance = $old_instance;
		      
		      $instance['title'] = strip_tags($new_instance['title']);
		      
	     return $instance;
        }

        public function widget( $args, $instance ) {
               // outputs the content of the widget

 	extract( $args );
       // these are the widget options
	   $title = apply_filters('widget_title', $instance['title']);	   
	   echo $before_widget;
	   // Display the widget
	   echo '<div class="mywidget">';

	   // Check if title is set
	   if ( $title ) {
	      echo $before_title . $title . $after_title;
	   }
	   // Check if text is set
	   echo '</div>';

	   echo '<div id="sbox">';
  	   echo '<form method="post"><input id="smap" name="smap" type="text"><br/><input type="submit" name="smapgo" id="smapgo" value="Go"></form>';
	   echo '</div>';
	   echo $after_widget;

        }

}


function ok_register_widgets() {
 register_widget('map_widget');
}

add_action('widgets_init', 'ok_register_widgets');


?>
