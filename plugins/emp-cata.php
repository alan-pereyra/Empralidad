<?php
/**
 * Plugin / Shortcode: El Ritual de Cata (Batllié)
 * Shortcode: [batllie_cata] or [emp_cata]
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('batllie_cata_shortcode')) {
    function batllie_cata_shortcode($atts = array()) {
        $atts = shortcode_atts(array(
            'audio_url'      => 'https://cdn.pixabay.com/download/audio/2022/05/27/audio_1808fbf07a.mp3?filename=acoustic-guitar-ambient-relax-112191.mp3',
            'audio_title'    => 'Melodía Ambiental — El Ritual',
            'shop_url'       => home_url('/tienda/'),
            'logo_url'       => home_url('/wp-content/uploads/2026/09/batllie-logo.png'),
            'title'          => 'El Ritual de Cata',
            'subtitle'       => 'ALFAJORERÍA DE AUTOR',
            'slogan'         => '¿Para qué exagerar?',
            'allow_fullscreen'=> 'true'
        ), $atts, 'batllie_cata');

        // Steps definition with phases and sensorial notes
        $steps = array(
            // Step 0 is Intro
            array(
                'type'        => 'intro',
                'title'       => $atts['slogan'],
                'subtitle'    => $atts['title'] . ' — ' . $atts['subtitle'],
                'desc'        => 'Te invitamos a detener el tiempo. Un recorrido sensorial en tres fases para descubrir los matices, aromas y contrastes de nuestra repostería artesanal.',
                'phase'       => 'Introducción',
                'phase_num'   => 0
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
                'image'       => home_url('/wp-content/uploads/2026/09/producto-alfajor-batllie-negro.jpg'),
                'alt'         => 'Alfajor Batllié de Limón',
                'tags'        => array('Cítrico Vivo', 'Masa Sableé', 'Curd Artesanal', 'Semiamargo'),
                'desc'        => 'Masa sableé de manteca 100% que se deshace al tacto, rellena con un curd artesanal de limón de acidez punzante y viva, envuelto en chocolate semiamargo equilibrante.',
                'guide'       => array(
                    'Paso 1: Observación y aroma' => 'Observa el contraste dorado del curd con la cobertura oscura y aspira las notas vivas a ralladura fresca de limón.',
                    'Paso 2: El primer bocado'   => 'Muerde despacio. Permite que la acidez cítrica despierte tus papilas gustativas antes de que el chocolate semiamargo temple el final.'
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
                'image'       => home_url('/wp-content/uploads/2026/09/producto-alfajor-batllie-blanco.jpg'),
                'alt'         => 'Alfajor Batllié Blanco',
                'tags'        => array('Ralladura de Naranja', 'Dulce de Leche', 'Merengue Suizo 48h', 'Cacao Noble'),
                'desc'        => 'Tapas de cacao infusionadas con ralladura de naranja natural, abundante dulce de leche de campo y un glaseado de merengue suizo que madura durante 48 horas.',
                'guide'       => array(
                    'Paso 1: Textura del merengue' => 'Siente la superficie crocante del merengue suizo que cede suavemente hacia la masa tierna de cacao.',
                    'Paso 2: Notas de naranja'     => 'El dulce de leche se complementa con la fragancia cítrica de la naranja natural en un balance dulce pero vivaz.'
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
                'image'       => home_url('/wp-content/uploads/2026/09/batllie-alfajor-negro-banner.jpg'),
                'alt'         => 'Alfajor Batllié Negro Clásico',
                'tags'        => array('Toque de Coñac', 'Dulce de Leche Clásico', 'Chocolate con Leche', 'Masa Tierna'),
                'desc'        => 'Masa de cacao noble macerada con un sutil toque de coñac, rellena con nuestro dulce de leche tradicional y envuelta en una cobertura de chocolate con leche envolvente.',
                'guide'       => array(
                    'Paso 1: Fragancia tradicional' => 'Inhala la fragancia a repostería tradicional, notas de vainilla y los matices amaderados del coñac.',
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
                'image'       => home_url('/wp-content/uploads/2026/09/batllie-alfajor-blanco-banner.jpg'),
                'alt'         => 'Alfajor Batllié Chocolate Blanco',
                'tags'        => array('Chocolate Blanco Puro', 'Manteca de Cacao', 'Coñac Sutil', 'Dulce de Leche'),
                'desc'        => 'Cacao y coñac en perfecto equilibrio con el dulce de leche, cubierto por una capa generosa de chocolate blanco puro que aporta una redondez láctea inolvidable.',
                'guide'       => array(
                    'Paso 1: Aroma lácteo' => 'Percibe la nota de manteca de cacao pura y sutil vainilla de la cobertura blanca.',
                    'Paso 2: Armonía pura' => 'La cobertura blanca suaviza la intensidad del cacao oscuro, generando un contraste aterciopelado en boca.'
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
                'image'       => home_url('/wp-content/uploads/2026/09/producto-alfajor-batllie-blanco.jpg'),
                'alt'         => 'Alfajor Batllié Café Suizo',
                'tags'        => array('Café de Especialidad', 'Tostado Suave', 'Merengue Suizo', 'Dulce de Leche'),
                'desc'        => 'Tapas infusionadas con notas de café tostado de especialidad, corazón de dulce de leche y corona de merengue suizo reposado 48 horas.',
                'guide'       => array(
                    'Paso 1: Notas tostadas'      => 'El aroma a granos de café tostados recién molidos anuncia una transición en el viaje sensorial.',
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
                'image'       => home_url('/wp-content/uploads/2026/09/producto-alfajor-batllie-negro.jpg'),
                'alt'         => 'Alfajor Batllié Chocolate Intenso',
                'tags'        => array('Semiamargo 70%', 'Cacao Profundo', 'Coñac Añejo', 'Final Prolongado'),
                'desc'        => 'Cuerpo de cacao profundo con coñac, bañado en una cobertura semiamarga de alta concentración que desafía a los amantes del chocolate genuino.',
                'guide'       => array(
                    'Paso 1: Aspecto y quiebre'      => 'Observa el brillo satinado y la densidad profunda de la cobertura semiamarga de alta pureza.',
                    'Paso 2: Retrogusto prolongado'  => 'Mantén el bocado en el paladar unos segundos para liberar notas tostadas y terrosas de gran persistencia.'
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
                'image'       => home_url('/wp-content/uploads/2026/09/producto-alfajor-batllie-blanco.jpg'),
                'alt'         => 'Alfajor Batllié Nuez',
                'tags'        => array('Nuez Tostada', 'Harina de Algarroba', 'Toque de Whisky', 'Textura Crunch'),
                'desc'        => 'Masa rústica elaborada con harina de algarroba y trozos seleccionados de nuez tostada, un suspiro de whisky añejado, dulce de leche y sutil cobertura blanca.',
                'guide'       => array(
                    'Paso 1: Textura crujiente'   => 'Siente el contraste crujiente de las nueces tostadas en medio de la masa rústica de algarroba.',
                    'Paso 2: Suspiro de whisky'   => 'El whisky añade una nota tibia y aromática que ensalza el perfil silvestre de la nuez.'
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
                'image'       => home_url('/wp-content/uploads/2026/09/producto-alfajor-batllie-negro.jpg'),
                'alt'         => 'Alfajor Batllié Mousse Nutella',
                'tags'        => array('Corazón Nutella', 'Mousse Artesanal', 'Avellanas Tostadas', 'Semiamargo'),
                'desc'        => 'Base suave de cacao y coñac, generosa capa de mousse de chocolate artesanal y un corazón fundente de Nutella pura, sellado con chocolate semiamargo.',
                'guide'       => array(
                    'Paso 1: Doble textura'  => 'Observa la arquitectura del relleno: la esponjosidad aireada de la mousse y el núcleo cremoso de avellanas.',
                    'Paso 2: El clímax final'=> 'Cierra los ojos en el primer bocado. Es el desenlace perfecto y sublime de nuestro ritual.'
                )
            ),
            // Step Final (Cierre)
            array(
                'type'        => 'closing',
                'phase'       => 'Conclusión del Ritual',
                'phase_num'   => 4,
                'title'       => 'PIEZAS ÚNICAS',
                'subtitle'    => 'ALFAJORERÍA DE AUTOR',
                'desc'        => 'Elaboración artesanal en micro-lotes con manteca 100% y materias primas de primera línea, sin réplica industrial. Edición del día.',
                'extra_msg'   => 'Cada alfajor de Batllié es fruto del respeto por los tiempos de reposo y la pasión por los detalles. Gracias por acompañarnos en esta experiencia sensorial.'
            )
        );

        $uid = 'batllie_cata_' . wp_rand(1000, 9999);

        ob_start();
        ?>
        <div id="<?php echo esc_attr($uid); ?>" class="batllie-cata-root" data-audio="<?php echo esc_url($atts['audio_url']); ?>" data-audio-title="<?php echo esc_attr($atts['audio_title']); ?>">
            <style>
                #<?php echo esc_attr($uid); ?>.batllie-cata-root {
                    background-color: #162a1f;
                    background-image: radial-gradient(circle at 50% 30%, #1e3a2b 0%, #162a1f 70%, #0d1a13 100%);
                    border-radius: 18px;
                    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.55);
                    box-sizing: border-box;
                    color: #fdffdd;
                    font-family: 'Cormorant Garamond', Georgia, serif;
                    margin: 40px auto;
                    max-width: 960px;
                    min-height: 680px;
                    overflow: hidden;
                    padding: 0;
                    position: relative;
                    transition: all 0.4s ease;
                    width: 100%;
                }
                #<?php echo esc_attr($uid); ?>.batllie-cata-root * {
                    box-sizing: border-box;
                }
                #<?php echo esc_attr($uid); ?>.batllie-cata-root:fullscreen,
                #<?php echo esc_attr($uid); ?>.batllie-cata-root:-webkit-full-screen {
                    border-radius: 0;
                    height: 100vh;
                    margin: 0;
                    max-width: 100vw;
                    width: 100vw;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-header {
                    align-items: center;
                    border-bottom: 1px solid rgba(253, 255, 221, 0.12);
                    display: flex;
                    justify-content: space-between;
                    padding: 20px 30px;
                    position: relative;
                    z-index: 10;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-brand {
                    align-items: center;
                    display: flex;
                    gap: 14px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-logo {
                    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
                    height: 38px;
                    object-fit: contain;
                    width: auto;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-brand-text {
                    color: #fdffdd;
                    font-size: 1.15rem;
                    font-weight: 600;
                    letter-spacing: 3px;
                    text-transform: uppercase;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-top-actions {
                    align-items: center;
                    display: flex;
                    gap: 15px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-audio-btn,
                #<?php echo esc_attr($uid); ?> .batllie-cata-fs-btn {
                    align-items: center;
                    background-color: rgba(253, 255, 221, 0.08);
                    border: 1px solid rgba(253, 255, 221, 0.2);
                    border-radius: 30px;
                    color: #fdffdd;
                    cursor: pointer;
                    display: inline-flex;
                    font-family: inherit;
                    font-size: 0.85rem;
                    gap: 8px;
                    padding: 8px 16px;
                    transition: all 0.25s ease;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-audio-btn:hover,
                #<?php echo esc_attr($uid); ?> .batllie-cata-fs-btn:hover {
                    background-color: rgba(253, 255, 221, 0.2);
                    border-color: #fdffdd;
                    transform: translateY(-1px);
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-audio-waves {
                    display: inline-flex;
                    gap: 3px;
                    height: 14px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-wave-bar {
                    animation: none;
                    background-color: #c4792c;
                    border-radius: 2px;
                    height: 100%;
                    width: 3px;
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
                    height: 6px;
                    width: 100%;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-progress-fill {
                    background: linear-gradient(90deg, #c4792c, #e69d45);
                    height: 100%;
                    transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                    width: 0%;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-viewport {
                    min-height: 520px;
                    padding: 30px;
                    position: relative;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-slide {
                    display: none;
                    opacity: 0;
                    transform: translateY(12px);
                    transition: opacity 0.4s ease, transform 0.4s ease;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-slide.active {
                    animation: batllieFadeIn 0.45s forwards;
                    display: block;
                }
                @keyframes batllieFadeIn {
                    0% { opacity: 0; transform: translateY(12px); }
                    100% { opacity: 1; transform: translateY(0); }
                }
                /* Slide Intro */
                #<?php echo esc_attr($uid); ?> .batllie-cata-intro {
                    align-items: center;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    margin: 30px auto;
                    max-width: 680px;
                    text-align: center;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-intro-logo {
                    height: 72px;
                    margin-bottom: 24px;
                    object-fit: contain;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-intro h2 {
                    color: #fdffdd;
                    font-size: 3.2rem;
                    font-style: italic;
                    font-weight: 500;
                    line-height: 1.1;
                    margin: 0 0 10px 0;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-intro h3 {
                    color: #c4792c;
                    font-size: 1.25rem;
                    font-weight: 600;
                    letter-spacing: 4px;
                    margin: 0 0 25px 0;
                    text-transform: uppercase;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-intro p {
                    color: rgba(253, 255, 221, 0.88);
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                    font-size: 1.05rem;
                    line-height: 1.7;
                    margin: 0 0 35px 0;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-audio-toggle-box {
                    align-items: center;
                    background-color: rgba(253, 255, 221, 0.05);
                    border: 1px solid rgba(253, 255, 221, 0.15);
                    border-radius: 40px;
                    display: flex;
                    gap: 15px;
                    margin-bottom: 35px;
                    padding: 10px 24px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-toggle-label {
                    color: #fdffdd;
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                    font-size: 0.95rem;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-switch {
                    cursor: pointer;
                    display: inline-block;
                    height: 28px;
                    position: relative;
                    width: 52px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-switch input {
                    height: 0;
                    opacity: 0;
                    width: 0;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-slider {
                    background-color: #4a5d52;
                    border-radius: 28px;
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
                    height: 22px;
                    left: 4px;
                    position: absolute;
                    transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                    width: 22px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-switch input:checked + .batllie-cata-slider {
                    background-color: #c4792c;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-switch input:checked + .batllie-cata-slider:before {
                    transform: translateX(23px);
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-btn-start {
                    background-color: #fdffdd;
                    border: none;
                    border-radius: 35px;
                    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
                    color: #162a1f;
                    cursor: pointer;
                    font-family: 'Cormorant Garamond', Georgia, serif;
                    font-size: 1.35rem;
                    font-weight: 700;
                    letter-spacing: 1.5px;
                    padding: 16px 48px;
                    text-transform: uppercase;
                    transition: all 0.3s ease;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-btn-start:hover {
                    background-color: #ffffff;
                    box-shadow: 0 12px 32px rgba(196, 121, 44, 0.35);
                    transform: translateY(-2px);
                }
                /* Slide Step */
                #<?php echo esc_attr($uid); ?> .batllie-cata-step-grid {
                    align-items: center;
                    display: grid;
                    gap: 36px;
                    grid-template-columns: 1.1fr 1.3fr;
                }
                @media (max-width: 768px) {
                    #<?php echo esc_attr($uid); ?> .batllie-cata-step-grid {
                        grid-template-columns: 1fr;
                    }
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-img-wrap {
                    border: 1px solid rgba(253, 255, 221, 0.15);
                    border-radius: 16px;
                    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
                    overflow: hidden;
                    position: relative;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-img {
                    display: block;
                    height: 380px;
                    object-fit: cover;
                    transition: transform 0.6s ease;
                    width: 100%;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-img-wrap:hover .batllie-cata-img {
                    transform: scale(1.04);
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-phase-badge {
                    background-color: rgba(22, 42, 31, 0.88);
                    backdrop-filter: blur(8px);
                    border-bottom-right-radius: 12px;
                    color: #c4792c;
                    font-size: 0.9rem;
                    font-weight: 600;
                    letter-spacing: 2px;
                    left: 0;
                    padding: 8px 16px;
                    position: absolute;
                    text-transform: uppercase;
                    top: 0;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-details {
                    display: flex;
                    flex-direction: column;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-step-header {
                    margin-bottom: 16px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-step-counter {
                    color: #c4792c;
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                    font-size: 0.85rem;
                    font-weight: 600;
                    letter-spacing: 2px;
                    margin-bottom: 6px;
                    text-transform: uppercase;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-step-title {
                    color: #fdffdd;
                    font-size: 2.5rem;
                    font-style: italic;
                    font-weight: 500;
                    line-height: 1.1;
                    margin: 0 0 6px 0;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-step-sub {
                    color: rgba(253, 255, 221, 0.7);
                    font-size: 1.15rem;
                    margin: 0 0 16px 0;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-tags {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 8px;
                    margin-bottom: 20px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-tag {
                    background-color: rgba(196, 121, 44, 0.15);
                    border: 1px solid rgba(196, 121, 44, 0.35);
                    border-radius: 20px;
                    color: #fdffdd;
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                    font-size: 0.78rem;
                    padding: 4px 12px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-vn-card {
                    background-color: rgba(253, 255, 221, 0.06);
                    border: 1px solid rgba(253, 255, 221, 0.12);
                    border-radius: 14px;
                    padding: 20px;
                    position: relative;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-vn-desc {
                    color: rgba(253, 255, 221, 0.92);
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                    font-size: 0.96rem;
                    line-height: 1.6;
                    margin: 0 0 16px 0;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-vn-guide-item {
                    border-top: 1px solid rgba(253, 255, 221, 0.1);
                    margin-top: 12px;
                    padding-top: 12px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-vn-guide-label {
                    color: #c4792c;
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                    font-size: 0.85rem;
                    font-weight: 600;
                    margin-bottom: 4px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-vn-guide-text {
                    color: #fdffdd;
                    font-size: 1.02rem;
                    font-style: italic;
                    line-height: 1.4;
                    margin: 0;
                }
                /* Slide Closing */
                #<?php echo esc_attr($uid); ?> .batllie-cata-closing {
                    align-items: center;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    margin: 30px auto;
                    max-width: 680px;
                    text-align: center;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-closing h2 {
                    color: #fdffdd;
                    font-size: 3.5rem;
                    font-weight: 500;
                    letter-spacing: 2px;
                    line-height: 1.1;
                    margin: 0 0 10px 0;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-closing h3 {
                    color: #c4792c;
                    font-size: 1.25rem;
                    font-weight: 600;
                    letter-spacing: 4px;
                    margin: 0 0 25px 0;
                    text-transform: uppercase;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-closing p {
                    color: rgba(253, 255, 221, 0.88);
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                    font-size: 1.1rem;
                    line-height: 1.7;
                    margin: 0 0 20px 0;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-closing-actions {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 16px;
                    justify-content: center;
                    margin-top: 25px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-btn-shop {
                    background-color: #c4792c;
                    border: none;
                    border-radius: 35px;
                    box-shadow: 0 8px 25px rgba(196, 121, 44, 0.4);
                    color: #fdffdd;
                    cursor: pointer;
                    display: inline-block;
                    font-family: 'Cormorant Garamond', Georgia, serif;
                    font-size: 1.25rem;
                    font-weight: 700;
                    letter-spacing: 1.5px;
                    padding: 14px 40px;
                    text-decoration: none;
                    text-transform: uppercase;
                    transition: all 0.3s ease;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-btn-shop:hover {
                    background-color: #da8934;
                    box-shadow: 0 12px 30px rgba(196, 121, 44, 0.6);
                    color: #ffffff;
                    transform: translateY(-2px);
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-btn-restart {
                    background-color: transparent;
                    border: 1px solid rgba(253, 255, 221, 0.35);
                    border-radius: 35px;
                    color: #fdffdd;
                    cursor: pointer;
                    font-family: 'Cormorant Garamond', Georgia, serif;
                    font-size: 1.15rem;
                    letter-spacing: 1.5px;
                    padding: 14px 32px;
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
                    justify-content: space-between;
                    padding: 20px 30px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-nav-btn {
                    align-items: center;
                    background-color: rgba(253, 255, 221, 0.08);
                    border: 1px solid rgba(253, 255, 221, 0.2);
                    border-radius: 30px;
                    color: #fdffdd;
                    cursor: pointer;
                    display: inline-flex;
                    font-family: inherit;
                    font-size: 1.05rem;
                    gap: 8px;
                    padding: 10px 24px;
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
                    box-shadow: 0 4px 15px rgba(253, 255, 221, 0.3);
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-dots {
                    align-items: center;
                    display: flex;
                    gap: 8px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-dot {
                    background-color: rgba(253, 255, 221, 0.2);
                    border-radius: 50%;
                    cursor: pointer;
                    height: 8px;
                    transition: all 0.3s ease;
                    width: 8px;
                }
                #<?php echo esc_attr($uid); ?> .batllie-cata-dot.active {
                    background-color: #c4792c;
                    transform: scale(1.4);
                }
            </style>

            <!-- Header -->
            <div class="batllie-cata-header">
                <div class="batllie-cata-brand">
                    <?php if (!empty($atts['logo_url'])): ?>
                        <img src="<?php echo esc_url($atts['logo_url']); ?>" alt="Batllié" class="batllie-cata-logo" />
                    <?php endif; ?>
                    <span class="batllie-cata-brand-text"><?php echo esc_html($atts['title']); ?></span>
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
                    <?php if ($atts['allow_fullscreen'] === 'true'): ?>
                        <button type="button" class="batllie-cata-fs-btn" aria-label="Pantalla Completa">
                            <span>⛶</span>
                        </button>
                    <?php endif; ?>
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
                                <?php if (!empty($atts['logo_url'])): ?>
                                    <img src="<?php echo esc_url($atts['logo_url']); ?>" alt="Batllié" class="batllie-cata-intro-logo" />
                                <?php endif; ?>
                                <h2><?php echo esc_html($s['title']); ?></h2>
                                <h3><?php echo esc_html($s['subtitle']); ?></h3>
                                <p><?php echo esc_html($s['desc']); ?></p>

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
                            <div class="batllie-cata-step-grid">
                                <div class="batllie-cata-img-wrap">
                                    <span class="batllie-cata-phase-badge"><?php echo esc_html($s['phase']); ?></span>
                                    <img src="<?php echo esc_url($s['image']); ?>" alt="<?php echo esc_attr($s['alt']); ?>" class="batllie-cata-img" />
                                </div>
                                <div class="batllie-cata-details">
                                    <div class="batllie-cata-step-header">
                                        <div class="batllie-cata-step-counter">Paso <?php echo $s['step_num']; ?> de <?php echo $s['total_steps']; ?></div>
                                        <h3 class="batllie-cata-step-title"><?php echo esc_html($s['name']); ?></h3>
                                        <div class="batllie-cata-step-sub"><?php echo esc_html($s['subtitle']); ?></div>
                                    </div>

                                    <?php if (!empty($s['tags'])): ?>
                                        <div class="batllie-cata-tags">
                                            <?php foreach ($s['tags'] as $tag): ?>
                                                <span class="batllie-cata-tag"><?php echo esc_html($tag); ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="batllie-cata-vn-card">
                                        <p class="batllie-cata-vn-desc"><?php echo esc_html($s['desc']); ?></p>
                                        <?php if (!empty($s['guide'])): ?>
                                            <?php foreach ($s['guide'] as $label => $instruction): ?>
                                                <div class="batllie-cata-vn-guide-item">
                                                    <div class="batllie-cata-vn-guide-label"><?php echo esc_html($label); ?></div>
                                                    <p class="batllie-cata-vn-guide-text"><?php echo esc_html($instruction); ?></p>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php elseif ($s['type'] === 'closing'): ?>
                            <div class="batllie-cata-closing">
                                <h2><?php echo esc_html($s['title']); ?></h2>
                                <h3><?php echo esc_html($s['subtitle']); ?></h3>
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
            var fsBtn = root.querySelector('.batllie-cata-fs-btn');
            var audio = root.querySelector('.batllie-cata-audio-element');

            var isAudioAllowed = true;
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

                // Update Progress Fill
                var percent = (currentIndex / (totalSlides - 1)) * 100;
                if (progressBar) {
                    progressBar.style.width = percent + '%';
                }

                // Show/hide navigation footer
                if (currentIndex === 0) {
                    navFooter.style.display = 'none';
                } else {
                    navFooter.style.display = 'flex';
                }

                // Update Prev/Next buttons
                if (btnPrev) {
                    btnPrev.disabled = (currentIndex <= 1);
                }
                if (btnNext) {
                    if (currentIndex === totalSlides - 1) {
                        btnNext.style.display = 'none';
                    } else {
                        btnNext.style.display = 'inline-flex';
                        btnNext.textContent = (currentIndex === totalSlides - 2) ? 'Finalizar Cata →' : 'Siguiente →';
                    }
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

            // Events
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

            if (fsBtn) {
                fsBtn.addEventListener('click', function() {
                    if (!document.fullscreenElement) {
                        if (root.requestFullscreen) {
                            root.requestFullscreen();
                        } else if (root.webkitRequestFullscreen) {
                            root.webkitRequestFullscreen();
                        }
                    } else {
                        if (document.exitFullscreen) {
                            document.exitFullscreen();
                        }
                    }
                });
            }

            // Keyboard navigation
            window.addEventListener('keydown', function(e) {
                if (!root.contains(document.activeElement) && !document.fullscreenElement) {
                    // Only if user interacted with root or is in fullscreen
                    return;
                }
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
