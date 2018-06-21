<?php
 namespace application\models;

 use application\core\Model;

 class Stats extends Model {

    public function getData($short) {
      $record_id = $this->db->getRecordId($short);
      $stats = $this->db->getStats($record_id);
      return $stats['items'];
    }
 }
