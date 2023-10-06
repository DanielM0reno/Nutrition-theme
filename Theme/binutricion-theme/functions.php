<?php
/**
 * danielm0reno functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package danielm0reno
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


function demo_setup() {

	load_theme_textdomain( 'demo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'demo_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'demo_setup' );


function demo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'demo_content_width', 640 );
}
add_action( 'after_setup_theme', 'demo_content_width', 0 );


function custom_scripts() {

	wp_enqueue_script( 's1', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );

	// Bootstrap librerias
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_script( 'bootstrap-js' , get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery') );
	wp_enqueue_style( 'bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css' );

	wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css' );
	wp_enqueue_script( 'aos-js' , get_template_directory_uri() . '/assets/vendor/aos/aos.js', array('jquery') );

	wp_enqueue_style( 'remixicon', get_template_directory_uri() . '/assets/vendor/remixicon/remixicon.css' );

	wp_enqueue_style( 'glightbox-style', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css' );
	wp_enqueue_script( 'glightbox-js' , get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array('jquery') );

	wp_enqueue_style( 'boxicons', get_template_directory_uri() . '/assets/vendor/boxicons/css/boxicons.min.css' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css' );

	wp_enqueue_script( 'swiper-js' , get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array('jquery') );

	wp_enqueue_script( 'main-js' , get_template_directory_uri() . '/assets/js/main.js', array('jquery') );

	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );

function template_nutri_widget_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar sobre mi', 'templatenutricion' ),
			'id'            => 'sidebar-sobre-mi',
			'description'   => esc_html__( 'Añadir widgets aqui', 'templatenutricion' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar reservas', 'templatenutricion' ),
			'id'            => 'sidebar-reservas',
			'description'   => esc_html__( 'Añadir widgets aqui', 'templatenutricion' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar preguntas frecuentes', 'templatenutricion' ),
			'id'            => 'sidebar-preguntas',
			'description'   => esc_html__( 'Añadir widgets aqui', 'templatenutricion' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar contacto', 'templatenutricion' ),
			'id'            => 'sidebar-contacto',
			'description'   => esc_html__( 'Añadir widgets aqui', 'templatenutricion' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar de DATOS de contacto', 'templatenutricion' ),
			'id'            => 'sidebar-datos_contacto',
			'description'   => esc_html__( 'Añadir widgets aqui', 'templatenutricion' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar de DATOS de contacto footer', 'templatenutricion' ),
			'id'            => 'sidebar-datos_contacto_footer',
			'description'   => esc_html__( 'Añadir widgets aqui', 'templatenutricion' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

	
}
add_action( 'widgets_init', 'template_nutri_widget_init' );

// Widgets desarrollados
require_once(get_template_directory() .'/widgets/contacto_widget.php');
require_once(get_template_directory() .'/widgets/contacto_widget_simple.php');

//Custom theme functions
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }

add_filter('upload_mimes', 'cc_mime_types');


/**
 * Add background cta
 */
function wpdocs_styles_method() {
	wp_enqueue_style(
		'style',
		get_template_directory_uri() . '/style.css'
	);
		$image = esc_url( get_template_directory_uri() . '/assets/img/background.svg' );
        $custom_css = "
		.cta {
			background: linear-gradient(rgba(40, 58, 90, 0.089), rgba(40, 58, 90, 0.103)), url('".$image."') fixed center center;
			background-size: cover;
			padding: 120px 0;
			text-shadow: 0px 2px 3px #acacac;
		  }
		  #main_about {
			background: linear-gradient(rgba(40, 58, 90, 0.089), rgba(40, 58, 90, 0.103)), url('".$image."') fixed center center;
		  }
		  ";

        wp_add_inline_style( 'style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_styles_method' );


// Registrar botones de paginas

register_nav_menus(
	array(
		'menu-about' => esc_html__( 'Sobre mí', 'demo' ),
	)
);


class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

	public function start_lvl(&$output, $depth = 0, $args = null) {
        // No se genera la etiqueta <ul> del submenú
    }

    public function end_lvl(&$output, $depth = 0, $args = null) {
        // No se genera la etiqueta </ul> del submenú
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        // Elemento del menú sin <li>
        $output .= '<a class="btn-learn-more ms-2 mt-2" href="' . $item->url . '">' . $item->title . '</a>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null) {
        // No se genera la etiqueta </li> al final de cada elemento del menú
    }

}