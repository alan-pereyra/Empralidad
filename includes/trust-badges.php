<?php
/**
 * Badges de confianza y beneficios bajo el slider principal
 *
 * @package Empralidad
 */

if (!get_theme_mod('emp_slider_badges_show', true)) {
  return;
}

$badges = array();

$default_icons = array(
  1 => 'fas fa-truck',
  2 => 'fas fa-credit-card',
  3 => 'fas fa-shield-alt',
  4 => 'fas fa-lock'
);

$default_texts = array(
  1 => __('Envío a todo el país', 'empralidad'),
  2 => __('Hasta 6 cuotas sin interés', 'empralidad'),
  3 => __('Garantía oficial', 'empralidad'),
  4 => __('Compra 100% protegida', 'empralidad')
);

for ($i = 1; $i <= 4; $i++) {
  $icon = get_theme_mod('emp_slider_badge_icon_' . $i, $default_icons[$i]);
  $text = get_theme_mod('emp_slider_badge_text_' . $i, $default_texts[$i]);

  if (!empty($icon) || !empty($text)) {
    $badges[] = array(
      'icon' => $icon,
      'text' => $text,
    );
  }
}

if (empty($badges)) {
  return;
}

$badge_count = count($badges);
$has_neon = get_theme_mod('emp_slider_badges_neon', true);
$neon_class = (!empty($has_neon) && $has_neon !== '0' && $has_neon !== 0) ? 'has-neon' : '';
?>
<div id="emp-trust-badges" class="emp-trust-badges-count-<?php echo esc_attr($badge_count); ?> <?php echo esc_attr($neon_class); ?>">
  <div class="emp-trust-badges-wrapper">
    <?php foreach ($badges as $badge) { ?>
      <div class="emp-trust-badge-item">
        <?php if (!empty($badge['icon'])) { ?>
          <i class="<?php echo esc_attr($badge['icon']); ?> emp-trust-badge-icon"></i>
        <?php } ?>
        <?php if (!empty($badge['text'])) { ?>
          <span class="emp-trust-badge-text"><?php echo esc_html($badge['text']); ?></span>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</div>
