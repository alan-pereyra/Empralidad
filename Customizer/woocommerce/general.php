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

// 1. Activar desglose de precio de lista y descuento por medio de pago
$wp_customize->add_setting('emp_wc_list_price_discount_enable', array(
  'default'          => false,
  'transport'        => 'refresh',
  'sanitize_callback'=> 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_wc_list_price_discount_enable_control', array(
  'label'       => __('Activar desglose de precio de lista y descuento', 'empralidad'),
  'description' => __('En finalizar compra muestra el precio de lista o el porcentaje de descuento según el medio de pago.', 'empralidad'),
  'section'     => 'emp_woocommerce_general',
  'settings'    => 'emp_wc_list_price_discount_enable',
  'type'        => 'checkbox'
)));

// 2. Porcentaje de aumento y descuento
$wp_customize->add_setting('emp_wc_list_price_discount_percent', array(
  'default'          => 15,
  'transport'        => 'refresh',
  'sanitize_callback'=> 'absint'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_wc_list_price_discount_percent_control', array(
  'label'       => __('Porcentaje de lista y descuento (%)', 'empralidad'),
  'description' => __('Porcentaje de aumento para precio de lista y de descuento para los medios de pago seleccionados (ej: 15).', 'empralidad'),
  'section'     => 'emp_woocommerce_general',
  'settings'    => 'emp_wc_list_price_discount_percent',
  'type'        => 'number',
  'input_attrs' => array(
    'min'  => 1,
    'max'  => 100,
    'step' => 1
  )
)));

// 3. Aplicar descuento a todos los medios de pago
$wp_customize->add_setting('emp_wc_discount_all_gateways', array(
  'default'          => false,
  'transport'        => 'refresh',
  'sanitize_callback'=> 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_wc_discount_all_gateways_control', array(
  'label'       => __('Aplicar descuento a TODOS los medios de pago', 'empralidad'),
  'description' => __('Si está marcado, todos los medios de pago tendrán el descuento. Si no, seleccioná abajo cuáles aplican.', 'empralidad'),
  'section'     => 'emp_woocommerce_general',
  'settings'    => 'emp_wc_discount_all_gateways',
  'type'        => 'checkbox'
)));

// 4. Medios de pago individuales
$gateways_list = array();
if ( class_exists( 'WooCommerce' ) && WC()->payment_gateways() ) {
  $gateways_list = WC()->payment_gateways()->payment_gateways();
}
if ( empty( $gateways_list ) ) {
  $gateways_list = array(
    'bacs'                   => (object) array( 'id' => 'bacs', 'title' => __( 'Transferencia bancaria directa', 'woocommerce' ) ),
    'cod'                    => (object) array( 'id' => 'cod',  'title' => __( 'Pago contra entrega (Efectivo)', 'woocommerce' ) ),
    'cheque'                 => (object) array( 'id' => 'cheque', 'title' => __( 'Pagos por cheque', 'woocommerce' ) ),
    'woo-mercado-pago-basic' => (object) array( 'id' => 'woo-mercado-pago-basic', 'title' => 'Mercado Pago (Checkout Básico)' ),
    'woo-mercado-pago-custom'=> (object) array( 'id' => 'woo-mercado-pago-custom', 'title' => 'Mercado Pago (Checkout Personalizado)' ),
  );
}

foreach ( $gateways_list as $g_id => $g_obj ) {
  $g_title = is_object( $g_obj ) && method_exists( $g_obj, 'get_title' ) ? $g_obj->get_title() : ( isset( $g_obj->title ) ? $g_obj->title : $g_id );
  if ( empty( $g_title ) ) {
    $g_title = $g_id;
  }
  $wp_customize->add_setting( 'emp_wc_discount_gateway_' . $g_id, array(
    'default'           => ( $g_id === 'bacs' ) ? true : false,
    'transport'         => 'refresh',
    'sanitize_callback' => 'sanitize_string'
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'emp_wc_discount_gateway_' . $g_id . '_control', array(
    'label'       => sprintf( __( 'Descuento con: %s', 'empralidad' ), $g_title ),
    'description' => sprintf( __( 'Marcar si aplica descuento con %s (%s).', 'empralidad' ), $g_title, $g_id ),
    'section'     => 'emp_woocommerce_general',
    'settings'    => 'emp_wc_discount_gateway_' . $g_id,
    'type'        => 'checkbox'
  ) ) );
}
?>
