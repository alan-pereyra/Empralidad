<?php
/**
 * App Shell Skeleton Preload Screen
 * Covers the entire viewport instantly on Frame 0, hiding unstyled content,
 * and remains active until style.css and hero content are 100% loaded and applied.
 */
if (!defined('ABSPATH')) exit;
?>
<div id="emp-style-marker" aria-hidden="true"></div>
<div id="emp-app-shell-preloader" aria-hidden="true">
  <div class="emp-shell-header">
    <div class="emp-shell-btn"></div>
    <div class="emp-shell-brand"></div>
    <div class="emp-shell-cart"></div>
  </div>
  <div class="emp-shell-body">
    <div class="emp-shell-slider"></div>
    <div class="emp-shell-badges">
      <div class="emp-shell-badge"></div>
      <div class="emp-shell-badge"></div>
      <div class="emp-shell-badge"></div>
    </div>
    <div class="emp-shell-grid">
      <div class="emp-shell-card">
        <div class="emp-shell-card-img"></div>
        <div class="emp-shell-card-text"></div>
      </div>
      <div class="emp-shell-card">
        <div class="emp-shell-card-img"></div>
        <div class="emp-shell-card-text"></div>
      </div>
    </div>
  </div>
  <div class="emp-shell-bottom-bar">
    <div class="emp-shell-nav-item"></div>
    <div class="emp-shell-nav-item"></div>
    <div class="emp-shell-nav-item"></div>
  </div>
</div>
<script>
(function() {
  var isDismissed = false;

  function isStyleApplied() {
    var marker = document.getElementById('emp-style-marker');
    if (!marker) return false;
    var style = window.getComputedStyle(marker);
    return style.zIndex === '123456';
  }

  function isHeroReady() {
    var heroImg = document.querySelector('#emp-sliders img');
    if (!heroImg) return true;
    return (heroImg.complete && heroImg.naturalWidth > 0);
  }

  function dismissAppShell() {
    if (isDismissed) return;
    isDismissed = true;
    var shell = document.getElementById('emp-app-shell-preloader');

    // 1. Reveal the fully styled page underneath
    if (document.body) {
      document.body.classList.remove('emp-loading');
      document.body.classList.add('emp-loaded');
    }

    // 2. Smoothly fade out the skeleton preloader
    if (shell) {
      shell.classList.add('emp-shell-dismissed');
      setTimeout(function() {
        if (shell && shell.parentNode) {
          shell.parentNode.removeChild(shell);
        }
      }, 450);
    }
  }

  // Poll with requestAnimationFrame until style.css is 100% computed & applied
  function verifyReadiness() {
    if (isDismissed) return;

    var styleReady = isStyleApplied();
    var heroReady = isHeroReady();

    if (styleReady && heroReady) {
      // Small pause to guarantee browser paint of styled DOM before revealing
      requestAnimationFrame(function() {
        setTimeout(dismissAppShell, 60);
      });
    } else {
      requestAnimationFrame(verifyReadiness);
    }
  }

  // Start polling immediately
  requestAnimationFrame(verifyReadiness);

  // Safety fallback timeout in case of network anomaly (e.g. broken image)
  setTimeout(dismissAppShell, 4500);
})();
</script>
