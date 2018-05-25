<?php
  require_once 'class/Shortener.class.php';
  require_once 'functions/getBrowser.php';
  require_once 'functions/getLocation.php';

  $Shortener = new Shortener();
  $Useragent = getBrowser();

  if (isset($_GET['url'])) {
    $stat_check = substr($_GET['url'], -1);

    if ($stat_check == '!') {
      $short_url = substr($_GET['url'], 0, -1);
      header("Location: index.php?staturl={$short_url}");
    } else {

    $full_link = $Shortener->getLinkByShortName($_GET['url']);
    $date = date('Y-m-d');
    $ip = $_SERVER['REMOTE_ADDR'];
    
    $user_info = array();
    $user_info['date'] = $date;
    $user_info['ip'] = $ip;
    $user_info['region'] = $country;
    $user_info['browser'] = $Useragent['name'];
    $user_info['version'] = $Useragent['version'];
    $user_info['os'] = $Useragent['platform'];
    
    $Shortener->updateCounter($_GET['url']);
    $Shortener->saveStats($user_info, $_GET['url']);
    $counter = $Shortener->getCounter($_GET['url']);

    header("Location: {$full_link['name']}");
  }
}
