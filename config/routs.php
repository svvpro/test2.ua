<?php
/**
 * Created by PhpStorm.
 * User: SVV
 * Date: 24.10.2016
 * Time: 12:02
 */
return array(
    'news' => 'news/index',
    'product/([0-9]+)' => 'product/view/1$',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',
    'catalog' => 'catalog/index',
    '' => 'site/index'
);