<?php
 namespace application\models;

 use application\core\Model;

 class Stats extends Model {

    public function getData($short) {
      $record_id = $this->db->getSingle('id', 'urls', 'short', $short);
      $stats = $this->db->getArray('stats', 'record_id', $record_id['id']);
      return $stats;
    }

    public function getCounter($short) {
      $counter = $this->db->getSingle('counter', 'urls', 'short', $short);
      return $counter['counter'];
    }

    public function getLink($short) {
      $name = $this->db->getSingle('name', 'urls', 'short', $short);
      return $name['name'];
    }
 }
