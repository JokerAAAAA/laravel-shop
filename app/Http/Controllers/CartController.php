<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\ProductSku;
use Illuminate\Http\Request;

class CartController extends Controller
{

    /**
     * 购物车列表
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $carts = $request->user()->carts()->with(['productSku.product'])->get();

        return view('cart.index', ['carts' => $carts]);
    }

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
        if ($cart = $user->carts()->where('product_sku_id', $skuId)->first()) {
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

    /**
     * 移除购物车
     *
     * @param ProductSku $productSku
     * @return array
     */
    public function destroy(ProductSku $sku, Request $request)
    {
        $request->user()->carts()->where('product_sku_id', $sku->id)->delete();

        return [];
    }
}
