<?php

return array(
    // Товар:
    'book/([0-9]+)' => 'book/view/$1',

    'catalog' => 'catalog/index',

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',
    'author/([0-9]+)/page-([0-9]+)' => 'catalog/author/$1/$2',
    'author/([0-9]+)' => 'catalog/author/$1',

    'cart/checkout' => 'cart/checkout',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart' => 'cart/index',

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    'admin/book/create' => 'adminBook/create',
    'admin/book/update/([0-9]+)' => 'adminBook/update/$1',
    'admin/book/delete/([0-9]+)' => 'adminBook/delete/$1',
    'admin/book' => 'adminBook/index',
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    'admin' => 'admin/index',
    'contacts' => 'site/contact',
    'about' => 'site/about',
    'index.php' => 'site/index',
    '' => 'site/index',
);
