<?php
// Creating the widget
class contacto_widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
        // Base ID of your widget
            'contacto_widget',
        // Widget name will appear in UI
            __('Danim0reno - Datos de contacto', 'cw_widget_domain'),
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
        echo "<div class='info'>
              <div class='address'>
                <i class='bi bi-geo-alt'></i>
                <h4>Ubicación:</h4>";

        $title_location = apply_filters('widget_title', $instance['title_location']);
        echo $args['before_widget'];
        if (!empty($title_location))
            echo '<p>'. $title_location . '</p>';
        echo $args['after_widget'];
        echo "</div>";
        // -----------------------------------------------------------------------------------------

        echo "<div class='email'>
                <i class='bi bi-envelope'></i>
                <h4>Email:</h4>";
        $title_email = apply_filters('widget_title', $instance['title_email']);
        echo $args['before_widget'];
        if (!empty($title_email))
            echo '<p>' . $title_email . '</p>';
        echo $args['after_widget'];
        echo  "</div>";
        // -----------------------------------------------------------------------------------------

        echo  "<div class='phone'>
                <i class='bi bi-phone'></i>
                <h4>Telefono contacto:</h4>";
        
        $title_telefono = apply_filters('widget_title', $instance['title_telefono']);
        echo $args['before_widget'];
        if (!empty($title_telefono))
            echo '<p>' . $title_telefono . '</p>';
        echo $args['after_widget'];
        echo"</div>";

        echo "<iframe src='https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621' frameborder='0' style='border:0; width: 100%; height: 290px;' allowfullscreen></iframe>
            </div>";
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
function contact_load_widget()
{
     register_widget('contacto_widget');
}
add_action('widgets_init', 'contact_load_widget');