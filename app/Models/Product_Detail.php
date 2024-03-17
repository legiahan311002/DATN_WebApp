<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Detail extends Model
{
    use HasFactory;
    protected $table = 'product_detail'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng
    protected $fillable = ['id_product', 'name_product_detail', 'price', 'created_at', 'updated_at'];

    public function productImage()
    {
        return $this->hasMany(Product_Images::class, 'id_product_detail');
    }

    public function productSizes()
    {
        return $this->hasMany(Size_Product::class, 'id_product_detail');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'id_product_detail');
    }

    public function orderDetails()
    {
        return $this->hasMany(Order_Detail::class, 'id_product_detail');
    }

    public function productImages()
    {
        return $this->hasMany(Product_Images::class, 'id_product_detail');
    }
}
