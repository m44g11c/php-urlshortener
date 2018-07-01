<?php
  return [
    'default' => [
      'controller' => 'main',
      'action' => 'index',
      'path' => 'application\controllers\MainController'
    ],

    'redirect' => [
      'controller' => 'main',
      'action' => 'redirect',
      'path' => 'application\controllers\MainController'
    ],

    'stats' => [
      'controller' => 'stats',
      'action' => 'show',
      'path' => 'application\controllers\StatsController'
    ],

  ];