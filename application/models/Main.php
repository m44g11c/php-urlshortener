<?php
 namespace application\models;

 use application\core\Model;

 class Main extends Model {

    //move to generator class
    public function generateShortName($length = 7) {
      return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
   
    public function addRecord($name) {
      $short_name = $this->generateShortName();

      $cur_record = $this->db->insertRecord($name, $short_name);
      return $cur_record;
    }

    public function getLink($short) {
      $link =  $this->db->getLinkByShortName($short);
      return $link;
    }

    public function getInfo($id) {
      $info = $this->db->getRecord($id);
      return $info;
    }

 }
