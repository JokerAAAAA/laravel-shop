<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, DefaultDatetimeFormat;

    /**
     * 可以被批量赋值的属性
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * 数组中的属性会被隐藏
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * 应进行类型转换的属性
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 默认头像
     *
     * @return mixed
     */
    public function getAvatarAttribute()
    {
        return \Avatar::create($this->name)->toBase64();
    }

    /**
     * 地址信息
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

    /**
     * 商品收藏
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'user_favorites')
            ->withTimestamps()
            ->orderBy('user_favorites.created_at', 'desc');
    }

    /**
     * 购物车
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
