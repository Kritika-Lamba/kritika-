<?php
namespace Drupal\migrate_hindi\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Source plugin for the hindi.
 *
 * @MigrateSource(
 *   id = "hindi"
 * )
 */
class Hindi extends SqlBase {

/**
   * {@inheritdoc}
   */
public function query() {
$query = $this->select('hindi', 'd')
      ->fields('d', ['id', 'name', 'description']);
return$query;
  }

/**
   * {@inheritdoc}
   */
public function fields() {
$fields = [
'id' => $this->t('hindi ID'),
'name' => $this->t('hindi Name'),
'description' => $this->t('hindi Description'),
'hindi_chapters' => $this->t('hindi_chapters'),
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
'alias' => 'd',
      ],
    ];
  }

/**
   * {@inheritdoc}
   */
public function prepareRow(Row$row) {
$genres = $this->select('hindi_chapters', 'g')
      ->fields('g', ['id'])
      ->condition('hindi_id', $row->getSourceProperty('id'))
      ->execute()
      ->fetchCol();
$row->setSourceProperty('hindi_chapters', $genres);
returnparent::prepareRow($row);
  }
}

