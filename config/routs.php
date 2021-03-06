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
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    'card/add/([0-9]+)' =>'card/add/$1',
    'card/addAjax/([0-9]+)' =>'card/addAjax/$1',
    'card' => 'card/index',
    '' => 'site/index'
);