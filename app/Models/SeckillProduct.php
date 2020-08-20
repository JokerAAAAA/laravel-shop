<?php

namespace App\Models;

use Carbon\Carbon;
use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class SeckillProduct extends Model
{
    // 调用管理后台时间展示格式
    use DefaultDatetimeFormat;

    /**
     * 可以被批量赋值的属性
     *
     * @var array
     */
    protected $fillable = [
        'start_at',
        'end_at',
    ];

    /**
     * 应该转换为日期格式的属性
     *
     * @var array
     */
    protected $dates = [
        'start_at',
        'end_at',
    ];

    /**
     * 指示是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 获取商品
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * 定义一个名为 is_before_start 的访问器，当前时间早于秒杀开始时间时返回 true
     *
     * @return bool
     */
    public function getIsBeforeStartAttribute()
    {
        return Carbon::now()->lt($this->start_at);
    }

    /**
     * 定义一个名为 is_after_end 的访问器，当前时间晚于秒杀结束时间时返回 true
     *
     * @return bool
     */
    public function getIsAfterEndAttribute()
    {
        return Carbon::now()->gt($this->end_at);
    }
}
