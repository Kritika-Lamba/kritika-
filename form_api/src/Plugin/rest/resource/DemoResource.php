<?php

namespace Drupal\form_api\Plugin\rest\resource;
use Drupal\Core\Url;
use Drupal\Core\Database\Database;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
/**
 * Provides a Demo Resource
 *
 * @RestResource(
 *   id = "demo_resource",
 *   label = @Translation("Demo Resource"),
 *   uri_paths = {
 *     "canonical" = "/form_api/demo_resource"
 *   }
 * )
 */

class DemoResource extends ResourceBase {

  /**
   * Responds to entity GET requests.
   * @return \Drupal\rest\ResourceResponse
   */
  public function get() {
    #echo "123";die;
    #$conn = Database::getConnection();
    $result = \Drupal::database()->select('registration', 'n')
            ->fields('n', array('pid', 'first_name', 'last_name'))
            ->execute()->fetchAllAssoc('pid');
    #print_r($result);die;
    $result = json_decode(json_encode($result), true);
    #$response = [$result];
    return new ResourceResponse($result);
  }
}

