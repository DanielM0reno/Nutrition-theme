<?php
// Creating the widget
class imagenes_widget extends WP_Widget
{
        function __construct()
        {
                parent::__construct(
                // Base ID of your widget
                'imagenes_widget',
                // Widget name will appear in UI
                __('Danim0reno - Selector imagenes', 'cw_widget_domain'),
                // Widget description
                array(
                'description' => __('Selector de imagenes para mostrar',
                                                'cw_widget_domain')
                ));
        }

        function form($instance) {
                //WIDGET BACK-END SETTINGS
                $instance = wp_parse_args((array) $instance, array('link1' => '', 'title' => ''));
                $link1 = $instance['link1'];

                $images = new WP_Query( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image' , 'posts_per_page' => -1 ) );
                if( $images->have_posts() ){ 
                        $options = array();
                        for( $i = 0; $i < 2; $i++ ) {
                        $options[$i] = '';
                        while( $images->have_posts() ) {
                                $images->the_post();
                                $img_src = wp_get_attachment_image_src(get_the_ID());
                                $image_alt = get_post_meta( get_the_ID(), '_wp_attachment_image_alt', TRUE);

                                $options[$i] .= '<option value="'.get_the_title().'::'.$image_alt. '::' . $img_src[0] . '" ' . selected( $img_src[0], false ) . '>' . get_the_title() . '</option>';
                        } 
                        } ?>
                <select name="<?php echo $this->get_field_name( 'link1' ); ?>"><?php echo $options[0]; ?></select><?php
                } else {
                        echo 'There are no images in the media library. Click <a href="' . admin_url('/media-new.php') . '" title="Add Images">here</a> to add some images';
                }
        }

        function update($new_instance, $old_instance) {
                $instance = $old_instance;
                $instance['link1'] = $new_instance['link1'];

                return $instance;
        }

        function widget($args, $instance) {
                $link1 = ( empty($instance['link1']) ) ? 0 : $instance['link1'];?>
                
                <!-- Display images --><?php 
                if( !( $link1  ) ) {
                        echo "Aun no se ha seleccionado una imagen.";
                } else { 
                        if($link1) { 
                                $data = explode("::", $link1);?>
                                
                                <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $data[1]; ?>">
                                        <div class="portfolio-img"><img src="<?php echo $data[2]; ?>" class="img-fluid" alt=""></div>
                                        <div class="portfolio-info">
                                        <h4><?php echo $data[0];?></h4>
                                        <a href="<?php echo $data[2]; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
                                        data-glightbox="title:;" ><i class="bx bx-plus"></i></a>
                                        </div>
                                </div>

                        <?php }
                } 
        }
}

// Register and load the widget
function image_load_widget()
{
     register_widget('imagenes_widget');
}

// Add class for Random Posts Widget
add_action('widgets_init', 'image_load_widget');