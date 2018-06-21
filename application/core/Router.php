<?php
  namespace application\core;

  use application\core\View;

  class Router {

    protected $routes = [];
    protected $params = [];
    
    public function __construct(){
      $arr = require 'application/config/routes.php';
      foreach ($arr as $key => $val) {
        $this->add($key, $val);
      }
    }

    public function add($route, $params){
      $route = '#^'.$route.'$#';
      $this->routes[$route] = $params; 
    }

    public function match($value=''){
      $url = trim($_SERVER['REQUEST_URI'], '/');
      foreach ($this->routes as $route => $params) {
        if (preg_match($route, $url, $matches)) {
          $this->params = $params;
          return true;
        }
      }
      return false;
    }


    public function run($value='') {     
      $url = trim($_SERVER['REQUEST_URI'], '/');
      if ($url == '') {
        $this->params = [
          'controller' => 'main', 
          'action' => 'index' 
        ];
        $action = 'indexAction';
        $path = 'application\controllers\MainController';
        $controller = new $path($this->params);
        $controller->$action();

        unset($_SESSION);
        
      } else {
        $_GET['url'] = $url;
        $stat_check = substr($_GET['url'], -1);

        if ($stat_check == '!') {
          $short_url = substr($_GET['url'], 0, -1);
          $this->params = [
            'controller' => 'stats', 
            'action' => 'show' 
          ];
          $action = 'showAction';
          $path = 'application\controllers\StatsController';
          $controller = new $path($this->params);
          $controller->$action();        
          
        } else {

          $this->params = [
            'controller' => 'main', 
            'action' => 'redirect' 
          ];
          $action = 'redirectAction';
          $path = 'application\controllers\MainController';
          $controller = new $path($this->params);
          $controller->$action();
        }          
      }
      
    }

  }
