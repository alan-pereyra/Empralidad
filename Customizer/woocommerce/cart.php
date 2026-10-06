<?php
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

  $wp_customize->add_section('emp_section_woocommerce_cart', array(
    'title'         => __('Carrito', 'empralidad'),
    'description'   => __('Personaliza la vista y los productos mostrados en la página de carrito cuando está vacío', 'empralidad'),
    'theme_supports'=> array('woocommerce'),
    'priority'      => 4,
    'panel'         => 'woocommerce'
  ));

  // 1. Mostrar u ocultar productos en carrito vacio
  $wp_customize->add_setting('emp_woocommerce_cart_empty_show_products', array(
    'default'          => 'true',
    'transport'        => 'refresh',
    'sanitize_callback'=> 'sanitize_encoded'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_woocommerce_cart_empty_show_products_control', array(
      'label'      => __( 'Mostrar productos en carrito vacío', 'empralidad' ),
      'section'    => 'emp_section_woocommerce_cart',
      'settings'   => 'emp_woocommerce_cart_empty_show_products',
      'type'       => 'checkbox',
      'input_attrs'=> array(
        'class'    => 'd-inline-block'
      )
  )));

  // 2. Titulo del carrito vacio
  $wp_customize->add_setting('emp_woocommerce_cart_empty_title', array(
    'default'          => __('¡Tu carrito está actualmente vacío!', 'empralidad'),
    'transport'        => 'refresh',
    'sanitize_callback'=> 'sanitize_text_field'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_woocommerce_cart_empty_title_control', array(
    'label'   => __('Título de carrito vacío', 'empralidad'),
    'section' => 'emp_section_woocommerce_cart',
    'settings'=> 'emp_woocommerce_cart_empty_title',
    'type'    => 'text'
  )));

  // 3. Titulo de la seccion de productos
  $wp_customize->add_setting('emp_woocommerce_cart_empty_products_title', array(
    'default'          => '',
    'transport'        => 'refresh',
    'sanitize_callback'=> 'sanitize_text_field'
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_woocommerce_cart_empty_products_title_control', array(
    'label'       => __('Título de la sección de productos', 'empralidad'),
    'description' => __('Opcional. Si se deja vacío, tomará automáticamente el nombre de la categoría o etiqueta seleccionada.', 'empralidad'),
    'section'     => 'emp_section_woocommerce_cart',
    'settings'    => 'emp_woocommerce_cart_empty_products_title',
    'type'        => 'text'
  )));

  // 4. Filtrar por (Categoría / Etiqueta / Más recientes)
  $wp_customize->add_setting('emp_woocommerce_cart_empty_filter_type', array(
    'default'          => 'category',
    'transport'        => 'refresh',
    'sanitize_callback'=> 'sanitize_text_field'
  ));
  $wp_customize->add_control('emp_woocommerce_cart_empty_filter_type_control', array(
    'label'       => __( 'Filtrar productos por', 'empralidad' ),
    'section'     => 'emp_section_woocommerce_cart',
    'settings'    => 'emp_woocommerce_cart_empty_filter_type',
    'description' => __( 'Selecciona si deseas mostrar productos por Categoría, Etiqueta, Destacados o los Más recientes.', 'empralidad' ),
    'type'        => 'select',
    'choices'     => array(
      'category' => __( 'Categoría', 'empralidad' ),
      'tag'      => __( 'Etiqueta', 'empralidad' ),
      'featured' => __( 'Productos destacados', 'empralidad' ),
      'recent'   => __( 'Más recientes', 'empralidad' ),
    )
  ));

  // Cargar categorias de WooCommerce
  $cat_choices = array( '' => __( '-- Seleccionar categoría --', 'empralidad' ) );
  if ( taxonomy_exists( 'product_cat' ) ) {
    $categories = get_terms( array(
      'taxonomy'   => 'product_cat',
      'hide_empty' => false,
    ) );
    if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
      foreach ( $categories as $cat ) {
        $cat_choices[ $cat->slug ] = $cat->name;
      }
    }
  }

  // 5. Selector de Categoria
  $wp_customize->add_setting('emp_woocommerce_cart_empty_category', array(
    'default'          => '',
    'transport'        => 'refresh',
    'sanitize_callback'=> 'sanitize_text_field'
  ));
  $wp_customize->add_control('emp_woocommerce_cart_empty_category_control', array(
    'label'       => __( 'Categoría de productos', 'empralidad' ),
    'section'     => 'emp_section_woocommerce_cart',
    'settings'    => 'emp_woocommerce_cart_empty_category',
    'description' => __( 'Se aplica cuando el filtro está configurado en "Categoría".', 'empralidad' ),
    'type'        => 'select',
    'choices'     => $cat_choices
  ));

  // Cargar etiquetas de WooCommerce
  $tag_choices = array( '' => __( '-- Seleccionar etiqueta --', 'empralidad' ) );
  if ( taxonomy_exists( 'product_tag' ) ) {
    $tags = get_terms( array(
      'taxonomy'   => 'product_tag',
      'hide_empty' => false,
    ) );
    if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) {
      foreach ( $tags as $tag ) {
        $tag_choices[ $tag->slug ] = $tag->name;
      }
    }
  }

  // 6. Selector de Etiqueta
  $wp_customize->add_setting('emp_woocommerce_cart_empty_tag', array(
    'default'          => '',
    'transport'        => 'refresh',
    'sanitize_callback'=> 'sanitize_text_field'
  ));
  $wp_customize->add_control('emp_woocommerce_cart_empty_tag_control', array(
    'label'       => __( 'Etiqueta de productos', 'empralidad' ),
    'section'     => 'emp_section_woocommerce_cart',
    'settings'    => 'emp_woocommerce_cart_empty_tag',
    'description' => __( 'Se aplica cuando el filtro está configurado en "Etiqueta" (ej. "para el frio").', 'empralidad' ),
    'type'        => 'select',
    'choices'     => $tag_choices
  ));

  // 7. Cantidad de productos a mostrar
  $wp_customize->add_setting('emp_woocommerce_cart_empty_limit', array(
    'default'           => 4,
    'transport'         => 'refresh',
    'sanitize_callback' => 'absint'
  ));
  $wp_customize->add_control('emp_woocommerce_cart_empty_limit_control', array(
    'label'      => __( 'Cantidad de productos a mostrar', 'empralidad' ),
    'section'    => 'emp_section_woocommerce_cart',
    'settings'   => 'emp_woocommerce_cart_empty_limit',
    'type'       => 'range',
    'input_attrs'=> array(
      'min'      => 2,
      'max'      => 12,
      'step'     => 1,
    )
  ));
}
?>
