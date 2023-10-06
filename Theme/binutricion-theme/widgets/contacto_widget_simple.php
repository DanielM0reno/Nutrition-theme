<?php
// Creating the widget
class contacto_simple_widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
        // Base ID of your widget
            'contacto_simple_widget',
        // Widget name will appear in UI
            __('Danim0reno - Datos de contacto simple', 'cw_widget_domain'),
        // Widget description
            array(
            'description' => __('Introduce los datos para la sección de contactos',
                                     'cw_widget_domain')
        ));
    }
    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance)
    {
        echo "<p>";
        $title_location = apply_filters('widget_title', $instance['title_location']);
        echo $args['before_widget'];
        if (!empty($title_location))
            echo $title_location;
        echo $args['after_widget'];
       
        echo  "<br>";

        $title_telefono = apply_filters('widget_title', $instance['title_telefono']);
        echo $args['before_widget'];
        if (!empty($title_telefono))
            echo  "<strong>Telefono de contacto:</strong> ". $title_telefono ."<br>";
        echo $args['after_widget'];
       
        $title_email = apply_filters('widget_title', $instance['title_email']);
        echo $args['before_widget'];
        if (!empty($title_email))
            echo "<strong>Email:</strong>". $title_email."<br>
            ";
        echo $args['after_widget'];
        echo "</p>";        
        
    }
    // Widget Backend
    public function form($instance)
    {
        if (isset($instance['title_email'])) {
            $title_email = $instance['title_email'];
        } else {
            $title_email = __('New title_email', 'cw_widget_domain');
        }
      
    ?>
    <label for="<?php
            echo $this->get_field_id('title_email');
    ?>"><?php
            _e('Introduce email:');
    ?>
    <input class="widefat" id="<?php
            echo $this->get_field_id('title_email');
    ?>" name="<?php
            echo $this->get_field_name('title_email');
    ?>" type="text" value="<?php
            echo esc_attr($title_email);
    ?>" />

    <?php
    //----------------------------------------------
    if (isset($instance['title_telefono'])) {
        $title_telefono = $instance['title_telefono'];
    } else {
        $title_telefono = __('New title_telefono', 'cw_widget_domain');
    }
    // Widget admin form
    ?>
    <label for="<?php
            echo $this->get_field_id('title_telefono');
    ?>"><?php
            _e('Introduce Teléfono:');
    ?>
    <input class="widefat" id="<?php
            echo $this->get_field_id('title_telefono');
    ?>" name="<?php
            echo $this->get_field_name('title_telefono');
    ?>" type="text" value="<?php
            echo esc_attr($title_telefono);
    ?>" />
    <?php
    //----------------------------------------------
    if (isset($instance['title_location'])) {
        $title_location = $instance['title_location'];
    } else {
        $title_location = __('New title_location', 'cw_widget_domain');
    }
    // Widget admin form
    ?>
    <label for="<?php
            echo $this->get_field_id('title_location');
    ?>"><?php
            _e('Introduce ubicación:');
    ?>
    <input class="widefat" id="<?php
            echo $this->get_field_id('title_location');
    ?>" name="<?php
            echo $this->get_field_name('title_location');
    ?>" type="text" value="<?php
            echo esc_attr($title_location);
    ?>" />
    <?php
    }


    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance          = array();
        $instance['title_email'] = (!empty($new_instance['title_email'])) 
                              ? strip_tags($new_instance['title_email']) : '';
        $instance['title_telefono'] = (!empty($new_instance['title_telefono'])) 
        ? strip_tags($new_instance['title_telefono']) : '';
        $instance['title_location'] = (!empty($new_instance['title_location'])) 
        ? strip_tags($new_instance['title_location']) : '';
        return $instance;
    }
} 


// Register and load the widget
function contact_simple_load_widget()
{
     register_widget('contacto_simple_widget');
}
add_action('widgets_init', 'contact_simple_load_widget');