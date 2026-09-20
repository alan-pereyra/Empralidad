<?php
// Include template CSS
function emp_styles(){
  $css_file = get_stylesheet_directory() . '/style.css';
  $theme_version = file_exists($css_file) ? filemtime($css_file) : wp_get_theme()->get('Version');
  wp_enqueue_style ('emp_styles', get_stylesheet_uri(), array(), $theme_version);
  wp_enqueue_style ('cormorant_garamond', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,600&display=swap', array(), null);
  wp_enqueue_style ('font_awesome', get_template_directory_uri() . '/includes/fonts/fa/css/all.min.css', array(), '6.3.0');
}
add_action('wp_enqueue_scripts', 'emp_styles');

// Include template JS
function emp_scripts(){
  $js_file = get_template_directory() . '/includes/js/complements.js';
  $theme_version = file_exists($js_file) ? filemtime($js_file) : wp_get_theme()->get('Version');
  wp_enqueue_script ('emp_complements', get_template_directory_uri() . '/includes/js/complements.js', array('jquery'), $theme_version, true);
}
add_action('wp_enqueue_scripts', 'emp_scripts');

function emp_deregister_styles() {
  wp_deregister_style('wc-block-style');
  wp_deregister_style('woocommerce');
  wp_deregister_style('woocommerce-smallscreen');
  wp_deregister_style('contact-form-7');
  wp_deregister_style('dnd-upload-cf7');
}
add_action('wp_print_styles', 'emp_deregister_styles', 100);
?>
