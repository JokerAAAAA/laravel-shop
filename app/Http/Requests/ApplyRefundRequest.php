<?php

namespace App\Http\Requests;

class ApplyRefundRequest extends ReviewRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reason' => 'required',
        ];
    }

    /**
     * 获取验证错误的自定义属性
     *
     * @return array|string[]
     */
    public function attributes()
    {
        return [
            'amount' => '商品数量',
        ];
    }

}
