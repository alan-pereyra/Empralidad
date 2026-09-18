<?php
// Slider 1
$wp_customize->add_section('emp_section_slider', array(
  'title'      => __('Sliders homepage', 'empralidad'),
  'priority'   => 2,
  'description'=> __('El slider solo se verá en la homepage', 'empralidad')
));

// =============================================
// BADGES / BENEFICIOS DESTACADOS
// =============================================

// Mostrar/Ocultar badges
$wp_customize->add_setting('emp_slider_badges_show', array(
  'default'           => true,
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_slider_badges_show_control', array(
  'label'       => __('Mostrar beneficios bajo el slider', 'empralidad'),
  'section'     => 'emp_section_slider',
  'settings'    => 'emp_slider_badges_show',
  'type'        => 'checkbox'
)));

// Activar/desactivar efecto neón
$wp_customize->add_setting('emp_slider_badges_neon', array(
  'default'           => true,
  'transport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_slider_badges_neon_control', array(
  'label'       => __('Activar efecto neón en iconos', 'empralidad'),
  'section'     => 'emp_section_slider',
  'settings'    => 'emp_slider_badges_neon',
  'type'        => 'checkbox'
)));

$emp_badge_icon_choices = array(
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

// Beneficio 1
$wp_customize->add_setting('emp_slider_badge_icon_1', array(
  'default'           => 'fas fa-truck',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_slider_badge_icon_control_1', array(
  'label'       => __('Icono Beneficio 1', 'empralidad'),
  'section'     => 'emp_section_slider',
  'settings'    => 'emp_slider_badge_icon_1',
  'type'        => 'select',
  'choices'     => $emp_badge_icon_choices
)));
$wp_customize->add_setting('emp_slider_badge_text_1', array(
  'default'           => __('Envío a todo el país', 'empralidad'),
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_slider_badge_text_control_1', array(
  'label'       => __('Texto Beneficio 1', 'empralidad'),
  'section'     => 'emp_section_slider',
  'settings'    => 'emp_slider_badge_text_1',
  'type'        => 'text'
)));

// Beneficio 2
$wp_customize->add_setting('emp_slider_badge_icon_2', array(
  'default'           => 'fas fa-credit-card',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_slider_badge_icon_control_2', array(
  'label'       => __('Icono Beneficio 2', 'empralidad'),
  'section'     => 'emp_section_slider',
  'settings'    => 'emp_slider_badge_icon_2',
  'type'        => 'select',
  'choices'     => $emp_badge_icon_choices
)));
$wp_customize->add_setting('emp_slider_badge_text_2', array(
  'default'           => __('Hasta 6 cuotas sin interés', 'empralidad'),
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_slider_badge_text_control_2', array(
  'label'       => __('Texto Beneficio 2', 'empralidad'),
  'section'     => 'emp_section_slider',
  'settings'    => 'emp_slider_badge_text_2',
  'type'        => 'text'
)));

// Beneficio 3
$wp_customize->add_setting('emp_slider_badge_icon_3', array(
  'default'           => 'fas fa-shield-alt',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_slider_badge_icon_control_3', array(
  'label'       => __('Icono Beneficio 3', 'empralidad'),
  'section'     => 'emp_section_slider',
  'settings'    => 'emp_slider_badge_icon_3',
  'type'        => 'select',
  'choices'     => $emp_badge_icon_choices
)));
$wp_customize->add_setting('emp_slider_badge_text_3', array(
  'default'           => __('Garantía oficial', 'empralidad'),
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_slider_badge_text_control_3', array(
  'label'       => __('Texto Beneficio 3', 'empralidad'),
  'section'     => 'emp_section_slider',
  'settings'    => 'emp_slider_badge_text_3',
  'type'        => 'text'
)));

