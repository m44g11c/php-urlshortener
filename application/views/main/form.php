<?php
  @session_start();

  if (isset($_POST['url']) && $_POST['url'] != '') {
    $_SESSION['url'] = $_POST['url'];
  }
  header('Location: /');
