<?php
  namespace application\core;

  use application\core\View;

  class Router {
    
    public function __construct(){
      $arr = require 'application/config/routes.php';
      foreach ($arr as $key => $val) {
        $this->add($key, $val);
      }
    }

    public function add($route, $params){
      $this->routes[$route] = $params; 
    }

    public function run($value='') {     
      $url = trim($_SERVER['REQUEST_URI'], '/');
      if ($url == '') {

        $action = 'indexAction';
        $path = $this->routes['default']['path'];
        $controller = new $path($this->routes['default']);
        $controller->$action();

        unset($_SESSION);
        
      } else {
        
        $stat_check = substr($url, -1);

        if ($stat_check == '!') {

          $short_url = substr($url, 0, -1);
          $action = 'showAction';
          $path = $this->routes['stats']['path'];
          $controller = new $path($this->routes['stats']);
          $controller->$action($url);        
          
        } else {

          $action = 'redirectAction';
          $path = $this->routes['redirect']['path'];
          $controller = new $path($this->routes['redirect']);
          $controller->$action($url);
        }          
      }
      
    }

  }
