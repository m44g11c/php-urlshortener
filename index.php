<?php
  @session_start();
  
  require_once 'smarty/Smarty.class.php';
  require_once 'class/Shortener.class.php';

  $smarty = new Smarty();
  $Shortener = new Shortener();

  if (isset($_SESSION['cur_record'])) {
    $smarty->assign('cur_record', $_SESSION['cur_record']);
    unset ($_SESSION['cur_record']);
  }

  if (isset($_GET['staturl'])) {
    $stat_id = $Shortener->getRecordId($_GET['staturl']);
    $stats = $Shortener->getStats($stat_id);
    $link = $Shortener->getLinkByShortName($_GET['staturl']);
    $counter = $Shortener->getCounter($_GET['staturl']);

    $smarty->assign('staturl', $_GET['staturl']);
    if (isset($stats['items'])) {
      $smarty->assign('stats', $stats['items']);
    }
    $smarty->assign('link', $link['name']);
    $smarty->assign('counter', $counter);
  }

  $smarty->display('main.tpl');
