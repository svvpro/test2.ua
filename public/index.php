<?php
/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 21.10.2016
 * Time: 11:03
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', __DIR__);

require_once (ROOT.'/../components/Router.php');

$router = new Router();
$router->run();