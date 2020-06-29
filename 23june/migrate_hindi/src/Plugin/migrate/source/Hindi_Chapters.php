<?php

namespace Drupal\migrate_hindi\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Source plugin for the hindi_chapters.
 *
 * @MigrateSource(
 *   id = "sub_categories"
 * )
 */
class Hindi_Chapters extends SqlBase {

/**
   * {@inheritdoc}
   */
public function query() {
$query = $this->select('hindi_chapters', 'g')
      ->fields('g', ['id', 'hindi_id', 'name']);
return$query;
  }

/**
   * {@inheritdoc}
   */
public function fields() {
$fields = [
'id' => $this->t('hindi_chapters ID'),
'hindi_id' => $this->t('hindi ID'),
'name' => $this->t('hindi name'),
    ];

return$fields;
  }

/**
   * {@inheritdoc}
   */
public function getIds() {
return [
'id' => [
'type' => 'integer',
'alias' => 'g',
      ],
    ];
  }
}

