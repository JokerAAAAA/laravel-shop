<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * 加入购物车
     *
     * @param CartRequest $request
     * @return array
     */
    public function store(CartRequest $request)
    {
        $user = $request->user();
        $skuId = $request->input('sku_id');
        $amount = $request->input('amount');

        // 从数据库中查询该商品是否已经在购物车中
        if ($cart = $user->carts()->where('product_sku_id', $skuId)) {
            // 如果存在则直接叠加商品数量
            $cart->update(
                [
                    'amount' => $cart->amount + $amount,
                ]
            );
        } else {
            // 否则创建一个新的购物车记录
            $cart = new Cart(['amount' => $amount]);
            $cart->user()->associate($user);
            $cart->productSku()->associate($skuId);
            $cart->save();
        }

        return [];
    }
}
