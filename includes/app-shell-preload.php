<?php
/**
 * App Shell Skeleton Preload Screen
 * Covers the entire viewport instantly on Frame 0, hiding unstyled content,
 * then smoothly fades out once styles and layout are ready.
 */
if (!defined('ABSPATH')) exit;
?>
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
  function dismissAppShell() {
    var shell = document.getElementById('emp-app-shell-preloader');
    if (!shell || shell.classList.contains('emp-shell-dismissed')) return;
    shell.classList.add('emp-shell-dismissed');
    setTimeout(function() {
      if (shell && shell.parentNode) {
        shell.parentNode.removeChild(shell);
      }
    }, 400);
  }

  // Dismiss when window completes loading or styles are ready
  if (document.readyState === 'complete') {
    dismissAppShell();
  } else {
    window.addEventListener('load', dismissAppShell);
  }

  // Safety fallback timeout
  setTimeout(dismissAppShell, 2200);
})();
</script>
