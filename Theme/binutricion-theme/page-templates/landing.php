<?php
/*
Template Name: Página principal landing
*/

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo get_bloginfo( 'name' ); ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <?php wp_head(); ?>

</head>

<body>

  <!-- HEADER -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <!-- NAVBAR -->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#banner">Inicio</a></li>
          <li><a class="nav-link scrollto" href="#about">Sobre mí</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- /NAVBAR -->

    </div>
  </header>
  <!-- /HEADER -->

  <!-- BANNER -->
  <section id="banner" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1><?php echo get_bloginfo( 'name' ); ?></h1>
          <h2><?php echo get_bloginfo( 'description', 'display' );?></h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Sobre mí</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 banner-img text-center" data-aos="zoom-in" data-aos-delay="200">
          <!-- <img src="assets/img/logo.svg" class="img-fluid" alt="" id="banner-image"> -->
            <?php 
                  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                  if ( has_custom_logo() ) {
                    echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" class="img-fluid" id="banner-image"">';
                  } 
            ?>
        </div>
      </div>
    </div>

  </section>
  <!-- /BANNER -->

  <main id="main">


    <!-- ABOUT -->
    <section id="about" class="about bg-white">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Sobre mí</h2>
        </div>

        <div class="row content">
          <!-- SIDEBAR SOBRE MI -->
          <div class="col-lg-12 container" id="sobre-mi">
            <?php if ( is_active_sidebar( 'sidebar-sobre-mi' ) ) { ?>
                <?php dynamic_sidebar( 'sidebar-sobre-mi' ); ?>
            <?php } ?> 
          </div>
          <!-- /SIDEBAR SOBRE MI -->

          

          <div class="col-lg-12 text-center mt-3">
            <!-- <a href="#" class="btn-learn-more ">Leer más</a> -->
            <!-- MENU SOBRE MI -->
            <?php wp_nav_menu(array(
                'theme_location' => 'menu-about',
                'container'      => '',
                'items_wrap'    => '%3$s',
                'walker' => new Custom_Walker_Nav_Menu(),
            )); ?>
            <!-- /MENU SOBRE MI -->
          </div>
        </div>

      </div>
    </section>
    <!-- ABOUT -->




    <!-- CITA SECTION -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
          <?php if ( is_active_sidebar( 'sidebar-reservas' ) ) { ?>
                <?php dynamic_sidebar( 'sidebar-reservas' ); ?>
            <?php } ?> 
            <!-- <h3>Realizar reserva</h3> -->
            <!-- <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Reservar cita</a>
          </div>
        </div>
        
      </div>
    </section>
    <!-- /CITA SECTION -->


    <!-- CONTACT -->
    <section id="contact" class="contact bg-white">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contacto</h2>
          <?php if ( is_active_sidebar( 'sidebar-contacto' ) ) { ?>
                <?php dynamic_sidebar( 'sidebar-contacto' ); ?>
            <?php } ?> 
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">

            <!-- SIDEBAR DATOS CONTACTO -->
            <?php if ( is_active_sidebar( 'sidebar-datos_contacto' ) ) { ?>
                <?php dynamic_sidebar( 'sidebar-datos_contacto' ); ?>
            <?php } ?> 
            <!-- SIDEBAR DATOS CONTACTO -->

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Tu nombre</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Tu email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Asunto</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Mensaje</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Cargando</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Enviar consulta</button></div>
            </form>
          </div>

        </div>

      </div>
    </section>
    <!-- /CONTACT -->

  </main><!-- End #main -->

  <?php get_footer();?>