// Beneficio 4
$wp_customize->add_setting('emp_slider_badge_icon_4', array(
  'default'           => 'fas fa-lock',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_slider_badge_icon_control_4', array(
  'label'       => __('Icono Beneficio 4', 'empralidad'),
  'section'     => 'emp_section_slider',
  'settings'    => 'emp_slider_badge_icon_4',
  'type'        => 'select',
  'choices'     => $emp_badge_icon_choices
)));
$wp_customize->add_setting('emp_slider_badge_text_4', array(
  'default'           => __('Compra 100% protegida', 'empralidad'),
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_slider_badge_text_control_4', array(
  'label'       => __('Texto Beneficio 4', 'empralidad'),
  'section'     => 'emp_section_slider',
  'settings'    => 'emp_slider_badge_text_4',
  'type'        => 'text'
)));
// Sliders show 1
$wp_customize->add_setting('emp_slider_show1', array(
  'default'           => false,
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_slider_show_control1', array(
  'label'   => __( 'Mostrar titulo', 'empralidad' ),
  'section' => 'emp_section_slider',
  'settings'=> 'emp_slider_show1_show',
  'type'  	=> 'checkbox'
)));
// =============================================
// SLIDERS PC / ESCRITORIO (Horizontal 16:9)
// =============================================

// Slider PC 1
$wp_customize->add_setting('emp_slider_desktop_image1', array(
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'emp_slider_desktop_image_control1', array(
  'mime_type'  => 'image',
  'label'      => __('Slider 1 (PC / Escritorio)', 'empralidad'),
  'section'    => 'emp_section_slider',
  'settings'   => 'emp_slider_desktop_image1',
  'description'=> __('Imagen horizontal panorámica para PC (16:9 / 19:9)', 'empralidad')
)));

// Slider PC 2
$wp_customize->add_setting('emp_slider_desktop_image2', array(
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'emp_slider_desktop_image_control2', array(
  'mime_type'  => 'image',
  'label'      => __('Slider 2 (PC / Escritorio)', 'empralidad'),
  'section'    => 'emp_section_slider',
  'settings'   => 'emp_slider_desktop_image2',
  'description'=> __('Imagen horizontal panorámica para PC (16:9 / 19:9)', 'empralidad')
)));

// Slider PC 3
$wp_customize->add_setting('emp_slider_desktop_image3', array(
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'emp_slider_desktop_image_control3', array(
  'mime_type'  => 'image',
  'label'      => __('Slider 3 (PC / Escritorio)', 'empralidad'),
  'section'    => 'emp_section_slider',
  'settings'   => 'emp_slider_desktop_image3',
  'description'=> __('Imagen horizontal panorámica para PC (16:9 / 19:9)', 'empralidad')
)));

// =============================================
// SLIDERS MÓVIL (Vertical / Portrait)
// =============================================

// Slider Móvil 1
$wp_customize->add_setting('emp_slider_image1', array(
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'emp_slider_image_control1', array(
  'mime_type'  => 'image',
  'label'      => __('Slider 1 (Móvil)', 'empralidad'),
  'section'    => 'emp_section_slider',
  'settings'   => 'emp_slider_image1',
  'description'=> __('Imagen vertical para teléfonos móviles (9:16 o 4:5)', 'empralidad')
)));

// Slider Móvil 2
$wp_customize->add_setting('emp_slider_image2', array(
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'emp_slider_image_control2', array(
  'mime_type'  => 'image',
  'label'      => __('Slider 2 (Móvil)', 'empralidad'),
  'section'    => 'emp_section_slider',
  'settings'   => 'emp_slider_image2',
  'description'=> __('Imagen vertical para teléfonos móviles (9:16 o 4:5)', 'empralidad')
)));

// Slider Móvil 3
$wp_customize->add_setting('emp_slider_image3', array(
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'emp_slider_image_control3', array(
  'mime_type'  => 'image',
  'label'      => __('Slider 3 (Móvil)', 'empralidad'),
  'section'    => 'emp_section_slider',
  'settings'   => 'emp_slider_image3',
  'description'=> __('Imagen vertical para teléfonos móviles (9:16 o 4:5)', 'empralidad')
)));
?>
