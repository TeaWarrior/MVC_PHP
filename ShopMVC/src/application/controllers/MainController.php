<?php

namespace application\controllers;
use application\core\Controller;


class MainController extends Controller {
    public function indexAction(){

       $result = $this->model->getNews();


        $vars =[
            'news'=>$result,
            'popo'=>'pop value',
            ];

       // debug($vars);



        $this->view->render('Main Page', $vars);

    }
    public function registerAction(){
        echo 'Register page';
    }
}
