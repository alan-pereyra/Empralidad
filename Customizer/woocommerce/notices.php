<?php
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

  $wp_customize->add_section('emp_section_woocommerce_notices', array(
    'title' => __('Avisos en productos', 'empralidad'),
    'description'   => __('Agrega un texto como aviso en todos los productos'),
    'theme_supports'=> array('woocommerce'),
    'priority'      => 1,
    'panel'         => 'woocommerce'
  ));
  // Show 1
  $wp_customize->add_setting('emp_woocommerce_notices_show1', array(
    'default'          => false,
    'trasnport'        => 'refresh'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_woocommerce_notices_show_control1', array(
      'label'      => __( 'Mostrar', 'empralidad' ),
      'section'    => 'emp_section_woocommerce_notices',
      'settings'   => 'emp_woocommerce_notices_show1',
      'type'    	 => 'checkbox',
      'input_attrs'=> array(
        'class'    => 'd-inline-block'
      )
  )));
  // Text
  $wp_customize->add_setting('emp_woocommerce_notices_text1', array(
    'default'           => '',
    'trasnport'         => 'refresh',
    'sanitize_callback' => 'sanitize_encoded'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_woocommerce_notices_text_control1', array(
    'label'   => __('Texto visible en cada producto', 'empralidad'),
    'section'    => 'emp_section_woocommerce_notices',
    'type'    => 'textarea',
    'settings'=> 'emp_woocommerce_notices_text1'
  )));

  // Cartel añadido al carrito de WooCommerce
  if ( ! $wp_customize->get_setting( 'emp_woocommerce_show_added_to_cart_notice' ) ) {
    $wp_customize->add_setting('emp_woocommerce_show_added_to_cart_notice', array(
      'default'          => false,
      'transport'        => 'refresh',
      'sanitize_callback'=> 'sanitize_string'
    ));
  }
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_woocommerce_show_added_to_cart_notice_notices_control', array(
    'label'       => __('Mostrar cartel de producto añadido al carrito', 'empralidad'),
    'description' => __('Muestra u oculta el aviso de WooCommerce al añadir un producto ("X se ha añadido a tu carrito"). Desactivado por defecto.', 'empralidad'),
    'section'     => 'emp_section_woocommerce_notices',
    'settings'    => 'emp_woocommerce_show_added_to_cart_notice',
    'type'        => 'checkbox'
  )));

}
?>
