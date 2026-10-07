<?php
/**
 * Deferred Image Loader for Empralidad Slider
 * Renders the layout and gray placeholder spaces first, then loads images in background.
 */
if (!defined('ABSPATH')) exit;
?>
<script>
(function() {
  function revealSliderImages() {
    var imgs = document.querySelectorAll('#emp-sliders img[data-src]');
    for (var i = 0; i < imgs.length; i++) {
      var img = imgs[i];
      var picture = img.parentElement;
      if (picture && picture.tagName.toLowerCase() === 'picture') {
        var sources = picture.querySelectorAll('source[data-srcset]');
        for (var j = 0; j < sources.length; j++) {
          sources[j].srcset = sources[j].getAttribute('data-srcset');
          sources[j].removeAttribute('data-srcset');
        }
      }
      var realSrc = img.getAttribute('data-src');
      if (realSrc) {
        (function(targetImg, srcUrl) {
          targetImg.onload = function() {
            targetImg.classList.add('is-loaded');
          };
          targetImg.src = srcUrl;
          targetImg.removeAttribute('data-src');
          if (targetImg.complete && targetImg.naturalWidth > 0) {
            targetImg.classList.add('is-loaded');
          }
        })(img, realSrc);
      }
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
      requestAnimationFrame(revealSliderImages);
    });
  } else {
    requestAnimationFrame(revealSliderImages);
  }
})();
</script>
