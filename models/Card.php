<?php

/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 27.10.2016
 * Time: 17:35
 */
class Card
{
    public static function addProducts($id)
    {
        $id = intval($id);

        $productsInCard = array();

        if (isset($_SESSION['products'])){
            $productsInCard = $_SESSION['products'];
        }

        if (array_key_exists($id, $productsInCard)){
            $productsInCard[$id]++;
        }else{
            $productsInCard[$id] = 1;
        }

        $_SESSION['products'] = $productsInCard;

        return self::countItems();
    }

    public static function countItems()
    {
        if ($_SESSION['products']){
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quanttity){
                $count = $count + $quanttity;
            }
            return $count;
        }else{
            return 0;
        }
    }

    public static function getProducts()
    {
        if (isset($_SESSION['products'])){
            return $_SESSION['products'];
        }

        return false;
    }


    public static function getTotalPrice($products)
    {
        $productsInCard = self::getProducts();

        $total = 0;

        if ($productsInCard){
            foreach ($products as $item){
                $total += $item['price'] * $productsInCard[$item['id']];
            }
        }
        return $total;
    }
}