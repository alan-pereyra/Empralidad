<?php
$wp_customize->add_section('emp_section_components_nav', array(
  'title'      => __('Navegación', 'empralidad'),
  'priority'   => 2,
  'panel'      => 'emp_panel_components',
  'description'=> __( 'Propiedades del menú prinipal', 'empralidad' )
));
// Logo
$wp_customize->add_setting('emp_components_nav_logo', array(
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'emp_components_nav_logo_control', array(
  'label'       => __('Logo', 'empralidad'),
  'description' => __( 'Ideal 1:1, máxima 21:9 (horizontal)', 'empralidad' ),
  'section'     => 'emp_section_components_nav',
  'settings'    => 'emp_components_nav_logo',
  'flex_width'  => true,
  'flex_height' => true
  )));
// Text color
$wp_customize->add_setting('emp_components_nav_color', array(
  'default'           => '#ffffff',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_components_nav_color_control', array(
  'label'   => __('Color de texto', 'empralidad'),
  'section' => 'emp_section_components_nav',
  'settings'=> 'emp_components_nav_color'
)));
// Icon color
$wp_customize->add_setting('emp_components_nav_icon_color', array(
  'default'           => '#ffffff',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_components_nav_icon_color_control', array(
  'label'   => __('Color de íconos', 'empralidad'),
  'section' => 'emp_section_components_nav',
  'settings'=> 'emp_components_nav_icon_color'
)));
// Neon effect on icons
$wp_customize->add_setting('emp_components_nav_neon', array(
  'default'           => true,
  'transport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_nav_neon_control', array(
  'label'       => __('Activar efecto neón en iconos', 'empralidad'),
  'section'     => 'emp_section_components_nav',
  'settings'    => 'emp_components_nav_neon',
  'type'        => 'checkbox'
)));
// Background color
$wp_customize->add_setting('emp_components_nav_background', array(
  'default'           => '#000000',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_components_nav_background_control', array(
  'label'   => __('Color de fondo', 'empralidad'),
  'section' => 'emp_section_components_nav',
  'settings'=> 'emp_components_nav_background'
)));
// Background color (mobile)
$wp_customize->add_setting('emp_components_nav_background_mobile', array(
  'default'           => '#000000',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_components_nav_background_mobile_control', array(
  'label'   => __('Color de fondo (Smartphones)', 'empralidad'),
  'section' => 'emp_section_components_nav',
  'settings'=> 'emp_components_nav_background_mobile'
)));
// Accent color
$wp_customize->add_setting('emp_components_nav_color_accent', array(
  'default'           => '#262626',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_components_nav_color_accent_control', array(
  'label'   => __('Color de acentuación', 'empralidad'),
  'section' => 'emp_section_components_nav',
  'settings'=> 'emp_components_nav_color_accent'
)));
// search button
$wp_customize->add_setting('emp_components_nav_search', array(
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_encoded'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_nav_search_control', array(
  'label'   => __( 'Botón de búsqueda', 'empralidad' ),
  'section' => 'emp_section_components_nav',
  'settings'=> 'emp_components_nav_search',
  'type'    => 'checkbox'
)));
// Cart button
$wp_customize->add_setting('emp_components_nav_cart', array(
  'trasnport'        => 'refresh',
  'sanitize_callback'=> 'sanitize_encoded'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_nav_cart_control', array(
  'label'   => __('Botón de carrito', 'empralidad'),
  'section' => 'emp_section_components_nav',
  'settings'=> 'emp_components_nav_cart',
  'type'    => 'checkbox'
)));
// Whatsapp button
$wp_customize->add_setting('emp_components_nav_wsp', array(
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_encoded'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_nav_wsp_control', array(
  'label'   => __('Botón de Whatsapp', 'empralidad'),
  'section' => 'emp_section_components_nav',
  'settings'=> 'emp_components_nav_wsp',
  'type'    => 'checkbox'
)));
// Whatsapp number
$wp_customize->add_setting('emp_components_nav_wsp_numb', array(
  'default' => '',
  'trasnport' => 'refresh',
  'sanitize_callback' => 'sanitize_number'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_nav_wsp_numb_control', array(
  'label'=> __('Número de whatsapp', 'empralidad'),
  'section'=> 'emp_section_components_nav',
  'settings'=> 'emp_components_nav_wsp_numb',
  'description'	  => __( 'Sin espacios ni simbolos (+)', 'empralidad' )
)));
// Whatsapp custom link
$wp_customize->add_setting('emp_components_nav_wsp_custom_link', array(
  'default' => '',
  'trasnport' => 'refresh',
  'sanitize_callback' => 'sanitize_encoded'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_nav_wsp_custom_link_control', array(
  'label'=> __('Link personalizado (whatsapp)', 'empralidad'),
  'section'=> 'emp_section_components_nav',
  'settings'=> 'emp_components_nav_wsp_custom_link',
  'description'	  => __( 'Ingresa un link personalizado (grupo de chat o redireccionador a varios chats)', 'empralidad' )
)));
// Whatsapp Event
$wp_customize->add_setting('emp_components_nav_wsp_event', array(
  'default' => '',
  'trasnport' => 'refresh',
  'sanitize_callback' => 'sanitize_number'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_nav_wsp_event_control', array(
  'label'=> __('Evento onclick (whatsapp)', 'empralidad'),
  'section'=> 'emp_section_components_nav',
  'settings'=> 'emp_components_nav_wsp_event',
  'description'	  => __( 'Esto será ingresado dentro de la etiqueta "onclick"', 'empralidad' )
)));
// Chat-EMP
$wp_customize->add_setting('emp_components_nav_chat_emp', array(
  'default' => '',
  'trasnport' => 'refresh',
  'sanitize_callback' => 'sanitize_encoded'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_nav_chat_emp_control', array(
  'label'=> __('Chat-EMP', 'empralidad'),
  'section'=> 'emp_section_components_nav',
  'settings'=> 'emp_components_nav_chat_emp',
  'description'	  => __( 'URL de página Chat-EMP', 'empralidad' )
)));
// User area
$wp_customize->add_setting('emp_components_nav_user', array(
  'default'           => '',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_encoded'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_nav_user_control', array(
  'label'         => __('Area de clientes', 'empralidad'),
  'section'       => 'emp_section_components_nav',
  'settings'      => 'emp_components_nav_user',
  'description'	  => __( 'Link del de area de clientes, panel de administación o ingresar', 'empralidad' ),

)));
// Home link
$wp_customize->add_setting('emp_components_nav_home', array(
  'default'           => '',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_encoded'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_nav_home_control', array(
  'label'         => __('Home page personalizada', 'empralidad'),
  'section'       => 'emp_section_components_nav',
  'settings'      => 'emp_components_nav_home',
  'description'	  => __( 'Link personalizado de home page (por defecto dejar en blanco)', 'empralidad' ),

)));
?>
