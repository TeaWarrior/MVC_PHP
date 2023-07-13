<?php
namespace application\core;
class Router{
    protected  $routes=[];
    protected  $params=[];
    function __construct()
    {
        $arr = require 'application/config/routes.php';
       // debug($arr);
        foreach ($arr as $key=>$val){
           $this-> add($key,$val);
        }
    }



    public function add($route,$params)
    {
        $route= '#^'.$route.'$#';
        $this->routes[$route]=$params;
    }


    public function match()
    {
        $url=trim($_SERVER['REQUEST_URI'],'/');
        foreach($this->routes as $route=>$params){
            if(preg_match($route,$url,$matches)){
           $this->params=$params;
           return true;
            }
        }
        return  false;
    }



    public function run()
    {
        if($this->match())
        {
            $path ='application\controllers\\'.ucfirst($this->params['controller']).'Controller';
           // echo $path;
            if(class_exists($path))
            {
                $action=$this->params['action'].'Action';
                if(method_exists($path, $action))
                {

                    $controller = new $path;
                    $controller->$action();

                }else
                {
                    echo 'Method not found';
                }

            }else
            {
                echo 'Класс не наиден';
            }

          //  echo '<p>So cool, because I know MVC</p>';
          //  echo '<p>controller: <b>' .$this->params['controller'].'</b></p>';
          //  echo '<p>action: <b>' .$this->params['action'].'</b></p>';
        }else
        {
            echo 'Маршрут не наиден';
        }

    }


}