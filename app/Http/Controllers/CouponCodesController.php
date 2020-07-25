<?php

namespace App\Http\Controllers;

use App\Exceptions\CouponCodeUnavailableException;
use App\Models\CouponCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponCodesController extends Controller
{
    /**
     * 获取优惠券
     *
     * @param $code
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     * @throws CouponCodeUnavailableException
     */
    public function show($code, Request $request)
    {
        // 判断优惠券是否存在
        if (!$record = CouponCode::query()->where('code', $code)->first()) {
            throw new CouponCodeUnavailableException('优惠券不存在');
        }

        // 校验优惠券
        $record->checkAvailable($request->user());

        return $record;
    }
}
