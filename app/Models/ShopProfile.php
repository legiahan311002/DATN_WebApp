<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopProfile extends Model
{
    use HasFactory;

    protected $table = 'shop_profile';
    protected $fillable = ['id', 'username', 'name_shop', 'address', 'description', 'cover_image', 'approved', 'avt', 'created_at', 'updated_at'];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_shop', 'id');
    }

    public function categories_child()
    {
        return $this->hasMany(Category_Child::class, 'id_shop', 'id');
    }

    public function vouchers()
    {
        return $this->hasMany(Voucher::class, 'id_shop', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_shop', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
}
