<?php

/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 21.10.2016
 * Time: 11:07
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
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri = $this->getURI();
        foreach ($this->routs as $uriPattern => $path){
            if (preg_match("~$uriPattern~", $uri)){
                $innerRout = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode('/', $path);

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));

                $parameters = $segments;

                $controllerFile = ROOT.'/../controllers/'.$controllerName.'.php';

                if (file_exists($controllerFile)){
                    require_once ($controllerFile);
                }

                $controllerObject = new $controllerName();

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null){
                    break;
                }
            }
        }
    }
}