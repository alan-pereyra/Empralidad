<?php
/**
 * Empralidad WebP Delivery and Automatic Optimization
 * Converts and delivers next-gen WebP images on the fly with GD caching.
 */
if (!defined('ABSPATH')) exit;

if (!function_exists('emp_get_webp_url')) {
  /**
   * Get or generate a WebP version of an image URL.
   *
   * @param string $url Original image URL.
   * @param int $quality WebP quality (default 82).
   * @param int|null $max_width Optional maximum width to downscale large images.
   * @return string WebP URL if available/generated, empty string otherwise.
   */
  function emp_get_webp_url($url, $quality = 82, $max_width = null) {
    if (empty($url) || !is_string($url)) {
      return '';
    }

    // Already a webp or svg
    if (preg_match('/\.(webp|svg)$/i', $url)) {
      return $url;
    }

    // Only process jpg, jpeg, png
    if (!preg_match('/\.(jpe?g|png)$/i', $url)) {
      return '';
    }

    if (!function_exists('wp_upload_dir')) {
      return '';
    }

    $upload_dir = wp_upload_dir();
    $baseurl = $upload_dir['baseurl'];
    $basedir = $upload_dir['basedir'];

    // Check if the image belongs to this WordPress installation's uploads
    if (strpos($url, $baseurl) !== 0) {
      return '';
    }

    $rel_path   = substr($url, strlen($baseurl));
    $file_path  = $basedir . $rel_path;
    $suffix     = ($max_width && is_numeric($max_width)) ? '-' . intval($max_width) . 'w.webp' : '.webp';
    $webp_path  = preg_replace('/\.(jpe?g|png)$/i', $suffix, $file_path);
    $webp_url   = preg_replace('/\.(jpe?g|png)$/i', $suffix, $url);

    // 1. If WebP already exists on disk and is not empty, return immediately
    if (file_exists($webp_path) && filesize($webp_path) > 0) {
      return $webp_url;
    }

    // 2. If original exists on disk and imagewebp is supported, auto-generate WebP
    if (file_exists($file_path) && function_exists('imagewebp')) {
      $info = @getimagesize($file_path);
      if ($info && in_array($info['mime'], array('image/jpeg', 'image/png'))) {
        $img = null;
        if ($info['mime'] === 'image/jpeg') {
          $img = @imagecreatefromjpeg($file_path);
        } elseif ($info['mime'] === 'image/png') {
          $img = @imagecreatefrompng($file_path);
        }

        if ($img) {
          $orig_w = imagesx($img);
          $orig_h = imagesy($img);

          // Handle downscaling if requested and original is wider
          $target_img = $img;
          if ($max_width && $orig_w > $max_width) {
            $new_w = intval($max_width);
            $new_h = intval(round($orig_h * ($new_w / $orig_w)));
            $resized = @imagecreatetruecolor($new_w, $new_h);
            if ($resized) {
              if ($info['mime'] === 'image/png') {
                imagealphablending($resized, false);
                imagesavealpha($resized, true);
              }
              imagecopyresampled($resized, $img, 0, 0, 0, 0, $new_w, $new_h, $orig_w, $orig_h);
              $target_img = $resized;
            }
          }

          if ($info['mime'] === 'image/png') {
            imagepalettetotruecolor($target_img);
            imagealphablending($target_img, true);
            imagesavealpha($target_img, true);
          }

          // Save optimized WebP
          $saved = @imagewebp($target_img, $webp_path, $quality);

          if ($target_img !== $img) {
            @imagedestroy($target_img);
          }
          @imagedestroy($img);

          if ($saved && file_exists($webp_path) && filesize($webp_path) > 0) {
            return $webp_url;
          }
        }
      }
    }

    return '';
  }
}

if (!function_exists('emp_get_image_dimensions')) {
  /**
   * Get image dimensions [width, height] for an attachment ID or image URL.
   *
   * @param int|string $image Attachment ID or image URL.
   * @return array|null Array of [width, height] or null on failure.
   */
  function emp_get_image_dimensions($image) {
    if (empty($image)) {
      return null;
    }

    // 1. If numeric attachment ID
    if (is_numeric($image)) {
      $id = intval($image);
      $meta = wp_get_attachment_metadata($id);
      if (!empty($meta['width']) && !empty($meta['height'])) {
        return array(intval($meta['width']), intval($meta['height']));
      }
      $src = wp_get_attachment_image_src($id, 'full');
      if (!empty($src[1]) && !empty($src[2])) {
        return array(intval($src[1]), intval($src[2]));
      }
    }

    // 2. If URL string
    $url = is_numeric($image) ? wp_get_attachment_url(intval($image)) : (string) $image;
    if (!empty($url) && function_exists('wp_upload_dir')) {
      $upload_dir = wp_upload_dir();
      $baseurl = $upload_dir['baseurl'];
      $basedir = $upload_dir['basedir'];

      if (strpos($url, $baseurl) === 0) {
        $rel_path = substr($url, strlen($baseurl));
        $file_path = $basedir . $rel_path;
        if (file_exists($file_path)) {
          $size = @getimagesize($file_path);
          if (!empty($size[0]) && !empty($size[1])) {
            return array(intval($size[0]), intval($size[1]));
          }
        }
      }
    }

    return null;
  }
}

if (!function_exists('emp_get_image_aspect_ratio')) {
  /**
   * Get CSS aspect-ratio string (e.g. '896 / 1200') for an attachment ID or image URL.
   *
   * @param int|string $image Attachment ID or image URL.
   * @param string $fallback Fallback ratio if dimensions cannot be determined.
   * @return string
   */
  function emp_get_image_aspect_ratio($image, $fallback = '') {
    $dims = emp_get_image_dimensions($image);
    if ($dims && $dims[0] > 0 && $dims[1] > 0) {
      return $dims[0] . ' / ' . $dims[1];
    }
    return $fallback;
  }
}
