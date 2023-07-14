<?php

namespace application\controllers;
use application\core\Controller;
use application\lib\Db;

class MainController extends Controller {
    public function indexAction(){
        $db = new Db;

       $data= $db->column ('SELECT name FROM study WHERE id=1');
        debug($data);


       // $connection = mysqli_connect('mysql','root','root');
        $this->view->render('Main Page');
      //  echo 'Hello indexPage';
    }
    public function registerAction(){
        echo 'Register page';
    }
}
