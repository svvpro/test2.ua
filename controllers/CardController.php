<?php

/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 27.10.2016
 * Time: 17:34
 */
class CardController
{
    public function actionAdd($id)
    {
        Card::addProducts($id);

        $refferer = $_SERVER['HTTP_REFERER'];
        header("Location: $refferer");
    }

    public function actionAddAjax($id)
    {
        echo Card::addProducts($id);
        return true;
    }
}