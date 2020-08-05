<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // 订单支付-支付宝服务器回调
        'payment/alipay/notify',
        // 订单支付-微信服务器回调
        'payment/wechat/notify',
        // 订单支付-微信退款回调
        'payment/wechat/refund_notify',
        // 分期付款-支付宝服务器回调
        'installments/alipay/notify',
        // 分期付款-微信服务器回调
        'installments/wechat/notify',
        // 分期付款-微信退款回调
        'installments/wechat/refund_notify',
    ];
}
