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
        $router->get('users', 'UsersController@index')->name('users.index');
        // 商品管理
        $router->resource('products', 'ProductsController');
        // 订单管理-订单列表
        $router->get('orders', 'OrdersController@index')->name('orders.index');
        // 订单管理-订单详情
        $router->get('orders/{order}', 'OrdersController@show')->name('orders.show');
    }
);
