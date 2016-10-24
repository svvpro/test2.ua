<?php

/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 24.10.2016
 * Time: 17:23
 */
class Product
{
    const SHOW_BY_DEFAULT = 3;

    public static function getLatestProduct($count = self::SHOW_BY_DEFAULT)
    {

        $count = intval($count);

        $db = DB::getConnection();

        $sql = "SELECT * FROM `product` ORDER BY `id` DESC LIMIT $count";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $productsList = array();

        $i = 0;
        while ($row = $result->fetch()){
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }

    public static function getProductById($id)
    {
        $id = intval($id);

        $db = DB::getConnection();
        $sql = "SELECT * FROM `product` WHERE id = `id`";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();

    }

    public static function getProductsByCategoryId($categoeyId, $page = 1)
    {
        $categoeyId = intval($categoeyId);

        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db =  DB::getConnection();
        $sql = "SELECT * FROM `product` WHERE `status` = 1 AND `category_id` = $categoeyId LIMIT ".self::SHOW_BY_DEFAULT." OFFSET ".$offset;

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $productsList = array();

        $i = 0;
        while ($row = $result->fetch()){
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }

    public static function getTotalByCategoryId($categoryId)
    {
        if ($categoryId){
            $db = DB::getConnection();
            $sql = "SELECT COUNT(`id`) AS `total` FROM `product` WHERE `status` = 1 AND `category_id` = $categoryId";
            $result = $db->query($sql);
            $row = $result->fetch();
            return $row['total'];
        }
    }
}