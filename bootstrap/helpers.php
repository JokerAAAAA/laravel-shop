<?php
/**
 * Name: 自定义辅助函数库.
 * User: 董坤鸿
 * Date: 2020/6/4
 * Time: 下午1:36
 */

use Illuminate\Support\Facades\Route;

if (!function_exists('route_class')) {

    /**
     * 当前请求的路由名称转换为CSS类名称
     *
     * @return mixed
     */
    function route_class()
    {
        return str_replace('.', '-', Route::currentRouteName());
    }
}

if (!function_exists('create_random_str')) {

    /**
     * 随机生成数字+字母组合的字符串
     *
     * <h2>create_random_str</h2>
     * <code>
     *   create_random_str(20);
     * </code>
     * @param int $len 长度
     * @param int $has_number 固定数字
     * @return array|string
     */
    function create_random_str($len, $has_number = 1)
    {
        $str = array_merge($has_number ? range(0, 9) : [], range('a', 'z'), range('A', 'Z'));
        shuffle($str);
        $str = implode('', array_slice($str, 0, $len));

        return $str;
    }
}

if (!function_exists('ngrok_url')) {

    /**
     * NGROK 地址
     *
     * @param $routeName
     * @param array $parameters
     * @return string
     */
    function ngrok_url($routeName, $parameters = [])
    {
        // 开发环境，并且配置了 NGROK_URL
        if (app()->environment('local') && $url = config('app.ngrok_url')) {
            // route() 函数第桑参数代表是否绝对路径
            return $url.\route($routeName, $parameters, false);
        }

        return \route($routeName, $parameters);
    }
}

if (!function_exists('big_number')) {

    /**
     * 默认的精度为小数点后两位
     *
     * @param $number
     * @param int $scale
     * @return \Moontoast\Math\BigNumber
     */
    function big_number($number, $scale = 2)
    {
        return new \Moontoast\Math\BigNumber($number, $scale);
    }
}
