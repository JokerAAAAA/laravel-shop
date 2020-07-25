<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Exception;
use Throwable;

class CouponCodeUnavailableException extends Exception
{
    /**
     * CouponCodeUnavailableException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 403, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * 当这个异常被触发时，会调用 render 方法来输出给用户
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function render(Request $request)
    {
        // 如果用户通过 Api 请求，则返回 JSON 格式错误信息
        if ($request->expectsJson()) {
            return response()->json(['message' => $this->message], $this->code);
        }

        // 否则返回上一页并带上错误信息
        return redirect()->back()->withErrors(['coupon_code' => $this->message]);
    }
}
