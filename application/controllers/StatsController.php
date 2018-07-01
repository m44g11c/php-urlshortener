<?php
  namespace application\controllers;

  use application\core\Controller;

  class StatsController extends Controller {
    
    public function showAction($url) {

      $short_url = substr($url, 0, -1);
      $stats['data'] = $this->model->getData($short_url);
      $stats['counter'] = $this->model->getCounter($short_url);
      $stats['link'] = $this->model->getLink($short_url);
      $stats['no data'] = 'false';
      if ($stats['counter'] == null) {
        $stats['no data'] = 'true';
      }
      
      $this->view->render('Stats', $stats);
      
    }
  }  
