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
}