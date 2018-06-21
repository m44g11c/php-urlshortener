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

    public function redirectAction() {

      if (isset($_GET['url'])) {
        $link = $this->model->getLink($_GET['url']);
        $this->view->redirect($link['name']);
      }
    }
  }
