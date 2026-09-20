<?php
$wp_customize->add_section('emp_section_components_head', array(
  'title'    => __('Cabecera', 'empralidad'),
  'priority' => 3,
  'panel'    => 'emp_panel_components',
  'description'=> __( 'En la cabecera se encuentra el título principal', 'empralidad' )
));
// Categories adaptability
$wp_customize->add_setting('emp_components_head_title_categories_on', array(
  'default'           => false,
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_head_title_categories_on_control', array(
  'label'   => __( 'Categorías activas', 'empralidad' ),
  'section' => 'emp_section_components_head',
  'settings'=> 'emp_components_head_title_categories_on',
  'type'  	=> 'checkbox'
)));
// Title font size Mobile
$wp_customize->add_setting('emp_components_head_title_size_mobile', array(
  'default'           => 150,
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control('emp_components_head_title_size_mobile_control', array(
  'label'      => __( 'Tamaño del título (mobile)', 'empralidad' ),
  'section'    => 'emp_section_components_head',
  'settings'   => 'emp_components_head_title_size_mobile',
  'type'			 => 'range',
  'input_attrs'=> array(
    'min'      => 15,
    'max'      => 150,
    'step'     => 1,
  )
));
// Title font size
$wp_customize->add_setting('emp_components_head_title_size_medium', array(
  'default'           => 150,
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control('emp_components_head_title_size_medium_control', array(
  'label'      => __( 'Tamaño del título (tablets)', 'empralidad' ),
  'section'    => 'emp_section_components_head',
  'settings'   => 'emp_components_head_title_size_medium',
  'type'			 => 'range',
  'input_attrs'=> array(
    'min'      => 50,
    'max'      => 200,
    'step'     => 1,
  )
));
// Title font size
$wp_customize->add_setting('emp_components_head_title_size_large', array(
  'default'           => 150,
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control('emp_components_head_title_size_large_control', array(
  'label'      => __( 'Tamaño del título (PCs)', 'empralidad' ),
  'section'    => 'emp_section_components_head',
  'settings'   => 'emp_components_head_title_size_large',
  'type'			 => 'range',
  'input_attrs'=> array(
    'min'      => 45,
    'max'      => 250,
    'step'     => 1,
  )
));
// Title font size
$wp_customize->add_setting('emp_components_head_title_size_extralarge', array(
  'default'           => 150,
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control('emp_components_head_title_size_extralarge_control', array(
  'label'      => __( 'Tamaño del título (PCs grandes)', 'empralidad' ),
  'section'    => 'emp_section_components_head',
  'settings'   => 'emp_components_head_title_size_extralarge',
  'type'			 => 'range',
  'input_attrs'=> array(
    'min'      => 45,
    'max'      => 250,
    'step'     => 1,
  )
));
// Margin negative
$wp_customize->add_setting('emp_components_head_title_margin_negative_bottom_show', array(
  'default'           => false,
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_head_title_margin_negative_bottom_show_control', array(
  'label'   => __( 'Margen inferior negativo', 'empralidad' ),
  'section' => 'emp_section_components_head',
  'settings'=> 'emp_components_head_title_margin_negative_bottom_show',
  'type'  	=> 'checkbox'
)));
// Align
$wp_customize->add_setting('emp_components_head_title_align', array(
  'default'           => 'center',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_head_title_align_control1', array(
  'label'          => __( 'Alineación del título', 'empralidad' ),
  'section'        => 'emp_section_components_head',
  'settings'       => 'emp_components_head_title_align',
  'type'           => 'radio',
  'choices'        => array(
    'left'  			 => __( 'Izquierda', 'empralidad' ),
    'center'  		 => __( 'Centro', 'empralidad' ),
    'right'  			 => __( 'Derecha', 'empralidad' )
  )
)));
// Tipography
$wp_customize->add_setting('emp_components_head_title_tipography', array(
  'default'           => 'serif',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_head_title_tipography_control1', array(
  'label'          => __( 'Tipografía del título', 'empralidad' ),
  'section'        => 'emp_section_components_head',
  'settings'       => 'emp_components_head_title_tipography',
  'type'           => 'radio',
  'choices'        => array(
    'serif'  			 => __( 'Serif', 'empralidad' ),
    'sans-serif'   => __( 'Sans-serif', 'empralidad' ),
    'varela round' => __( 'Varela Round', 'empralidad' ),
    'indie flower' => __( 'Indie Flower', 'empralidad' ),
    'roboto' 			 => __('Roboto', 'empralidad'),
    'roboto-cond'  => __('Roboto Condensed Bold', 'empralidad'),
    'barlow-cond'  => __('Barlow Condensed Bold', 'empralidad'),
    'Kumbh Sans'	 => __('Kumbh Sans', 'empralidad'),
    'splinesans'	 => __('Spline Sans', 'empralidad'),
    'ablation'	   => __('Ablation', 'empralidad'),
    'theseasons'	 => __('The Seasons', 'empralidad'),
    'futura'	     => __('Futura', 'empralidad'),
    'nunito'			 => __('Nunito', 'empralidad'),
    'bad script'	 => __('Bad Script', 'empralidad'),
    'cmr10'	       => __('cmr10', 'empralidad'),
    'rozha one'	   => __('Rozha One', 'empralidad'),
    'the secret'	 => __('The Secret', 'empralidad'),
    'flanella'	   => __('Flanella', 'empralidad'),
    'DancingScript'=> __('Dancing Script', 'empralidad'),
    'open dyslexic'=> __('Open dyslexic', 'empralidad'),
    'Cormorant Garamond' => __('Cormorant Garamond', 'empralidad')
  )
)));
// Text font size
$wp_customize->add_setting('emp_components_head_text_size', array(
  'default'           => 40,
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control('emp_components_head_text_size_control', array(
  'label'      => __( 'Tamaño del texto', 'empralidad' ),
  'section'    => 'emp_section_components_head',
  'settings'   => 'emp_components_head_text_size',
  'type'			 => 'range',
  'input_attrs'=> array(
    'min'      => 10,
    'max'      => 90,
    'step'     => 1,
  )
));
$wp_customize->add_setting('emp_components_head_text_tipography', array(
  'default'           => 'serif',
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'emp_components_head_text_tipography_control1', array(
  'label'          => __( 'Tipografía del texto', 'empralidad' ),
  'section'        => 'emp_section_components_head',
  'settings'       => 'emp_components_head_text_tipography',
  'type'           => 'radio',
  'choices'        => array(
    'serif'  			 => __( 'Serif', 'empralidad' ),
    'sans-serif'   => __( 'Sans-serif', 'empralidad' ),
    'varela round' => __( 'Varela Round', 'empralidad' ),
    'indie flower' => __( 'Indie Flower', 'empralidad' ),
    'roboto' 			 => __('Roboto', 'empralidad'),
    'roboto-cond'  => __('Roboto Condensed Bold', 'empralidad'),
    'barlow-cond'  => __('Barlow Condensed Bold', 'empralidad'),
    'splinesans'	 => __('Spline Sans', 'empralidad'),
    'Kumbh Sans'	 => __('Kumbh Sans', 'empralidad'),
    'futura'	     => __('Futura', 'empralidad'),
    'cmr10'	       => __('cmr10', 'empralidad'),
    'nunito'			 => __('Nunito', 'empralidad'),
    'bad script'	 => __('Bad Script', 'empralidad'),
    'rozha one'	   => __('Rozha One', 'empralidad'),
    'the secret'	 => __('The Secret', 'empralidad'),
    'flanella'	   => __('Flanella', 'empralidad'),
    'open dyslexic'=> __('Open dyslexic', 'empralidad'),
    'Cormorant Garamond' => __('Cormorant Garamond', 'empralidad')
  )
)));
// Opacity
$wp_customize->add_setting('emp_components_head_opacity', array(
  'default'           => 0.1,
  'trasnport'         => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control('emp_components_head_opacity_control1', array(
  'label'          => __( 'Opacidad de imagen/video', 'empralidad' ),
  'section'        => 'emp_section_components_head',
  'settings'       => 'emp_components_head_opacity',
  'type'					 => 'range',
  'input_attrs' 	 => array(
    'min'          => 0.01,
    'max'          => 1,
    'step'         => 0.01,
  )
));
// Video background
$wp_customize->add_setting('emp_components_head_video', array(
  'trasnport' => 'refresh',
  'sanitize_callback' => 'sanitize_string',

));
$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'emp_components_head_video_control', array(
  'mime_type'  => 'video',
  'label'      => __('Video de  fondo', 'empralidad'),
  'section'    => 'emp_section_components_head',
  'settings'   => 'emp_components_head_video',
  'description'=> __( 'Seleciona un video de fondo (adaptativo)', 'empralidad' )
)));
// Background color
$wp_customize->add_setting('emp_components_head_title_background', array(
  'default' => '#005777',
  'trasnport' => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_components_head_title_background_control', array(
  'label'=> __('Color de fondo', 'empralidad'),
  'section'=> 'emp_section_components_head',
  'settings'=> 'emp_components_head_title_background'
)));
// Color typography
$wp_customize->add_setting('emp_components_head_title_color', array(
  'default' => '#ffffff',
  'trasnport' => 'refresh',
  'sanitize_callback' => 'sanitize_string'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'emp_components_head_title_color_control', array(
  'label'=> __('Color Texto', 'empralidad'),
  'section'=> 'emp_section_components_head',
  'settings'=> 'emp_components_head_title_color'

)));
?>
