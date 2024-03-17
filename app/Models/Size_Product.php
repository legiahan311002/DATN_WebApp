<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size_Product extends Model
{
    use HasFactory;
    protected $table = 'product_size'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng
    protected $fillable = ['id_product_detail','size','product_number','created_at','updated_at'];

    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }
}
