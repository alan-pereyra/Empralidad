<?php
$wp_customize->add_section('emp_section_components_notice', array(
  'title'    => __('Aviso general', 'empralidad'),
  'priority' => 1,
  'panel'    => 'emp_panel_components',
  'description'=> __( 'Será visible en toda la web excepto en los formularios de contacto', 'empralidad' )
));
// Show
$wp_customize->add_setting('emp_components_notice_show', array(
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_component_show_notice_control', array(
  'label'   => __( 'Mostrar', 'empralidad' ),
  'section' => 'emp_section_components_notice',
  'settings'=> 'emp_components_notice_show',
  'type'  	=> 'checkbox'
)));

// Activar/desactivar efecto neón en iconos del aviso
$wp_customize->add_setting('emp_components_notice_neon', array(
  'default'           => true,
  'transport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_notice_neon_control', array(
  'label'       => __('Activar efecto neón en iconos', 'empralidad'),
  'section'     => 'emp_section_components_notice',
  'settings'    => 'emp_components_notice_neon',
  'type'        => 'checkbox'
)));
// Text
$wp_customize->add_setting('emp_components_notice_text', array(
  'default'           => '',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_notice_text_control', array(
  'label'      => __('Texto simple (opcional / respaldo)', 'empralidad'),
  'section'    => 'emp_section_components_notice',
  'settings'   => 'emp_components_notice_text',
  'type'       => 'text'
)));

// =============================================
// 4 SECCIONES DE ICONO Y TEXTO EN FILA
// =============================================
$emp_notice_icon_choices = array(
  ''                      => __('---- Ninguno ----', 'empralidad'),
  'fas fa-truck'          => __('Camión de envío (fa-truck)', 'empralidad'),
  'fas fa-credit-card'    => __('Tarjeta de crédito (fa-credit-card)', 'empralidad'),
  'fas fa-shield-alt'     => __('Escudo / Garantía (fa-shield-alt)', 'empralidad'),
  'fas fa-lock'           => __('Candado / Seguridad (fa-lock)', 'empralidad'),
  'fas fa-undo'           => __('Devolución / Cambio (fa-undo)', 'empralidad'),
  'fas fa-clock'          => __('Reloj / 24hs (fa-clock)', 'empralidad'),
  'fab fa-whatsapp'       => __('WhatsApp (fa-whatsapp)', 'empralidad'),
  'fas fa-tag'            => __('Etiqueta / Descuento (fa-tag)', 'empralidad'),
  'fas fa-star'           => __('Estrella / Calidad (fa-star)', 'empralidad'),
  'fas fa-award'          => __('Premio / Certificado (fa-award)', 'empralidad'),
  'fas fa-headset'        => __('Atención al cliente (fa-headset)', 'empralidad'),
  'fas fa-box-open'       => __('Paquete / Embalaje (fa-box-open)', 'empralidad'),
  'fas fa-handshake'      => __('Trato / Confianza (fa-handshake)', 'empralidad'),
  'fas fa-check-circle'   => __('Check verificado (fa-check-circle)', 'empralidad'),
  'fas fa-store'          => __('Local a la calle (fa-store)', 'empralidad'),
  'fas fa-money-bill-wave'=> __('Efectivo / Pagos (fa-money-bill-wave)', 'empralidad'),
  'fas fa-bolt'           => __('Envío rápido / Flash (fa-bolt)', 'empralidad'),
  'fas fa-map-marker-alt' => __('Punto de retiro / Ubicación (fa-map-marker-alt)', 'empralidad')
);

// Item 1
$wp_customize->add_setting('emp_components_notice_icon_1', array(
  'default'           => '',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_notice_icon_control_1', array(
  'label'       => __('Icono 1', 'empralidad'),
  'section'     => 'emp_section_components_notice',
  'settings'    => 'emp_components_notice_icon_1',
  'type'        => 'select',
  'choices'     => $emp_notice_icon_choices
)));
$wp_customize->add_setting('emp_components_notice_text_1', array(
  'default'           => '',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_notice_text_control_1', array(
  'label'       => __('Texto 1', 'empralidad'),
  'section'     => 'emp_section_components_notice',
  'settings'    => 'emp_components_notice_text_1',
  'type'        => 'text'
)));

// Item 2
$wp_customize->add_setting('emp_components_notice_icon_2', array(
  'default'           => '',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_notice_icon_control_2', array(
  'label'       => __('Icono 2', 'empralidad'),
  'section'     => 'emp_section_components_notice',
  'settings'    => 'emp_components_notice_icon_2',
  'type'        => 'select',
  'choices'     => $emp_notice_icon_choices
)));
$wp_customize->add_setting('emp_components_notice_text_2', array(
  'default'           => '',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_notice_text_control_2', array(
  'label'       => __('Texto 2', 'empralidad'),
  'section'     => 'emp_section_components_notice',
  'settings'    => 'emp_components_notice_text_2',
  'type'        => 'text'
)));

// Item 3
$wp_customize->add_setting('emp_components_notice_icon_3', array(
  'default'           => '',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_notice_icon_control_3', array(
  'label'       => __('Icono 3', 'empralidad'),
  'section'     => 'emp_section_components_notice',
  'settings'    => 'emp_components_notice_icon_3',
  'type'        => 'select',
  'choices'     => $emp_notice_icon_choices
)));
$wp_customize->add_setting('emp_components_notice_text_3', array(
  'default'           => '',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_notice_text_control_3', array(
  'label'       => __('Texto 3', 'empralidad'),
  'section'     => 'emp_section_components_notice',
  'settings'    => 'emp_components_notice_text_3',
  'type'        => 'text'
)));

// Item 4
$wp_customize->add_setting('emp_components_notice_icon_4', array(
  'default'           => '',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_notice_icon_control_4', array(
  'label'       => __('Icono 4', 'empralidad'),
  'section'     => 'emp_section_components_notice',
  'settings'    => 'emp_components_notice_icon_4',
  'type'        => 'select',
  'choices'     => $emp_notice_icon_choices
)));
$wp_customize->add_setting('emp_components_notice_text_4', array(
  'default'           => '',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_notice_text_control_4', array(
  'label'       => __('Texto 4', 'empralidad'),
  'section'     => 'emp_section_components_notice',
  'settings'    => 'emp_components_notice_text_4',
  'type'        => 'text'
)));
// Primary color
$wp_customize->add_setting('emp_components_notice_background', array(
  'default'           => '#005777',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_components_notice_background_color_control', array(
  'label'   => __('Color de fondo', 'empralidad'),
  'section' => 'emp_section_components_notice',
  'settings'=> 'emp_components_notice_background'

)));
// Text color
$wp_customize->add_setting('emp_components_notice_color', array(
  'default'           => '#ffffff',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_components_notice_color_control', array(
  'label'   => __('Color de texto', 'empralidad'),
  'section' => 'emp_section_components_notice',
  'settings'=> 'emp_components_notice_color'

)));
?>
