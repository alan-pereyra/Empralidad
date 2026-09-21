<?php
$wp_customize->add_section('emp_section_components_cata', array(
  'title'       => __('El Ritual de Cata', 'empralidad'),
  'priority'    => 7,
  'panel'       => 'emp_panel_components',
  'description' => __('Personalización de colores y elementos de El Ritual de Cata', 'empralidad')
));

// Color de acento / elementos destacados
$wp_customize->add_setting('emp_cata_accent_color', array(
  'default'           => '',
  'transport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_cata_accent_color_control', array(
  'label'       => __('Color de elementos destacados', 'empralidad'),
  'description' => __('Elige el color para la barra de progreso, botón de compra, ondas de audio y títulos de pasos. Si no se elige, se utiliza el color del texto.', 'empralidad'),
  'section'     => 'emp_section_components_cata',
  'settings'    => 'emp_cata_accent_color'
)));
