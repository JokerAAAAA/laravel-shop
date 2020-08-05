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

        // 订单管理-订单列表
        Route::get('orders', 'OrdersController@index')->name('orders.index');
        // 订单管理-创建订单
        Route::post('orders', 'OrdersController@store')->name('orders.store');
        // 订单管理-订单详情
        Route::get('orders/{order}', 'OrdersController@show')->name('orders.show');
        // 订单管理-确认发货
        Route::post('orders/{order}/received', 'OrdersController@received')->name('orders.received');
        // 订单管理-评价商品
        Route::get('orders/{order}/review', 'OrdersController@review')->name('orders.review.show');
        // 订单管理-发送评价
        Route::post('orders/{order}/review', 'OrdersController@sendReview')->name('orders.review.store');
        // 订单管理-申请退款
        Route::post('orders/{order}/apply_refund', 'OrdersController@applyRefund')->name('orders.apply_refund');
        // 订单管理-众筹商品创建订单
        Route::post('crowdfunding_orders', 'OrdersController@crowdfunding')->name('crowdfunding_orders.store');

        // 订单支付-支付宝支付
        Route::get('payment/{order}/alipay', 'PaymentController@payByAliPay')->name('payment.alipay');
        // 订单支付-支付宝支付前端回调页面
        Route::get('payment/alipay/return', 'PaymentController@alipayReturn')->name('payment.alipay.return');
        // 订单支付-微信支付
        Route::get('payment/{order}/wechat', 'PaymentController@payByWechatPay')->name('payment.wechat');
        // 订单支付-微信支付前端回调页面
        Route::post('payment/wechat/notify', 'PaymentController@wechatNotify')->name('payment.wechat.notify');
        // 订单支付-分期付款
        Route::post('payment/{order}/installment', 'PaymentController@payByInstallment')->name('payment.installment');

        // 优惠券-获取优惠券;
        Route::get('coupon_codes/{code}', 'CouponCodesController@show')->name('coupon_codes.show');

        // 分期付款-列表
        Route::get('installments', 'InstallmentsController@index')->name('installments.index');
        // 分期付款-详情
        Route::get('installments/{installment}', 'InstallmentsController@show')->name('installments.show');
        // 分期付款-支付宝支付
        Route::get('installments/{installment}/alipay', 'InstallmentsController@payByAlipay')->name('installments.alipay');
        // 分期付款-支付宝支付前端回调页面
        Route::get('installments/alipay/return', 'InstallmentsController@alipayReturn')->name('installments.alipay.return');
        // 分期付款-微信支付
        Route::get('installments/{installment}/wechat', 'InstallmentsController@payByWechatPay')->name('installments.wechat');
        // 分期付款-微信支付前端回调页面
        Route::post('installments/wechat/notify', 'InstallmentsController@wechatNotify')->name('installments.wechat.notify');
        // 分期付款-微信退款回调
        Route::post('installments/wechat/refund_notify', 'InstallmentsController@wechatRefundNotify')->name('installments.wechat.refund_notify');
    }
);

// 商品详情
Route::get('products/{product}', 'ProductsController@show')->name('products.show');

// 订单支付-服务器回调
Route::post('payment/alipay/notify', 'PaymentController@alipayNotify')->name('payment.alipay.notify');
// 订单支付-微信退款回调
Route::post('payment/wechat/refund_notify', 'PaymentController@wechatRefundNotify')->name('payment.wechat.refund_notify');

// 分期付款-服务器回调
Route::post('installments/alipay/notify', 'InstallmentsController@alipayNotify')->name('installments.alipay.notify');
