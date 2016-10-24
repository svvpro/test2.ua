<?php

/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 24.10.2016
 * Time: 18:43
 */
class CatalogController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $products = array();
        $products = Product::getLatestProduct();

        require_once ROOT.'/../views/catalog/index.php';
        return true;
    }

    public function actionCategory($id)
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $products = array();
        $products = Product::getProductsByCategoryId($id);

        require_once ROOT.'/../views/catalog/category.php';
        return true;
    }
}