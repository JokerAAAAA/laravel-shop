<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    /**
     * 可以被批量赋值的属性
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'value',
    ];

    /**
     * 指示是否自动维护时间戳
     *
     * 不需要 created_at 和 updated_at 字段
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
}
