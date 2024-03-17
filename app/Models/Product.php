<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng
    protected $fillable = ['name_product', 'id_shop', 'id_category_child', 'description', 'created_at', 'updated_at'];

    public function category_child()
    {
        return $this->belongsTo(Category_Child::class, 'id_category_child');
    }

    public function productDetails()
    {
        return $this->hasMany(Product_Detail::class, 'id_product');
    }

    public function orderDetails()
    {
        return $this->hasManyThrough(
            Order_Detail::class,
            Product_Detail::class,
            'id_product', // Khóa ngoại trong bảng trung gian (Product_Detail)
            'id', // Khóa chính của model trung gian (Product_Detail)
            'id', // Khóa chính của model đích (Order_Detail)
            'id_product' // Khóa ngoại trong bảng đích (Order_Detail)
        );
    }

    public function shop()
    {
        return $this->belongsTo(ShopProfile::class, 'id_shop');
    }
    
}
