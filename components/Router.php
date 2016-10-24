<?php

/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 24.10.2016
 * Time: 12:03
 */
class Router
{
    private $routs;

    public function __construct()
    {
        $routsPath = ROOT.'/../config/routs.php';
        $this->routs = include ($routsPath);
    }

    private function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri = $this->getURI();
        foreach ($this->routs as $uriPattern => $path){
            if(preg_match("~$uriPattern~", $uri)){
                $innerRout = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $innerRout);

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));

                $paremeters = $segments;

                $controllerFile = ROOT.'/../controllers/'.$controllerName.'.php';
                if (file_exists($controllerFile)){
                    require_once ($controllerFile);
                }

                $controllerObj = new $controllerName();

                $result = call_user_func_array(array($controllerObj, $actionName), $paremeters);

                if($result != null){
                    break;
                }
            }
        }
    }
}