<?php

namespace Drupal\your_library\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\views\Views;

/**
 * Provides a 'Your' Block.
 *
 * @Block(
 *   id = "your_library",
 *   admin_label = @Translation("Your Library"),
 *   category = @Translation("Your Library"),
 * )
 */

class YourLibrary extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    
    $content1['playlists']['view'] = views_embed_view('playlists', 'block_1');
    $content2['following_artists']['view'] = views_embed_view('following_artists', 'block_1');
    $result = array_merge($content1,$content2);

      return [
        '#theme' => 'hello_block',
        '#data' => $result,
        '#attached' => [
          'library' => [
            'your_library/global-styling',
          ],
        ],
        '#cache' => array(
          'max-age' => 0,
        ),
      ];
  }
}