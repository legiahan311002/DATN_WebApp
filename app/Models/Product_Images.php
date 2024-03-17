<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Images extends Model
{
    use HasFactory;
    protected $table = 'product_image'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng
    protected $fillable = ['id_product_detail', 'url_image', 'created_at', 'updated_at'];

    public function productDetail()
    {
        return $this->belongsTo(Product_Detail::class, 'id_product_detail', 'id');
    }
}
