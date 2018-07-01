<?php

  namespace application\lib;

  class Db {
    
    public function __construct(){

      $config = require_once 'application/config/Db.php';

      $this->link = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);
      
    }

    public function getSingle($field, $table, $name, $value) {
      $value = mysqli_escape_string($this->link, $value);
      $query = mysqli_query($this->link, "SELECT $field FROM $table WHERE $name ='$value'");
      echo mysqli_error($this->link);
      $result = mysqli_fetch_assoc($query);
      return $result;
    }

    public function getArray($table, $name, $value) {
      $value = mysqli_escape_string($this->link, $value);
      $result = array();
      $query = mysqli_query($this->link, "SELECT * FROM $table WHERE $name = '$value'");
      echo mysqli_error($this->link);
      if(mysqli_num_rows($query) != 0){
          while($row = mysqli_fetch_assoc($query)){
              $result[] = $row;
          }
        }  
      return $result;
    }

    public function insert($data, $table) {
        $columns  = "";
        $values   = "";
        foreach ($data as $column => $value) {
          $columns  .= $columns ? ', ' : '';
          $columns  .= "`$column`";
          $values   .= $values  ? ', ' : '';
          $value = mysqli_escape_string($this->link, $value);
          $values   .= "'$value'";
        }
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $query = mysqli_query($this->link, $sql);
        echo mysqli_error($this->link);
        $last_id = $this->link->insert_id;
        return $last_id;
      }
    
    public  function update($data, $table, $where) {
        $sets = '';
        foreach ($data as $column => $value) {
          $sets .= $sets ? ', ' : '';
          $value = mysqli_escape_string($this->link, $value);
          $sets .= "`$column` = '$value'";      
        }
        $sql = "UPDATE $table SET $sets WHERE $where";
        $query = mysqli_query($this->link, $sql);
        echo mysqli_error($this->link);
      }

  }
