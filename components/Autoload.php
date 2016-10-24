<?php
/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 24.10.2016
 * Time: 13:00
 */

function __autoload($className)
{
    $dirs = array(
        '/models/',
        '/components/'
    );

    foreach ($dirs as $path){
        $path = ROOT.'/../'.$path.$className.'.php';
        if (is_file($path)){
            require_once ($path);
        }
    }
}