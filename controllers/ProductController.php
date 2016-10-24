<?php

/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 24.10.2016
 * Time: 13:06
 */
class ProductController
{
    public function actionView($id)
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $product = Product::getProductById($id);

        require_once ROOT.'/../views/product/view.php';
        return true;
    }
}