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

// Estrellas de calificación - Color
$wp_customize->add_setting('emp_woocommerce_stars_color', array(
  'default'          => '#ffb800',
  'transport'        => 'refresh',
  'sanitize_callback'=> 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_woocommerce_stars_color_control', array(
  'label'       => __('Color de estrellas (calificación)', 'empralidad'),
  'description' => __('Color para las estrellas activas/rellenas de valoración.', 'empralidad'),
  'section'     => 'emp_woocommerce_general',
  'settings'    => 'emp_woocommerce_stars_color'
)));

// Estrellas de calificación - Fondo de estrellas (vacías)
$wp_customize->add_setting('emp_woocommerce_stars_empty_color', array(
  'default'          => '#d1d5db',
  'transport'        => 'refresh',
  'sanitize_callback'=> 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_woocommerce_stars_empty_color_control', array(
  'label'       => __('Color de fondo de estrellas (vacías)', 'empralidad'),
  'description' => __('Color para las estrellas vacías o inactivas de fondo.', 'empralidad'),
  'section'     => 'emp_woocommerce_general',
  'settings'    => 'emp_woocommerce_stars_empty_color'
)));

// Estrellas de calificación - Fondo del contenedor
$wp_customize->add_setting('emp_woocommerce_stars_bg', array(
  'default'          => 'transparent',
  'transport'        => 'refresh',
  'sanitize_callback'=> 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_woocommerce_stars_bg_control', array(
  'label'       => __('Color de fondo de contenedor de estrellas', 'empralidad'),
  'description' => __('Color de fondo para el contenedor de la calificación (por defecto transparente).', 'empralidad'),
  'section'     => 'emp_woocommerce_general',
  'settings'    => 'emp_woocommerce_stars_bg'
)));

// Estrellas de calificación - Color de texto
$wp_customize->add_setting('emp_woocommerce_stars_text_color', array(
  'default'          => '',
  'transport'        => 'refresh',
  'sanitize_callback'=> 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_woocommerce_stars_text_color_control', array(
  'label'       => __('Color de texto de valoraciones', 'empralidad'),
  'description' => __('Color para el texto o enlace de número de opiniones.', 'empralidad'),
  'section'     => 'emp_woocommerce_general',
  'settings'    => 'emp_woocommerce_stars_text_color'
)));

// Estrellas de calificación - Escala porcentual de tamaño
$wp_customize->add_setting('emp_woocommerce_stars_scale', array(
  'default'          => 100,
  'transport'        => 'refresh',
  'sanitize_callback'=> 'absint'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_woocommerce_stars_scale_control', array(
  'label'       => __('Tamaño de estrellas (%)', 'empralidad'),
  'description' => __('Modificador porcentual: aumenta o disminuye tanto las estrellas grandes (producto) como las chicas (catálogo y reseñas) manteniendo su proporción relativa.', 'empralidad'),
  'section'     => 'emp_woocommerce_general',
  'settings'    => 'emp_woocommerce_stars_scale',
  'type'        => 'range',
  'input_attrs' => array(
    'min'  => 50,
    'max'  => 200,
    'step' => 5
  )
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

// Mostrar cartel de producto añadido al carrito
if ( ! $wp_customize->get_setting( 'emp_woocommerce_show_added_to_cart_notice' ) ) {
  $wp_customize->add_setting('emp_woocommerce_show_added_to_cart_notice', array(
    'default'          => false,
    'transport'        => 'refresh',
    'sanitize_callback'=> 'sanitize_string'
  ));
}
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_woocommerce_show_added_to_cart_notice_control', array(
  'label'       => __('Mostrar cartel de producto añadido al carrito', 'empralidad'),
  'description' => __('Muestra u oculta el aviso de WooCommerce al añadir un producto ("X se ha añadido a tu carrito"). Desactivado por defecto.', 'empralidad'),
  'section'     => 'emp_woocommerce_general',
  'settings'    => 'emp_woocommerce_show_added_to_cart_notice',
  'type'        => 'checkbox'
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
