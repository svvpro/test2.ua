<?php

/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 24.10.2016
 * Time: 12:22
 */


class SiteController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $products = array();
        $products = Product::getLatestProduct(6);

        require_once ROOT.'/../views/site/index.php';
        return true;
    }
}