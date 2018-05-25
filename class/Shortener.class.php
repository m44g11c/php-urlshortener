<?php
  class Shortener{
    private $link;
    public function __construct() {
      $this->link = mysqli_connect('localhost', 'root', 'root', 'urlshortener');
    }

    public function generateShortName($length = 7) {
      return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public function addRecord($name) {
      $short = $this->generateShortName();
      $name = mysqli_escape_string($this->link, $name);
      $query = mysqli_query($this->link, "INSERT INTO urls (name, short) VALUES ('$name', '$short')");
      echo mysqli_error($this->link);
      $last_id = $this->link->insert_id;
      return $last_id;
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

    public function getLinkByShortName($short) {
      $short = mysqli_escape_string($this->link, $short);
      $query = mysqli_query($this->link, "SELECT name FROM urls WHERE short ='$short'");
      echo mysqli_error($this->link);
      $result = mysqli_fetch_assoc($query);
      return $result;
    }

    public function getCounter($url) {
      $url = mysqli_escape_string($this->link, $url);
      $query = mysqli_query($this->link, "SELECT counter FROM urls WHERE short ='$url'");
      echo mysqli_error($this->link);
      $result = mysqli_fetch_assoc($query);
      return $result['counter'];
    }

    public function updateCounter($url) {
      $counter = $this->getCounter($url);
      $counter == null ? $counter = 1 : $counter = ++$counter;
      $query = mysqli_query($this->link, "UPDATE urls SET counter ='$counter' WHERE short ='$url'");
      echo mysqli_error($this->link);
    }

    public function getRecordId($url) {
      $url = mysqli_escape_string($this->link, $url);
      $query = mysqli_query($this->link, "SELECT id FROM urls WHERE short ='$url'");
      echo mysqli_error($this->link);
      $result = mysqli_fetch_assoc($query);
      return $result['id'];
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
