<?php
/**
 * Skeleton Preload Component for Empralidad Slider & Hero
 * Provides immediate visual feedback and zero-CLS layout reservation
 */
if (!defined('ABSPATH')) exit;
?>
<div id="emp-slider-skeleton" class="emp-skeleton-overlay" aria-hidden="true">
  <div class="emp-skeleton-shimmer emp-skeleton-hero">
    <div class="emp-skeleton-center-icon">
      <i class="fa fa-image"></i>
    </div>
  </div>
</div>
<script>
(function() {
  function dismissSkeleton() {
    var sk = document.getElementById('emp-slider-skeleton');
    var sliders = document.getElementById('emp-sliders');
    if (!sk) return;
    sk.classList.add('emp-skeleton-fade-out');
    if (sliders) sliders.classList.add('is-loaded');
    setTimeout(function() {
      if (sk && sk.parentNode) {
        sk.parentNode.removeChild(sk);
      }
    }, 400);
  }

  // Dismiss on hero image load, or fallback timeout
  var heroImg = document.querySelector('#emp-sliders img.emp-hero-lcp, #emp-sliders img');
  if (heroImg) {
    if (heroImg.complete && heroImg.naturalWidth > 0) {
      dismissSkeleton();
    } else {
      heroImg.addEventListener('load', dismissSkeleton, { once: true });
      heroImg.addEventListener('error', dismissSkeleton, { once: true });
    }
  }

  // Safety fallback timeout
  setTimeout(dismissSkeleton, 2500);
})();
</script>
