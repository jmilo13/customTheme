<?php
require_once get_template_directory() . '/template-parts/navbar.php';

function customtheme_add_css_js()
{
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js', array('jquery'), '2.11', true);
  wp_enqueue_script('bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', array('popper'), '5.2', true);
  //wp_enqueue_script('bootstrapjsbundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array('bootstrapjs'), '4.3', true);
}
add_action('wp_enqueue_scripts', 'customtheme_add_css_js');

//agregar sidebar
function customtheme_widgets()
{
  register_sidebar(array(
    'name'          => __('Widget Derecha'),
    'id'            => 'widget_right',
    'description'   => __('Arrastra lo que quieras'),
    'before_widget' => '<div id="%1$s" class="card-body">',
    'after_widget'  => '</div>',
  ));
}
add_action('widgets_init', 'customtheme_widgets');

//Menus
function customtheme_register_menus()
{
  register_nav_menus(
    array(
      'header-menu' => __('Menu Header'),
    )
  );
  register_nav_menus(
    array(
      'footer-menu' => __('Menu Footer'),
    )
  );
}
add_action('init', 'customtheme_register_menus');

function customtheme_setup()
{
  //Soporte imagenes destacadas
  if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
  }
  add_theme_support('title-tag');
}

add_action('after_setup_theme', 'customtheme_setup');




function add_custom_theme_options($wp_customize)
{
  $wp_customize->add_section('custom_theme_options', array(
    'title' => 'Textos footer',
    'description' => 'Agrega un titulo personalizado'
  ));

  $wp_customize->add_setting('custom_address', array(
    'default' => 'Dirección',
    'transport' => 'refresh'
  ));

  $wp_customize->add_control('custom_address', array(
    'label' => 'Dirección',
    'section' => 'custom_theme_options',
    'type' => 'text'
  ));

  $wp_customize->add_setting('custom_phone', array(
    'default' => 'Teléfono',
    'transport' => 'refresh'
  ));

  $wp_customize->add_control('custom_phone', array(
    'label' => 'Teléfono',
    'section' => 'custom_theme_options',
    'type' => 'text'
  ));
}
add_action('customize_register', 'add_custom_theme_options');

function add_custom_logo($wp_customize)
{
  $wp_customize->add_section('custom_logo', array(
    'title' => 'Imagen Logo',
    'description' => 'Agrega una imagen personalizada para el logo del sitio.'
  ));

  $wp_customize->add_setting('custom_logo_setting', array(
    'default' => get_stylesheet_directory_uri() . "/files/images/logo.svg",
    'transport' => 'refresh'
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_logo_control', array(
    'label' => 'Imagen Logo Personalizada',
    'section' => 'custom_logo',
    'settings' => 'custom_logo_setting'
  )));
}

add_action('customize_register', 'add_custom_logo');
