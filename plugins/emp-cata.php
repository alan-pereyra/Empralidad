<?php
/**
 * Plugin / Shortcode: El Ritual de Cata (Batllié)
 * Shortcode: [batllie_cata] or [emp_cata]
 * Experiencia interactiva a pantalla completa sin scroll, estilo novela visual.
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('batllie_cata_shortcode')) {
    function batllie_cata_shortcode($atts = array()) {
        $atts = shortcode_atts(array(
            'audio_url'        => 'https://cdn.pixabay.com/download/audio/2022/05/27/audio_1808fbf07a.mp3?filename=acoustic-guitar-ambient-relax-112191.mp3',
            'audio_title'      => 'Melodía Ambiental — El Ritual',
            'shop_url'         => home_url('/tienda/'),
            'close_url'        => home_url('/'),
            'logo'             => '',
            'logo_url'         => '',
            'logo_clean_url'   => 'https://empralidad.com.ar/batllie/wp-content/uploads/2026/09/batllie-logo-clean.png',
            'title'            => 'El Ritual de Cata',
            'subtitle'         => 'ALFAJORERÍA DE AUTOR',
        ), $atts, 'batllie_cata');

        $logo_url = !empty($atts['logo']) ? $atts['logo'] : (!empty($atts['logo_url']) ? $atts['logo_url'] : $atts['logo_clean_url']);

        $img_negro  = 'https://empralidad.com.ar/batllie/wp-content/uploads/2026/09/batllie-alfajor-negro-corte.jpg';
        $img_blanco = 'https://empralidad.com.ar/batllie/wp-content/uploads/2026/09/batllie-alfajor-blanco-corte.jpg';

        $steps = array(
            // Step 0: Intro
            array(
                'type'      => 'intro',
                'subtitle'  => 'EL RITUAL DE CATA — ALFAJORERÍA DE AUTOR',
                'desc'      => 'Te invitamos a detener el tiempo. Un recorrido sensorial en tres fases para descubrir los matices, aromas y contrastes de nuestra repostería artesanal.',
                'phase'     => 'Introducción',
                'phase_num' => 0
            ),
            // Fase I
            array(
                'type'        => 'step',
                'phase'       => 'Fase I: La Chispa Viva',
                'phase_num'   => 1,
                'step_num'    => 1,
                'total_steps' => 8,
                'name'        => 'Limón',
                'subtitle'    => 'El Despertar del Paladar',
                'image'       => $img_negro,
                'alt'         => 'Alfajor Batllié de Limón',
                'guide'       => array(
                    'Paso 1: Observación y aroma' => 'Observa el corte dorado del curd y aspira las notas vivas a ralladura fresca de limón.',
                    'Paso 2: El primer bocado'   => 'Muerde despacio. La acidez cítrica despierta las papilas antes de que el chocolate semiamargo temple el final.'
                )
            ),
            array(
                'type'        => 'step',
                'phase'       => 'Fase I: La Chispa Viva',
                'phase_num'   => 1,
                'step_num'    => 2,
                'total_steps' => 8,
                'name'        => 'Batllié Blanco',
                'subtitle'    => 'La Dulzura Cítrica',
                'image'       => $img_blanco,
                'alt'         => 'Alfajor Batllié Blanco',
                'guide'       => array(
                    'Paso 1: Textura del merengue' => 'Siente la superficie crocante del merengue suizo que cede suavemente hacia la masa tierna de cacao.',
                    'Paso 2: Notas de naranja'     => 'El dulce de leche se complementa con la fragancia cítrica en un balance dulce pero vivaz.'
                )
            ),
            // Fase II
            array(
                'type'        => 'step',
                'phase'       => 'Fase II: El Equilibrio Clásico',
                'phase_num'   => 2,
                'step_num'    => 3,
                'total_steps' => 8,
                'name'        => 'Batllié Negro',
                'subtitle'    => 'El Ícono de la Casa',
                'image'       => $img_negro,
                'alt'         => 'Alfajor Batllié Negro Clásico',
                'guide'       => array(
                    'Paso 1: Fragancia tradicional' => 'Inhala la fragancia a repostería artesanal, notas de vainilla y los matices amaderados del coñac.',
                    'Paso 2: Redondez en boca'     => 'El chocolate con leche se funde primero, liberando la cremosidad densa de nuestro dulce de leche insignia.'
                )
            ),
            array(
                'type'        => 'step',
                'phase'       => 'Fase II: El Equilibrio Clásico',
                'phase_num'   => 2,
                'step_num'    => 4,
                'total_steps' => 8,
                'name'        => 'Chocolate Blanco',
                'subtitle'    => 'Sutileza y Pureza',
                'image'       => $img_blanco,
                'alt'         => 'Alfajor Batllié Chocolate Blanco',
                'guide'       => array(
                    'Paso 1: Aroma lácteo' => 'Percibe la nota de manteca de cacao pura y sutil vainilla de la cobertura blanca.',
                    'Paso 2: Armonía pura' => 'La cobertura blanca suaviza la intensidad del cacao oscuro en un contraste aterciopelado.'
                )
            ),
            array(
                'type'        => 'step',
                'phase'       => 'Fase II: El Equilibrio Clásico',
                'phase_num'   => 2,
                'step_num'    => 5,
                'total_steps' => 8,
                'name'        => 'Café Suizo',
                'subtitle'    => 'El Puente Aromático',
                'image'       => $img_blanco,
                'alt'         => 'Alfajor Batllié Café Suizo',
                'guide'       => array(
                    'Paso 1: Notas tostadas'      => 'El aroma a café tostado recién molido anuncia una transición en el viaje sensorial.',
                    'Paso 2: Limpieza de paladar' => 'El ligero amargor del café corta la dulzura y prepara tus sentidos para la fase de mayor intensidad.'
                )
            ),
            // Fase III
            array(
                'type'        => 'step',
                'phase'       => 'Fase III: La Intensidad Absoluta',
                'phase_num'   => 3,
                'step_num'    => 6,
                'total_steps' => 8,
                'name'        => 'Chocolate Intenso',
                'subtitle'    => 'Profundidad de Cacao',
                'image'       => $img_negro,
                'alt'         => 'Alfajor Batllié Chocolate Intenso',
                'guide'       => array(
                    'Paso 1: Aspecto y quiebre'     => 'Observa el brillo satinado y la densidad profunda de la cobertura semiamarga de alta pureza.',
                    'Paso 2: Retrogusto prolongado' => 'Mantén el bocado en el paladar unos segundos para liberar notas tostadas y terrosas de gran persistencia.'
                )
            ),
            array(
                'type'        => 'step',
                'phase'       => 'Fase III: La Intensidad Absoluta',
                'phase_num'   => 3,
                'step_num'    => 7,
                'total_steps' => 8,
                'name'        => 'Nuez',
                'subtitle'    => 'La Tradición Renovada',
                'image'       => $img_blanco,
                'alt'         => 'Alfajor Batllié Nuez',
                'guide'       => array(
                    'Paso 1: Textura crujiente' => 'Siente el contraste crujiente de las nueces tostadas en medio de la masa rústica de algarroba.',
                    'Paso 2: Suspiro de whisky' => 'El whisky añade una nota tibia y aromática que ensalza el perfil silvestre de la nuez.'
                )
            ),
            array(
                'type'        => 'step',
                'phase'       => 'Fase III: La Intensidad Absoluta',
                'phase_num'   => 3,
                'step_num'    => 8,
                'total_steps' => 8,
                'name'        => 'Mousse Nutella',
                'subtitle'    => 'El Clímax de Autor',
                'image'       => $img_negro,
                'alt'         => 'Alfajor Batllié Mousse Nutella',
                'guide'       => array(
                    'Paso 1: Doble textura'  => 'Observa la arquitectura del relleno: la esponjosidad de la mousse y el núcleo cremoso de avellanas.',
                    'Paso 2: El clímax final'=> 'Cierra los ojos en el primer bocado. Es el desenlace sublime de nuestro ritual.'
                )
            ),
            // Step Final (Cierre)
            array(
                'type'        => 'closing',
                'phase'       => 'Conclusión del Ritual',
                'phase_num'   => 4,
                'title'       => 'Alfajorería de autor',
                'desc'        => 'Elaboración artesanal en micro-lotes con manteca 100% y materias primas de primera línea, sin réplica industrial. Edición del día.',
                'extra_msg'   => 'Cada alfajor de Batllié es fruto del respeto por los tiempos de reposo y la pasión por los detalles. Nos alegra que seas parte de esta experiencia única.'
            )
        );

        $uid = 'batllie_cata_' . wp_rand(1000, 9999);

        ob_start();
        ?>
        <div id="<?php echo esc_attr($uid); ?>" class="batllie-cata-root" data-audio="<?php echo esc_url($atts['audio_url']); ?>" data-audio-title="<?php echo esc_attr($atts['audio_title']); ?>">
            <style>
                html.has-batllie-cata,
                body.has-batllie-cata {
                    height: 100% !important;
                    overflow: hidden !important;
                }
                #<?php echo esc_attr($uid); ?>.batllie-cata-root {
                    background-color: #162a1f;
                    bottom: 0;
                    box-sizing: border-box;
                    color: #fdffdd;
                    display: flex;
                    flex-direction: column;
                    font-family: 'Cormorant Garamond', Georgia, serif;
                    height: 100vh;
                    height: 100dvh;
                    justify-content: space-between;
                    left: 0;
                    margin: 0;
                    overflow: hidden;
                    padding: 0;
                    position: fixed;
                    right: 0;
                    top: 0;
                    width: 100vw;
                    z-index: 999999;
                }
                #<?php echo esc_attr($uid); ?>.batllie-cata-root * {
                    box-sizing: border-box;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-header {
                    align-items: center;
                    border-bottom: 1px solid rgba(253, 255, 221, 0.12);
                    display: flex;
                    flex-shrink: 0;
                    height: 52px;
                    justify-content: space-between;
                    padding: 0 20px;
                    position: relative;
                    width: 100%;
                    z-index: 10;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-header-title {
                    color: #fdffdd;
                    flex: 1;
                    font-family: 'Cormorant Garamond', Georgia, serif;
                    font-size: 1.15rem;
                    font-weight: 600;
                    letter-spacing: 3px;
                    text-align: left;
                    text-transform: uppercase;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-top-actions {
                    align-items: center;
                    display: flex;
                    gap: 10px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-audio-btn,
                #<?php echo esc_attr($uid); ?> .batllie-cata-close-btn {
                    align-items: center;
                    background-color: rgba(253, 255, 221, 0.08);
                    border: 1px solid rgba(253, 255, 221, 0.2);
                    border-radius: 20px;
                    color: #fdffdd;
                    cursor: pointer;
                    display: inline-flex;
                    font-family: inherit;
                    font-size: 0.82rem;
                    gap: 6px;
                    height: 30px;
                    justify-content: center;
                    line-height: 1;
                    padding: 0 12px;
                    text-decoration: none;
                    transition: all 0.25s ease;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-close-btn {
                    font-size: 1rem;
                    padding: 0;
                    width: 30px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-audio-btn:hover,
                #<?php echo esc_attr($uid); ?> .batllie-cata-close-btn:hover {
                    background-color: rgba(253, 255, 221, 0.2);
                    border-color: #fdffdd;
                    color: #ffffff;
                    transform: translateY(-1px);
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-audio-waves {
                    display: inline-flex;
                    gap: 3px;
                    height: 12px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-wave-bar {
                    animation: none;
                    background-color: #c4792c;
                    border-radius: 2px;
                    height: 100%;
                    width: 2px;
                }
                #<?php echo esc_attr($uid); ?>.is-playing .batllie-cata-wave-bar:nth-child(1) {
                    animation: batllieWave 0.8s ease-in-out infinite alternate;
                }
                #<?php echo esc_attr($uid); ?>.is-playing .batllie-cata-wave-bar:nth-child(2) {
                    animation: batllieWave 0.6s ease-in-out infinite alternate 0.2s;
                }
                #<?php echo esc_attr($uid); ?>.is-playing .batllie-cata-wave-bar:nth-child(3) {
                    animation: batllieWave 0.9s ease-in-out infinite alternate 0.4s;
                }
                @keyframes batllieWave {
                    0% { transform: scaleY(0.3); }
                    100% { transform: scaleY(1); }
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-progress-bar {
                    background-color: rgba(253, 255, 221, 0.08);
                    display: flex;
                    flex-shrink: 0;
                    height: 3px;
                    width: 100%;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-progress-fill {
                    background: linear-gradient(90deg, #c4792c, #e69d45);
                    height: 100%;
                    transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                    width: 0%;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-viewport {
                    align-items: center;
                    display: flex;
                    flex: 1;
                    justify-content: center;
                    overflow: hidden;
                    padding: 10px 20px;
                    position: relative;
                    width: 100%;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-slide {
                    align-items: center;
                    display: none;
                    flex-direction: column;
                    justify-content: center;
                    max-height: 100%;
                    max-width: 780px;
                    opacity: 0;
                    transform: translateY(6px);
                    transition: opacity 0.3s ease, transform 0.3s ease;
                    width: 100%;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-slide.active {
                    animation: batllieFadeIn 0.3s forwards;
                    display: flex;
                }
                @keyframes batllieFadeIn {
                    0% { opacity: 0; transform: translateY(6px); }
                    100% { opacity: 1; transform: translateY(0); }
                }
                /* Slide Intro */
                #<?php echo esc_attr($uid); ?> .batllie-cata-intro {
                    align-items: center;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    margin: 0 auto;
                    max-width: 600px;
                    text-align: center;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-intro-logo-clean {
                    background: transparent;
                    display: block;
                    height: auto;
                    margin: 0 auto 16px;
                    max-height: 80px;
                    max-width: 260px;
                    object-fit: contain;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-intro-subtitle {
                    color: #c4792c;
                    font-size: 1.1rem;
                    font-weight: 600;
                    letter-spacing: 3px;
                    margin: 0 0 14px 0;
                    text-transform: uppercase;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-intro-desc {
                    color: rgba(253, 255, 221, 0.9);
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                    font-size: 0.95rem;
                    line-height: 1.6;
                    margin: 0 0 20px 0;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-audio-toggle-box {
                    align-items: center;
                    background-color: rgba(253, 255, 221, 0.05);
                    border: 1px solid rgba(253, 255, 221, 0.15);
                    border-radius: 30px;
                    display: flex;
                    gap: 12px;
                    margin-bottom: 22px;
                    padding: 6px 18px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-toggle-label {
                    color: #fdffdd;
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                    font-size: 0.88rem;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-switch {
                    cursor: pointer;
                    display: inline-block;
                    height: 24px;
                    position: relative;
                    width: 44px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-switch input {
                    height: 0;
                    opacity: 0;
                    width: 0;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-slider {
                    background-color: #4a5d52;
                    border-radius: 24px;
                    bottom: 0;
                    left: 0;
                    position: absolute;
                    right: 0;
                    top: 0;
                    transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-slider:before {
                    background-color: #fdffdd;
                    border-radius: 50%;
                    bottom: 3px;
                    content: "";
                    height: 18px;
                    left: 3px;
                    position: absolute;
                    transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                    width: 18px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-switch input:checked + .batllie-cata-slider {
                    background-color: #c4792c;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-switch input:checked + .batllie-cata-slider:before {
                    transform: translateX(20px);
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-btn-start {
                    background-color: #fdffdd;
                    border: none;
                    border-radius: 30px;
                    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
                    color: #162a1f;
                    cursor: pointer;
                    font-family: 'Cormorant Garamond', Georgia, serif;
                    font-size: 1.15rem;
                    font-weight: 700;
                    letter-spacing: 1.5px;
                    padding: 12px 36px;
                    text-transform: uppercase;
                    transition: all 0.3s ease;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-btn-start:hover {
                    background-color: #ffffff;
                    box-shadow: 0 10px 26px rgba(196, 121, 44, 0.35);
                    transform: translateY(-2px);
                }
                /* Slide Step */
                #<?php echo esc_attr($uid); ?> .batllie-cata-step-container {
                    display: flex;
                    flex-direction: column;
                    max-height: 100%;
                    width: 100%;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-step-main-title {
                    color: #fdffdd;
                    font-size: 1.75rem;
                    font-style: italic;
                    font-weight: 500;
                    letter-spacing: 1px;
                    line-height: 1.15;
                    margin: 0 0 10px 0;
                    text-align: center;
                    width: 100%;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-vn-card {
                    background-color: rgba(253, 255, 221, 0.06);
                    border: 1px solid rgba(253, 255, 221, 0.12);
                    border-radius: 12px;
                    margin: 0 auto;
                    max-width: 680px;
                    padding: 12px 18px;
                    width: 100%;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-vn-guide-item {
                    margin-bottom: 8px;
                    padding-bottom: 8px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-vn-guide-item:last-child {
                    border-bottom: none;
                    margin-bottom: 0;
                    padding-bottom: 0;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-vn-guide-item + .batllie-cata-vn-guide-item {
                    border-top: 1px solid rgba(253, 255, 221, 0.1);
                    padding-top: 8px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-vn-guide-label {
                    color: #c4792c;
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                    font-size: 0.8rem;
                    font-weight: 600;
                    margin-bottom: 2px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-vn-guide-text {
                    color: #fdffdd;
                    font-size: 0.95rem;
                    font-style: italic;
                    line-height: 1.35;
                    margin: 0;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-step-img-wrap {
                    align-items: center;
                    display: flex;
                    justify-content: center;
                    margin-top: 10px;
                    overflow: hidden;
                    width: 100%;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-step-img {
                    border-radius: 12px;
                    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.45);
                    display: block;
                    height: auto;
                    margin: 0 auto;
                    max-height: 32vh;
                    max-width: 90%;
                    object-fit: contain;
                }
                /* Slide Closing */
                #<?php echo esc_attr($uid); ?> .batllie-cata-closing {
                    align-items: center;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    margin: 0 auto;
                    max-width: 600px;
                    text-align: center;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-closing h2 {
                    color: #fdffdd;
                    font-size: 2.2rem;
                    font-weight: 500;
                    letter-spacing: 2px;
                    line-height: 1.15;
                    margin: 0 0 16px 0;
                    text-transform: uppercase;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-closing p {
                    color: rgba(253, 255, 221, 0.88);
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                    font-size: 0.95rem;
                    line-height: 1.5;
                    margin: 0 0 10px 0;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-closing-actions {
                    align-items: center;
                    display: flex;
                    flex-direction: column;
                    gap: 12px;
                    justify-content: center;
                    margin-top: 16px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-btn-shop {
                    align-items: center;
                    background-color: #c4792c;
                    border: none;
                    border-radius: 30px;
                    box-shadow: 0 6px 20px rgba(196, 121, 44, 0.4);
                    color: #fdffdd;
                    cursor: pointer;
                    display: inline-flex;
                    font-family: 'Cormorant Garamond', Georgia, serif;
                    font-size: 1.2rem;
                    font-weight: 700;
                    justify-content: center;
                    letter-spacing: 2px;
                    min-height: 52px;
                    padding: 14px 40px;
                    text-decoration: none;
                    text-transform: uppercase;
                    transition: all 0.3s ease;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-btn-shop:hover {
                    background-color: #da8934;
                    box-shadow: 0 10px 25px rgba(196, 121, 44, 0.6);
                    color: #ffffff;
                    transform: translateY(-2px);
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-btn-restart {
                    align-items: center;
                    background-color: transparent;
                    border: 1px solid rgba(253, 255, 221, 0.35);
                    border-radius: 30px;
                    color: #fdffdd;
                    cursor: pointer;
                    display: inline-flex;
                    font-family: 'Cormorant Garamond', Georgia, serif;
                    font-size: 0.95rem;
                    justify-content: center;
                    letter-spacing: 1.5px;
                    min-height: 38px;
                    padding: 8px 24px;
                    text-transform: uppercase;
                    transition: all 0.3s ease;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-btn-restart:hover {
                    background-color: rgba(253, 255, 221, 0.1);
                    border-color: #fdffdd;
                }
                /* Navigation Footer */
                #<?php echo esc_attr($uid); ?> .batllie-cata-nav-footer {
                    align-items: center;
                    border-top: 1px solid rgba(253, 255, 221, 0.12);
                    display: flex;
                    flex-shrink: 0;
                    height: 48px;
                    justify-content: space-between;
                    padding: 0 20px;
                    position: relative;
                    width: 100%;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-nav-btn {
                    align-items: center;
                    background-color: rgba(253, 255, 221, 0.08);
                    border: 1px solid rgba(253, 255, 221, 0.2);
                    border-radius: 20px;
                    color: #fdffdd;
                    cursor: pointer;
                    display: inline-flex;
                    font-family: inherit;
                    font-size: 0.85rem;
                    gap: 6px;
                    height: 30px;
                    line-height: 1;
                    padding: 0 14px;
                    transition: all 0.25s ease;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-nav-btn:hover:not(:disabled) {
                    background-color: rgba(253, 255, 221, 0.2);
                    border-color: #fdffdd;
                    transform: translateY(-1px);
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-nav-btn:disabled {
                    cursor: not-allowed;
                    opacity: 0.3;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-nav-btn-next {
                    background-color: #fdffdd;
                    border-color: #fdffdd;
                    color: #162a1f;
                    font-weight: 700;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-nav-btn-next:hover:not(:disabled) {
                    background-color: #ffffff;
                    box-shadow: 0 3px 12px rgba(253, 255, 221, 0.3);
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-dots {
                    align-items: center;
                    display: flex;
                    gap: 6px;
                    left: 50%;
                    position: absolute;
                    transform: translateX(-50%);
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-dot {
                    background-color: rgba(253, 255, 221, 0.2);
                    border-radius: 50%;
                    cursor: pointer;
                    height: 6px;
                    transition: all 0.3s ease;
                    width: 6px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-dot.active {
                    background-color: #c4792c;
                    transform: scale(1.3);
                }
            </style>

            <!-- Header -->
            <div class="batllie-cata-header">
                <div class="batllie-cata-header-title">
                    <?php echo esc_html($atts['title']); ?>
                </div>
                <div class="batllie-cata-top-actions">
                    <button type="button" class="batllie-cata-audio-btn" aria-label="Control de Audio">
                        <span class="batllie-cata-audio-waves">
                            <span class="batllie-cata-wave-bar"></span>
                            <span class="batllie-cata-wave-bar"></span>
                            <span class="batllie-cata-wave-bar"></span>
                        </span>
                        <span class="batllie-cata-audio-text">Música</span>
                    </button>
                    <a href="<?php echo esc_url($atts['close_url']); ?>" class="batllie-cata-close-btn" aria-label="Cerrar y volver">
                        <span>✕</span>
                    </a>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="batllie-cata-progress-bar">
                <div class="batllie-cata-progress-fill"></div>
            </div>

            <!-- Viewport -->
            <div class="batllie-cata-viewport">
                <?php foreach ($steps as $index => $s): ?>
                    <div class="batllie-cata-slide <?php echo $index === 0 ? 'active' : ''; ?>" data-index="<?php echo $index; ?>" data-type="<?php echo esc_attr($s['type']); ?>">
                        <?php if ($s['type'] === 'intro'): ?>
                            <div class="batllie-cata-intro">
                                <?php if (!empty($logo_url)): ?>
                                    <img src="<?php echo esc_url($logo_url); ?>" alt="Batllié" class="batllie-cata-intro-logo-clean" />
                                <?php endif; ?>
                                <h3 class="batllie-cata-intro-subtitle"><?php echo esc_html($s['subtitle']); ?></h3>
                                <p class="batllie-cata-intro-desc"><?php echo esc_html($s['desc']); ?></p>

                                <div class="batllie-cata-audio-toggle-box">
                                    <span class="batllie-cata-toggle-label">Música ambiental durante la cata:</span>
                                    <label class="batllie-cata-switch" aria-label="Activar música ambiental">
                                        <input type="checkbox" class="batllie-cata-sound-toggle" checked />
                                        <span class="batllie-cata-slider"></span>
                                    </label>
                                </div>

                                <button type="button" class="batllie-cata-btn-start">Iniciar Experiencia</button>
                            </div>
                        <?php elseif ($s['type'] === 'step'): ?>
                            <div class="batllie-cata-step-container">
                                <h2 class="batllie-cata-step-main-title">Paso <?php echo $s['step_num']; ?>: <?php echo esc_html($s['name']); ?> — <?php echo esc_html($s['subtitle']); ?></h2>

                                <div class="batllie-cata-vn-card">
                                    <?php if (!empty($s['guide'])): ?>
                                        <?php foreach ($s['guide'] as $label => $instruction): ?>
                                            <div class="batllie-cata-vn-guide-item">
                                                <div class="batllie-cata-vn-guide-label"><?php echo esc_html($label); ?></div>
                                                <p class="batllie-cata-vn-guide-text"><?php echo esc_html($instruction); ?></p>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>

                                <div class="batllie-cata-step-img-wrap">
                                    <img src="<?php echo esc_url($s['image']); ?>" alt="<?php echo esc_attr($s['alt']); ?>" class="batllie-cata-step-img" />
                                </div>
                            </div>
                        <?php elseif ($s['type'] === 'closing'): ?>
                            <div class="batllie-cata-closing">
                                <h2><?php echo esc_html($s['title']); ?></h2>
                                <?php if (!empty($s['subtitle'])): ?>
                                    <h3><?php echo esc_html($s['subtitle']); ?></h3>
                                <?php endif; ?>
                                <p><?php echo esc_html($s['desc']); ?></p>
                                <p style="font-style: italic; color: #fdffdd;"><?php echo esc_html($s['extra_msg']); ?></p>

                                <div class="batllie-cata-closing-actions">
                                    <a href="<?php echo esc_url($atts['shop_url']); ?>" class="batllie-cata-btn-shop">Pedir Selección de Cata</a>
                                    <button type="button" class="batllie-cata-btn-restart">Reiniciar Ritual</button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Footer Navigation (Hidden on Intro) -->
            <div class="batllie-cata-nav-footer" style="display: none;">
                <button type="button" class="batllie-cata-nav-btn batllie-cata-nav-btn-prev">
                    ← Anterior
                </button>
                <div class="batllie-cata-dots">
                    <?php for ($i = 0; $i < count($steps); $i++): ?>
                        <span class="batllie-cata-dot <?php echo $i === 0 ? 'active' : ''; ?>" data-dot="<?php echo $i; ?>"></span>
                    <?php endfor; ?>
                </div>
                <button type="button" class="batllie-cata-nav-btn batllie-cata-nav-btn-next">
                    Siguiente →
                </button>
            </div>

            <!-- Audio Element -->
            <audio class="batllie-cata-audio-element" preload="auto" loop>
                <source src="<?php echo esc_url($atts['audio_url']); ?>" type="audio/mpeg" />
            </audio>
        </div>

        <script>
        (function() {
            var root = document.getElementById('<?php echo esc_js($uid); ?>');
            if (!root) return;

            // Lock body and html scroll
            document.documentElement.classList.add('has-batllie-cata');
            document.body.classList.add('has-batllie-cata');

            var slides = root.querySelectorAll('.batllie-cata-slide');
            var totalSlides = slides.length;
            var currentIndex = 0;

            var progressBar = root.querySelector('.batllie-cata-progress-fill');
            var navFooter = root.querySelector('.batllie-cata-nav-footer');
            var btnPrev = root.querySelector('.batllie-cata-nav-btn-prev');
            var btnNext = root.querySelector('.batllie-cata-nav-btn-next');
            var dots = root.querySelectorAll('.batllie-cata-dot');

            var btnStart = root.querySelector('.batllie-cata-btn-start');
            var btnRestart = root.querySelector('.batllie-cata-btn-restart');
            var soundToggle = root.querySelector('.batllie-cata-sound-toggle');
            var audioBtn = root.querySelector('.batllie-cata-audio-btn');
            var audioText = root.querySelector('.batllie-cata-audio-text');
            var audio = root.querySelector('.batllie-cata-audio-element');

            var isAudioPlaying = false;

            function updateUI() {
                slides.forEach(function(s, idx) {
                    if (idx === currentIndex) {
                        s.classList.add('active');
                    } else {
                        s.classList.remove('active');
                    }
                });

                dots.forEach(function(d, idx) {
                    if (idx === currentIndex) {
                        d.classList.add('active');
                    } else {
                        d.classList.remove('active');
                    }
                });

                var percent = (currentIndex / (totalSlides - 1)) * 100;
                if (progressBar) {
                    progressBar.style.width = percent + '%';
                }

                if (currentIndex === 0) {
                    navFooter.style.display = 'none';
                } else {
                    navFooter.style.display = 'flex';
                }

                if (btnPrev) {
                    btnPrev.disabled = (currentIndex <= 1);
                }
                if (btnNext) {
                    btnNext.disabled = (currentIndex >= totalSlides - 1);
                    btnNext.style.display = 'inline-flex';
                    btnNext.textContent = (currentIndex === totalSlides - 2) ? 'Finalizar Cata →' : 'Siguiente →';
                }
            }

            function goToSlide(idx) {
                if (idx < 0) idx = 0;
                if (idx >= totalSlides) idx = totalSlides - 1;
                currentIndex = idx;
                updateUI();
            }

            function playAudio() {
                if (!audio) return;
                audio.play().then(function() {
                    isAudioPlaying = true;
                    root.classList.add('is-playing');
                    if (audioText) audioText.textContent = 'Silenciar';
                }).catch(function(err) {
                    console.warn('Audio play was prevented:', err);
                });
            }

            function pauseAudio() {
                if (!audio) return;
                audio.pause();
                isAudioPlaying = false;
                root.classList.remove('is-playing');
                if (audioText) audioText.textContent = 'Música';
            }

            function toggleAudio() {
                if (isAudioPlaying) {
                    pauseAudio();
                } else {
                    playAudio();
                }
            }

            if (btnStart) {
                btnStart.addEventListener('click', function() {
                    if (soundToggle && soundToggle.checked) {
                        playAudio();
                    } else {
                        pauseAudio();
                    }
                    goToSlide(1);
                });
            }

            if (btnRestart) {
                btnRestart.addEventListener('click', function() {
                    goToSlide(0);
                });
            }

            if (btnPrev) {
                btnPrev.addEventListener('click', function() {
                    if (currentIndex > 1) {
                        goToSlide(currentIndex - 1);
                    }
                });
            }

            if (btnNext) {
                btnNext.addEventListener('click', function() {
                    if (currentIndex < totalSlides - 1) {
                        goToSlide(currentIndex + 1);
                    }
                });
            }

            dots.forEach(function(dot) {
                dot.addEventListener('click', function() {
                    var target = parseInt(this.getAttribute('data-dot'), 10);
                    if (!isNaN(target)) {
                        goToSlide(target);
                    }
                });
            });

            if (audioBtn) {
                audioBtn.addEventListener('click', function() {
                    toggleAudio();
                });
            }

            window.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowRight' || e.key === ' ') {
                    if (currentIndex < totalSlides - 1) {
                        e.preventDefault();
                        goToSlide(currentIndex + 1);
                    }
                } else if (e.key === 'ArrowLeft') {
                    if (currentIndex > 1) {
                        e.preventDefault();
                        goToSlide(currentIndex - 1);
                    }
                }
            });

            updateUI();
        })();
        </script>
        <?php
        return ob_get_clean();
    }

    add_shortcode('batllie_cata', 'batllie_cata_shortcode');
    add_shortcode('emp_cata', 'batllie_cata_shortcode');
}
