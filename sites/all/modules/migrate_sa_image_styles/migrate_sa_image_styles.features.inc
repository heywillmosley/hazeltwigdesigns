<?php
/**
 * @file
 * migrate_sa_image_styles.features.inc
 */

/**
 * Implements hook_image_default_styles().
 */
function migrate_sa_image_styles_image_default_styles() {
  $styles = array();

  // Exported image style: 2x1-hifi.
  $styles['2x1-hifi'] = array(
    'name' => '2x1-hifi',
    'label' => '2x1-hifi',
    'effects' => array(
      13 => array(
        'label' => 'Scale and crop',
        'help' => 'Scale and crop will maintain the aspect-ratio of the original image, then crop the larger dimension. This is most useful for creating perfectly square thumbnails without stretching the image.',
        'effect callback' => 'image_scale_and_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_resize_form',
        'summary theme' => 'image_resize_summary',
        'module' => 'image',
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => '1200',
          'height' => '600',
        ),
        'weight' => '1',
      ),
    ),
  );

  // Exported image style: 3x2.
  $styles['3x2'] = array(
    'name' => '3x2',
    'label' => '3x2',
    'effects' => array(
      2 => array(
        'label' => 'Scale and crop',
        'help' => 'Scale and crop will maintain the aspect-ratio of the original image, then crop the larger dimension. This is most useful for creating perfectly square thumbnails without stretching the image.',
        'effect callback' => 'image_scale_and_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_resize_form',
        'summary theme' => 'image_resize_summary',
        'module' => 'image',
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => '400',
          'height' => '267',
        ),
        'weight' => '1',
      ),
    ),
  );

  // Exported image style: 3x2-hifi.
  $styles['3x2-hifi'] = array(
    'name' => '3x2-hifi',
    'label' => '3x2-hifi',
    'effects' => array(
      4 => array(
        'label' => 'Scale and crop',
        'help' => 'Scale and crop will maintain the aspect-ratio of the original image, then crop the larger dimension. This is most useful for creating perfectly square thumbnails without stretching the image.',
        'effect callback' => 'image_scale_and_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_resize_form',
        'summary theme' => 'image_resize_summary',
        'module' => 'image',
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => '1000',
          'height' => '667',
        ),
        'weight' => '1',
      ),
    ),
  );

  // Exported image style: 3x2-hifi-hero.
  $styles['3x2-hifi-hero'] = array(
    'name' => '3x2-hifi-hero',
    'label' => '3x2-hifi-hero',
    'effects' => array(
      5 => array(
        'label' => 'Scale and crop',
        'help' => 'Scale and crop will maintain the aspect-ratio of the original image, then crop the larger dimension. This is most useful for creating perfectly square thumbnails without stretching the image.',
        'effect callback' => 'image_scale_and_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_resize_form',
        'summary theme' => 'image_resize_summary',
        'module' => 'image',
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => '1410',
          'height' => '940',
        ),
        'weight' => '1',
      ),
    ),
  );

  // Exported image style: 3x2-lofi.
  $styles['3x2-lofi'] = array(
    'name' => '3x2-lofi',
    'label' => '3x2-lofi',
    'effects' => array(
      3 => array(
        'label' => 'Scale and crop',
        'help' => 'Scale and crop will maintain the aspect-ratio of the original image, then crop the larger dimension. This is most useful for creating perfectly square thumbnails without stretching the image.',
        'effect callback' => 'image_scale_and_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_resize_form',
        'summary theme' => 'image_resize_summary',
        'module' => 'image',
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => '700',
          'height' => '467',
        ),
        'weight' => '1',
      ),
    ),
  );

  // Exported image style: logo-1000.
  $styles['logo-1000'] = array(
    'name' => 'logo-1000',
    'label' => 'logo-1000',
    'effects' => array(
      7 => array(
        'label' => 'Scale',
        'help' => 'Scaling will maintain the aspect-ratio of the original image. If only a single dimension is specified, the other dimension will be calculated.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => '1000',
          'height' => '',
          'upscale' => 0,
        ),
        'weight' => '1',
      ),
    ),
  );

  // Exported image style: logo-128.
  $styles['logo-128'] = array(
    'name' => 'logo-128',
    'label' => 'logo-128',
    'effects' => array(
      10 => array(
        'label' => 'Scale',
        'help' => 'Scaling will maintain the aspect-ratio of the original image. If only a single dimension is specified, the other dimension will be calculated.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => '128',
          'height' => '',
          'upscale' => 0,
        ),
        'weight' => '1',
      ),
    ),
  );

  // Exported image style: logo-2000.
  $styles['logo-2000'] = array(
    'name' => 'logo-2000',
    'label' => 'logo-2000',
    'effects' => array(
      6 => array(
        'label' => 'Scale',
        'help' => 'Scaling will maintain the aspect-ratio of the original image. If only a single dimension is specified, the other dimension will be calculated.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => '2000',
          'height' => '',
          'upscale' => 0,
        ),
        'weight' => '1',
      ),
    ),
  );

  // Exported image style: logo-256.
  $styles['logo-256'] = array(
    'name' => 'logo-256',
    'label' => 'logo-256',
    'effects' => array(
      9 => array(
        'label' => 'Scale',
        'help' => 'Scaling will maintain the aspect-ratio of the original image. If only a single dimension is specified, the other dimension will be calculated.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => '256',
          'height' => '',
          'upscale' => 0,
        ),
        'weight' => '1',
      ),
    ),
  );

  // Exported image style: logo-512.
  $styles['logo-512'] = array(
    'name' => 'logo-512',
    'label' => 'logo-512',
    'effects' => array(
      8 => array(
        'label' => 'Scale',
        'help' => 'Scaling will maintain the aspect-ratio of the original image. If only a single dimension is specified, the other dimension will be calculated.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => '512',
          'height' => '',
          'upscale' => 0,
        ),
        'weight' => '1',
      ),
    ),
  );

  // Exported image style: logo-64.
  $styles['logo-64'] = array(
    'name' => 'logo-64',
    'label' => 'logo-64',
    'effects' => array(
      11 => array(
        'label' => 'Scale',
        'help' => 'Scaling will maintain the aspect-ratio of the original image. If only a single dimension is specified, the other dimension will be calculated.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => '64',
          'height' => '',
          'upscale' => 0,
        ),
        'weight' => '1',
      ),
    ),
  );

  // Exported image style: portfolio.
  $styles['portfolio'] = array(
    'name' => 'portfolio',
    'label' => 'portfolio',
    'effects' => array(
      14 => array(
        'label' => 'Scale',
        'help' => 'Scaling will maintain the aspect-ratio of the original image. If only a single dimension is specified, the other dimension will be calculated.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => '1040',
          'height' => '',
          'upscale' => 0,
        ),
        'weight' => '1',
      ),
    ),
  );

  // Exported image style: portfolio-smartphone.
  $styles['portfolio-smartphone'] = array(
    'name' => 'portfolio-smartphone',
    'label' => 'portfolio-smartphone',
    'effects' => array(
      16 => array(
        'label' => 'Scale',
        'help' => 'Scaling will maintain the aspect-ratio of the original image. If only a single dimension is specified, the other dimension will be calculated.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => '320',
          'height' => '',
          'upscale' => 0,
        ),
        'weight' => '1',
      ),
      17 => array(
        'label' => 'Crop',
        'help' => 'Cropping will remove portions of an image to make it the specified dimensions.',
        'effect callback' => 'image_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_crop_form',
        'summary theme' => 'image_crop_summary',
        'module' => 'image',
        'name' => 'image_crop',
        'data' => array(
          'width' => '320',
          'height' => '480',
          'anchor' => 'center-top',
        ),
        'weight' => '2',
      ),
    ),
  );

  // Exported image style: portfolio-thumb.
  $styles['portfolio-thumb'] = array(
    'name' => 'portfolio-thumb',
    'label' => 'portfolio-thumb',
    'effects' => array(
      20 => array(
        'label' => 'Scale and crop',
        'help' => 'Scale and crop will maintain the aspect-ratio of the original image, then crop the larger dimension. This is most useful for creating perfectly square thumbnails without stretching the image.',
        'effect callback' => 'image_scale_and_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_resize_form',
        'summary theme' => 'image_resize_summary',
        'module' => 'image',
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => '400',
          'height' => '400',
        ),
        'weight' => '1',
      ),
    ),
  );

  // Exported image style: sq-thumb.
  $styles['sq-thumb'] = array(
    'name' => 'sq-thumb',
    'label' => 'sq-thumb',
    'effects' => array(
      12 => array(
        'label' => 'Scale and crop',
        'help' => 'Scale and crop will maintain the aspect-ratio of the original image, then crop the larger dimension. This is most useful for creating perfectly square thumbnails without stretching the image.',
        'effect callback' => 'image_scale_and_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_resize_form',
        'summary theme' => 'image_resize_summary',
        'module' => 'image',
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => '100',
          'height' => '100',
        ),
        'weight' => '1',
      ),
    ),
  );

  // Exported image style: w680.
  $styles['w680'] = array(
    'name' => 'w680',
    'label' => 'w680',
    'effects' => array(
      21 => array(
        'label' => 'Scale',
        'help' => 'Scaling will maintain the aspect-ratio of the original image. If only a single dimension is specified, the other dimension will be calculated.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => '680',
          'height' => '',
          'upscale' => 0,
        ),
        'weight' => '1',
      ),
    ),
  );

  return $styles;
}
