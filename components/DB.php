<?php

/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 24.10.2016
 * Time: 12:54
 */
class DB
{
    public static function getConnection()
    {
        $dbParamsPath = ROOT.'/../config/db_params.php';
        $params = include ($dbParamsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

        $db = new PDO($dsn, $params['user'], $params['password']);
        $db->exec("set names utf8");

        return $db;
    }
}