<?php
/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 24.10.2016
 * Time: 12:00
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', __DIR__);

session_start();

require_once ROOT.'/../components/Autoload.php';

$router = new Router();
$router->run();