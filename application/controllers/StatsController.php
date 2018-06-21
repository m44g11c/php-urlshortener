<?php
  namespace application\controllers;

  use application\core\Controller;

  class StatsController extends Controller {
    
    public function showAction() {

      $short_url = substr($_GET['url'], 0, -1);
      $stats['data'] = $this->model->getData($short_url);
      $stats['no data'] = 'false';
      if ($stats == null) {
        $stats = ['no data' => 'true'];
      }
      
      $this->view->render('Stats', $stats);
      
    }
  }  
