<!-- Footer -->
<footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <h3><?php echo get_bloginfo( 'name' ); ?></h3>
        <!-- SIDEBAR DATOS CONTACTO -->
        <?php if ( is_active_sidebar( 'sidebar-datos_contacto_footer' ) ) { ?>
                <?php dynamic_sidebar( 'sidebar-datos_contacto_footer' ); ?>
            <?php } ?> 
            <!-- SIDEBAR DATOS CONTACTO -->
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Otras páginas</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="<?php echo get_home_url(); ?>">Inicio</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <!-- Otros enlances -->
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Redes sociales</h4>
        <p>Sígueme en mis redes sociales</p>
        <div class="social-links mt-3">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="container footer-bottom clearfix">
  <div class="copyright">
    &copy; Copyright <strong><span><a href="https://github.com/DanielM0reno">Daniel Moreno Aljaro</a></span> & <span><a href="https://github.com/Jose0rtiz">Jose Ortiz Ripoll</a></span></strong>. Todos los derechos reservados
  </div>
  <div class="credits">

    Diseñado por <a href="https://github.com/DanielM0reno">@DaniM0reno</a> & <a href="https://github.com/Jose0rtiz">@Jose Ortiz Ripoll</a>
  </div>
</div>
</footer>
<!-- /Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Template Main JS File -->
<?php wp_footer(); ?>

</body>

</html>