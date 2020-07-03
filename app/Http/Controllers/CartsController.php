<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\ProductSku;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    protected $cartService;

    /**
     * 利用 Laravel 的字段解析功能注入 CartService 类
     *
     * CartsController constructor.
     * @param CartService $cartService
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * 购物车列表
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $carts = $this->cartService->index();
        $addresses = $request->user()->addresses()->orderBy('last_used_at', 'desc')->get();

        return view('carts.index', ['carts' => $carts, 'addresses' => $addresses]);
    }

    /**
     * 加入购物车
     *
     * @param CartRequest $request
     * @return array
     */
    public function store(CartRequest $request)
    {
        $this->cartService->store($request->input('sku_id'), $request->input('amount'));

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
        $this->cartService->destroy($sku->id);

        return [];
    }
}
