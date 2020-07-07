<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 商品列表
Route::redirect('/', '/products')->name('root');
// 商品列表
Route::get('products', 'ProductsController@index')->name('products.index');

Auth::routes(['verify' => true]);

Route::group(
    ['middleware' => 'auth', 'verified'],
    function () {
        // 用户地址信息
        Route::resource('user_addresses', 'UserAddressesController');

        // 收藏商品
        Route::post('products/{product}/favorite', 'ProductsController@favor')->name('products.favor');
        // 取消收藏
        Route::delete('products/{product}/favorite', 'ProductsController@disfavor')->name('products.disfavor');
        // 收藏列表
        Route::get('products/favorites', 'ProductsController@favorites')->name('products.favorites');

        // 购物车列表
        Route::get('carts', 'CartsController@index')->name('carts.index');
        // 加入购物车
        Route::post('carts', 'CartsController@store')->name('carts.store');
        // 移除购物车
        Route::delete('carts/{sku}', 'CartsController@destroy')->name('carts.destroy');

        // 订单列表
        Route::get('orders', 'OrdersController@index')->name('orders.index');
        // 创建订单
        Route::post('orders', 'OrdersController@store')->name('orders.store');
        // 订单详情
        Route::get('orders/{order}', 'OrdersController@show')->name('orders.show');

        // 订单支付 - 支付宝支付
        Route::get('payment/{order}/alipay', 'PaymentController@payByAlipay')->name('payment.alipay');
        // 订单支付 - 前端回调页面
        Route::get('payment/alipay/return', 'PaymentController@alipayReturn')->name('payment.alipay.return');
    }
);

// 商品详情
Route::get('products/{product}', 'ProductsController@show')->name('products.show');

// 订单支付 - 服务器回调
Route::post('payment/alipay/notify', 'PaymentController@alipayNotify')->name('payment.alipay.notify');
