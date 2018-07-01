<?php
  namespace application\controllers;

  use application\core\Controller;
  
  class MainController extends Controller {
    
    public function indexAction() {
      
      if (isset($_SESSION['url'])) {

          $cur_record_id = $this->model->addRecord($_SESSION['url']);
          $cur_record = $this->model->getInfo($cur_record_id);
          $this->view->render('Main page', $cur_record);
          unset ($_SESSION['url']);

        } else {
          $this->view->render('Main page');
        }
      
      }
 
    public function redirectAction($url) {

      if (isset($url)) {
        $link = $this->model->getLink($url);
        $stats = $this->model->loadStats($url);
        $counter = $this->model->loadCounter($url);
        $this->redirect($link['name']);
      }      
    }

  }
