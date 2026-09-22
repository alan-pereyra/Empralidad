<?php
$wp_customize->add_section('emp_woocommerce_general', array(
  'title' => __('Configuraciones generales', 'empralidad'),
  'theme_supports'=> array('woocommerce'),
  'priority'      => 3,
  'panel'         => 'woocommerce'
));
$wp_customize->add_setting('emp_woocommerce_color', array(
  'default'          => '#000000',
  'trasnport'        => 'refresh',
  'sanitize_callback'=> 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_woocommerce_color_control', array(
  'label'   => __('Color de texto', 'empralidad'),
  'section'   => 'emp_woocommerce_general',
  'settings'=> 'emp_woocommerce_color'
)));
$wp_customize->add_setting('emp_woocommerce_bg', array(
  'default'          => '#ffffff',
  'trasnport'        => 'refresh',
  'sanitize_callback'=> 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_woocommerce_bg_control', array(
  'label'   => __('Color de fondo', 'empralidad'),
  'section'   => 'emp_woocommerce_general',
  'settings'=> 'emp_woocommerce_bg'
)));

// Tamaño de precio en página de producto
$wp_customize->add_setting('emp_woocommerce_product_price_size', array(
  'default'          => 36,
  'trasnport'        => 'refresh',
  'sanitize_callback'=> 'sanitize_number'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_woocommerce_product_price_size_control', array(
  'label'       => __('Tamaño del precio en producto (px)', 'empralidad'),
  'section'     => 'emp_woocommerce_general',
  'settings'    => 'emp_woocommerce_product_price_size',
  'type'        => 'range',
  'input_attrs' => array(
    'min'  => 18,
    'max'  => 54,
    'step' => 1
  )
)));

// Tamaño de descripción en página de producto
$wp_customize->add_setting('emp_woocommerce_product_desc_size', array(
  'default'          => 15,
  'trasnport'        => 'refresh',
  'sanitize_callback'=> 'sanitize_number'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_woocommerce_product_desc_size_control', array(
  'label'       => __('Tamaño de descripción en producto (px)', 'empralidad'),
  'section'     => 'emp_woocommerce_general',
  'settings'    => 'emp_woocommerce_product_desc_size',
  'type'        => 'range',
  'input_attrs' => array(
    'min'  => 12,
    'max'  => 26,
    'step' => 1
  )
)));

// Color de fondo pestañas / información adicional
$wp_customize->add_setting('emp_woocommerce_tabs_bg', array(
  'default'          => '#000000',
  'trasnport'        => 'refresh',
  'sanitize_callback'=> 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_woocommerce_tabs_bg_control', array(
  'label'   => __('Color de fondo pestañas / info adicional', 'empralidad'),
  'section' => 'emp_woocommerce_general',
  'settings'=> 'emp_woocommerce_tabs_bg'
)));

// Color de texto pestañas / información adicional
$wp_customize->add_setting('emp_woocommerce_tabs_color', array(
  'default'          => '#ffffff',
  'trasnport'        => 'refresh',
  'sanitize_callback'=> 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_woocommerce_tabs_color_control', array(
  'label'   => __('Color de texto pestañas / info adicional', 'empralidad'),
  'section' => 'emp_woocommerce_general',
  'settings'=> 'emp_woocommerce_tabs_color'
)));

// Mostrar cartel de oferta en productos
$wp_customize->add_setting('emp_woocommerce_show_sale_badge', array(
  'default'          => true,
  'trasnport'        => 'refresh',
  'sanitize_callback'=> 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_woocommerce_show_sale_badge_control', array(
  'label'   => __('Mostrar cartel de oferta en productos', 'empralidad'),
  'section' => 'emp_woocommerce_general',
  'settings'=> 'emp_woocommerce_show_sale_badge',
  'type'    => 'checkbox'
)));
?>
