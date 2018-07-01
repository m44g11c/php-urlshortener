<?php
  $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
  if($query && $query['status'] == 'success') {
    $country = $query['country'];
  } else {
    $country = 'Unable to get location';
  }
  