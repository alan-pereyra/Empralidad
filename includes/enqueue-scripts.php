<?php
// Include template CSS
function emp_styles(){
  $theme_version = wp_get_theme()->get('Version');
  wp_enqueue_style ('emp_styles', get_stylesheet_uri(), array(), $theme_version);
  wp_enqueue_style ('font_awesome', get_template_directory_uri() . '/includes/fonts/fa/css/all.min.css', array(), '6.3.0');
}
add_action('wp_enqueue_scripts', 'emp_styles');

// Include template JS
function emp_scripts(){
  $theme_version = wp_get_theme()->get('Version');
  wp_enqueue_script ('emp_complements', get_template_directory_uri() . '/includes/js/complements.js', array(), $theme_version, true);
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
