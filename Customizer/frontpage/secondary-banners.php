<?php
// =============================================
// BANNERS SECUNDARIOS HOMEPAGE
// =============================================

// Sección en Personalizador
$wp_customize->add_section('emp_section_secondary_banners', array(
  'title'       => __('Banners secundarios homepage', 'empralidad'),
  'priority'    => 2.5,
  'description' => __('Banners dobles que se muestran al final de la homepage', 'empralidad')
));

// 1. Activar / Desactivar (Selector booleano)
$wp_customize->add_setting('emp_secondary_banners_show', array(
  'default'           => false,
  'transport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_secondary_banners_show_control', array(
  'label'   => __('Activar / Desactivar', 'empralidad'),
  'section' => 'emp_section_secondary_banners',
  'settings'=> 'emp_secondary_banners_show',
  'type'    => 'checkbox'
)));

// =============================================
// BANNER 1 (PC y Móvil)
// =============================================

// Banner 1 - PC
$wp_customize->add_setting('emp_secondary_banner_desktop_1', array(
  'transport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'emp_secondary_banner_desktop_control_1', array(
  'mime_type'   => 'image',
  'label'       => __('Banner 1 (PC / Escritorio)', 'empralidad'),
  'section'     => 'emp_section_secondary_banners',
  'settings'    => 'emp_secondary_banner_desktop_1',
  'description' => __('Imagen horizontal para pantallas de escritorio', 'empralidad')
)));

// Banner 1 - Móvil
$wp_customize->add_setting('emp_secondary_banner_mobile_1', array(
  'transport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'emp_secondary_banner_mobile_control_1', array(
  'mime_type'   => 'image',
  'label'       => __('Banner 1 (Móvil)', 'empralidad'),
  'section'     => 'emp_section_secondary_banners',
  'settings'    => 'emp_secondary_banner_mobile_1',
  'description' => __('Imagen vertical o adaptable para teléfonos móviles', 'empralidad')
)));

// Banner 1 - Enlace
$wp_customize->add_setting('emp_secondary_banner_link_1', array(
  'transport'         => 'refresh',
  'sanitize_callback' => 'sanitize_url_'
));
$wp_customize->add_control('emp_secondary_banner_link_control_1', array(
  'label'       => __('Enlace Banner 1 (opcional)', 'empralidad'),
  'section'     => 'emp_section_secondary_banners',
  'settings'    => 'emp_secondary_banner_link_1',
  'type'        => 'url',
  'description' => __('URL a la que redirige al hacer clic', 'empralidad')
));

// =============================================
// BANNER 2 (PC y Móvil)
// =============================================

// Banner 2 - PC
$wp_customize->add_setting('emp_secondary_banner_desktop_2', array(
  'transport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'emp_secondary_banner_desktop_control_2', array(
  'mime_type'   => 'image',
  'label'       => __('Banner 2 (PC / Escritorio)', 'empralidad'),
  'section'     => 'emp_section_secondary_banners',
  'settings'    => 'emp_secondary_banner_desktop_2',
  'description' => __('Imagen horizontal para pantallas de escritorio', 'empralidad')
)));

// Banner 2 - Móvil
$wp_customize->add_setting('emp_secondary_banner_mobile_2', array(
  'transport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'emp_secondary_banner_mobile_control_2', array(
  'mime_type'   => 'image',
  'label'       => __('Banner 2 (Móvil)', 'empralidad'),
  'section'     => 'emp_section_secondary_banners',
  'settings'    => 'emp_secondary_banner_mobile_2',
  'description' => __('Imagen vertical o adaptable para teléfonos móviles', 'empralidad')
)));

// Banner 2 - Enlace
$wp_customize->add_setting('emp_secondary_banner_link_2', array(
  'transport'         => 'refresh',
  'sanitize_callback' => 'sanitize_url_'
));
$wp_customize->add_control('emp_secondary_banner_link_control_2', array(
  'label'       => __('Enlace Banner 2 (opcional)', 'empralidad'),
  'section'     => 'emp_section_secondary_banners',
  'settings'    => 'emp_secondary_banner_link_2',
  'type'        => 'url',
  'description' => __('URL a la que redirige al hacer clic', 'empralidad')
));
?>
