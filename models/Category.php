<?php

/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 24.10.2016
 * Time: 12:29
 */
class Category
{
    public static function getCategoryList()
    {

        $db = DB::getConnection();

        $sql = "SELECT `id`, `name` FROM `category` ORDER BY `sort_order` ASC ";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $categoriesList = array();

        $i = 0;
        while ($row = $result->fetch()){
            $categoriesList[$i]['id'] = $row['id'];
            $categoriesList[$i]['name'] = $row['name'];
            $i++;
        }

        return $categoriesList;
    }
}