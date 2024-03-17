<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;
    protected $table = 'shipping_address'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng
    protected $fillable = ['username','name','phone_number','address','default_address','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_shipping_address', 'id');
    }
}
