<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group(
    [
        'prefix' => config('admin.route.prefix'),
        'namespace' => config('admin.route.namespace'),
        'middleware' => config('admin.route.middleware'),
        'as' => config('admin.route.prefix').'.',
    ],
    function (Router $router) {

        $router->get('/', 'HomeController@index')->name('home');
        // 用户管理
        $router->get('users', 'UsersController@index')->name('admin.users.index');
        // 商品管理
        $router->resource('products', 'ProductsController');
        // 订单管理
        $router->get('orders', 'OrdersController@index')->name('admin.orders.index');
    }
);
