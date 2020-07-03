<?php

namespace App\Services;

use App\Models\Cart;
use Auth;

class CartService
{
    /**
     * 订单列表
     *
     * @return mixed
     */
    public function index()
    {
        return Auth::user()->carts()->with(['productSku.product'])->get();
    }

    /**
     * 加入购物车
     *
     * @param $skuId
     * @param $amount
     * @return Cart|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\HasMany|object|null
     */
    public function store($skuId, $amount)
    {
        $user = Auth::user();
        // 从数据库中查询该商品是否已经在购物车中
        if ($item = $user->carts()->where('product_sku_id', $skuId)->first()) {
            // 如果存在则直接叠加商品数量
            $item->update(
                [
                    'amount' => $item->amount + $amount,
                ]
            );
        } else {
            // 否则创建一个新的购物车记录
            $item = new Cart(['amount' => $amount]);
            $item->user()->associate($user);
            $item->productSku()->associate($skuId);
            $item->save();
        }

        return $item;
    }

    /**
     * 移除购物车
     *
     * @param $skuIds
     */
    public function destroy($skuIds)
    {
        // 可以传单个 ID，也可以传 ID 数组
        if (!is_array($skuIds)) {
            $skuIds = [$skuIds];
        }

        Auth::user()->carts()->whereIn('product_sku_id', $skuIds)->delete();
    }
}
