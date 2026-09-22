<?php
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

  $wp_customize->add_section('emp_section_woocommerce_categories', array(
    'title' => __('Categorias destacadas', 'empralidad'),
    'description'   => __('Las categorias destacadas se verán en la homepage'),
    'theme_supports'=> array('woocommerce'),
    'priority'      => 3,
    'panel'         => 'woocommerce'
  ));
  // Show
  $wp_customize->add_setting('emp_woocommerce_categories_show', array(
    'trasnport'        => 'refresh',
    'sanitize_callback'=> 'sanitize_encoded'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_woocommerce_categories_show_control', array(
      'label'      => __( 'Mostrar u Ocultar', 'empralidad' ),
      'section'    => 'emp_section_woocommerce_categories',
      'settings'   => 'emp_woocommerce_categories_show',
      'type'    	 => 'checkbox',
      'input_attrs'=> array(
        'class'    => 'd-inline-block'
      )
  )));
  // Categories size
  $wp_customize->add_setting('emp_woocommerce_category_size', array(
    'default'           => 30,
    'trasnport'         => 'refresh',
    'sanitize_callback' => 'sanitize_string'
  ));
  $wp_customize->add_control('emp_woocommerce_category_size_control', array(
    'label'      => __( 'Tamaño de categorias destacadas', 'empralidad' ),
    'section'    => 'emp_section_woocommerce_categories',
    'settings'   => 'emp_woocommerce_category_size',
    'description'=> __('(solo dispositivos grandes)','empralidad'),
    'type'			 => 'range',
    'input_attrs'=> array(
      'min'      => 12,
      'max'      => 42,
      'step'     => .1,
    )
  ));
  // Show label
  $wp_customize->add_setting('emp_woocommerce_categories_label_show', array(
    'trasnport'        => 'refresh',
    'sanitize_callback'=> 'sanitize_encoded'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_woocommerce_categories_label_show_control', array(
      'label'      => __( 'Mostrar u Ocultar titulo de categoria', 'empralidad' ),
      'section'    => 'emp_section_woocommerce_categories',
      'settings'   => 'emp_woocommerce_categories_label_show',
      'type'    	 => 'checkbox',
      'input_attrs'=> array(
        'class'    => 'd-inline-block'
      )
  )));
  // Mobile rows
  $wp_customize->add_setting('emp_woocommerce_categories_mobile_rows', array(
    'default'           => '2',
    'trasnport'         => 'refresh',
    'sanitize_callback' => 'sanitize_string'
  ));
  $wp_customize->add_control('emp_woocommerce_categories_mobile_rows_control', array(
    'label'       => __( 'Filas en celular (Estilo 1)', 'empralidad' ),
    'section'     => 'emp_section_woocommerce_categories',
    'settings'    => 'emp_woocommerce_categories_mobile_rows',
    'description' => __( 'Selecciona si se muestra 1 fila (3 por vista) o 2 filas (6 por vista) en dispositivos móviles para el Estilo 1.', 'empralidad' ),
    'type'        => 'select',
    'choices'     => array(
      '1' => __( '1 Fila', 'empralidad' ),
      '2' => __( '2 Filas', 'empralidad' ),
    )
  ));
  // Categories style
  $wp_customize->add_setting('emp_woocommerce_categories_style', array(
    'default'           => '1',
    'trasnport'         => 'refresh',
    'sanitize_callback' => 'sanitize_string'
  ));
  $wp_customize->add_control('emp_woocommerce_categories_style_control', array(
    'label'       => __( 'Estilo de categorias destacadas', 'empralidad' ),
    'section'     => 'emp_section_woocommerce_categories',
    'settings'    => 'emp_woocommerce_categories_style',
    'description' => __( 'Elige entre el Estilo 1 (carrusel tradicional) o Estilo 2 (fila única con scroll libre e imágenes circulares).', 'empralidad' ),
    'type'        => 'select',
    'choices'     => array(
      '1' => __( 'Estilo 1', 'empralidad' ),
      '2' => __( 'Estilo 2', 'empralidad' ),
    )
  ));
}
?>
