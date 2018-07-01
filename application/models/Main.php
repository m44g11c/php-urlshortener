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
      $data = ['name' => $name,
               'short' => $short_name
              ];
      $cur_record = $this->db->insert($data, 'urls');
      return $cur_record;
    }

    public function getLink($short) {
      $link =  $this->db->getSingle('name', 'urls', 'short', $short);
      return $link;
    }

    public function getInfo($id) {
      $info = $this->db->getArray('urls', 'id', $id);
      return $info[0];
    }

    public function loadStats($short) {
      require 'application/lib/getLocation.php';
      require 'application/lib/getBrowser.php';
      $user_data = getBrowser();
      $record_id = $this->db->getSingle('id', 'urls', 'short', $short);
      $data = ['record_id' => $record_id['id'],
               'r_date' => date('Y-m-d'),
               'ip' => $_SERVER['REMOTE_ADDR'],
               'region' => $country,
               'browser' => $user_data['name'],
               'version' => $user_data['version'],
               'os' => $user_data['platform']
              ];
      $last_record = $this->db->insert($data, 'stats');        
      
    }

    public function loadCounter($short) {
        $counter = $this->db->getSingle('counter', 'urls', 'short', $short);
        $counter = $counter['counter'];
        $counter == null ? $counter = 1 : $counter = ++$counter;
        $data = ['counter' => $counter];
        $this->db->update($data, 'urls', "short ='$short'");
     } 

 }
