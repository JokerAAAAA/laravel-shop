<?php

namespace App\Http\Requests;

class UserAddressRequest extends Request
{

    /**
     * 获取应用于请求的验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'province'      => 'required',
            'city'          => 'required',
            'district'      => 'required',
            'address'       => 'required',
            'zip'           => 'required',
            'contact_name'  => 'required',
            'contact_phone' => 'required',
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
            'province'      => '省',
            'city'          => '城市',
            'district'      => '地区',
            'address'       => '详细地址',
            'zip'           => '邮编',
            'contact_name'  => '姓名',
            'contact_phone' => '电话',
        ];
    }
}
