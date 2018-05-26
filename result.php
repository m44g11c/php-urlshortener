<?php
  @session_start();
  require_once 'class/Shortener.class.php';
  $Shortener = new Shortener();

  if (isset($_POST['url'])) {
    $last_id = $Shortener->addRecord($_POST['url']);
  }

  $cur_record = $Shortener->getRecord($last_id);
  $_SESSION['cur_record'] = $cur_record;
  header('Location: index.php');
  