<?php

  namespace application\lib;

  use PDO;

  class Db {

    protected $db;
    
    public function __construct(){

      $config = require_once 'application/config/Db.php';

      $this->link = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);
      
    }

    public function getRecord($id) {
      $result = array();
      $query = mysqli_query($this->link, "SELECT * FROM urls WHERE id = '$id'");
      echo mysqli_error($this->link);
      if(mysqli_num_rows($query) != 0){
          while($row = mysqli_fetch_assoc($query)){
              $result = $row;
          }
        }  
      return $result;
    }
    
    public function getRecordId($url) {
      $url = mysqli_escape_string($this->link, $url);
      $query = mysqli_query($this->link, "SELECT id FROM urls WHERE short ='$url'");
      echo mysqli_error($this->link);
      $result = mysqli_fetch_assoc($query);
      return $result['id'];
    }

    public function insertRecord($url_name, $short_name) {
      $query = mysqli_query($this->link, "INSERT INTO urls (name, short) VALUES ('$url_name', '$short_name')");
      echo mysqli_error($this->link);
      $last_id = $this->link->insert_id;
      return $last_id;
    }

    public function getLinkByShortName($short) {
      $short = mysqli_escape_string($this->link, $short);
      $query = mysqli_query($this->link, "SELECT name FROM urls WHERE short ='$short'");
      echo mysqli_error($this->link);
      $result = mysqli_fetch_assoc($query);
      return $result;
    }

    public function saveStats($data, $url) {
      $record_id = $this->getRecordId($url);
      $date = mysqli_escape_string($this->link, $data['date']);
      $ip = mysqli_escape_string($this->link, $data['ip']);
      $region = mysqli_escape_string($this->link, $data['region']);
      $browser = mysqli_escape_string($this->link, $data['browser']);
      $version = mysqli_escape_string($this->link, $data['version']);
      $os = mysqli_escape_string($this->link, $data['os']);
      $query = mysqli_query($this->link, "INSERT INTO stats (record_id, r_date, ip, region, browser, version, os ) VALUES ('$record_id', '$date', '$ip', '$region', '$browser', '$version', '$os')");
      echo mysqli_error($this->link);
    }

    public function getStats($id) {
      $id = mysqli_escape_string($this->link, $id);
      $result = array();
      $query = mysqli_query($this->link, "SELECT * FROM stats WHERE record_id = '$id'");
      echo mysqli_error($this->link);
      if(mysqli_num_rows($query) != 0){
          while($row = mysqli_fetch_assoc($query)){
              $result['items'][] = $row;
          }
        }  
      return $result;
    }

  }
