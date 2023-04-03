<footer class="py-4 text-center text-light bg-dark">
  <div class="container">
    <section class="footer__top d-flex justify-content-between">
      <div class="footer__logo">
        <?php $custom_logo = get_theme_mod("custom_logo_setting", get_stylesheet_directory_uri() . "/files/images/logo.svg"); ?>
        <img src="<?php echo esc_url($custom_logo); ?>" alt="logo">
      </div>
      <div class="footer__menu">
        <?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
      </div>
      <div class="footer__info-wrapper">
        <?php $custom_text = get_theme_mod("custom_address", "Dirección"); ?>
        <p class="my-3 text-right">
          <?php echo $custom_text; ?>
        </p>
        <?php $custom_text = get_theme_mod("custom_phone", "Teléfono"); ?>
        <p class="my-3 text-right">
          <?php echo $custom_text; ?>
        </p>
      </div>
    </section>
    <section class="footer__bottom">
      <div class="footer__copyright">
        Sitio creado por <a href="https://jmilo.tech/" target="_blank">jmilo.tech</a>
      </div>
    </section>
  </div>
</footer>
<?php
wp_footer()
?>
</body>

</html>