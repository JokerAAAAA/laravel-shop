<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    /**
     *  判断用户是否有请求权限
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
