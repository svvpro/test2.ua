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

    public function actionCategory($id, $page = 1)
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $products = array();
        $products = Product::getProductsByCategoryId($id, $page);

        $total = Product::getTotalByCategoryId($id);

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once ROOT.'/../views/catalog/category.php';
        return true;
    }
}