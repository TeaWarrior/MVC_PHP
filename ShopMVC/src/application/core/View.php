<?php

namespace application\core;

class View{
    public $path;
    public $layout='default';
    public $route;


    public function __construct($route){

        $this->route=$route;

       // debug($route['controller']);
       $this->path=$route['controller'].'/'.$route['action'];
        echo '<p>Hello View</p>';
    }

    public function render($title, $vars=[]){

        if(file_exists('application/views/'.$this->path.'.php'))
        {
            ob_start();
            require 'application/views/'.$this->path.'.php';
            $content = ob_get_clean();
            require 'application/views/layout/'.$this->layout.'.php';

        }else{
            echo 'View not found '.$this->path;
        }
    }




}