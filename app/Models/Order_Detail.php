<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    protected $primaryKey = 'id';
    protected $fillable = ['id_order', 'id_product_detail', 'quantity', 'size', 'price', 'status', 'created_at', 'updated_at'];

    public function productDetail()
    {
        return $this->belongsTo(Product_Detail::class, 'id_product_detail');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'id_order_detail');
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'voucher_code', 'code');
    }

    public function confirmStatus()
    {
        return $this->status === 'Chờ duyệt';
    }

    public function pickupStatus()
    {
        return trim(strtolower($this->status)) === 'chờ lấy hàng';
    }

    public function deliveryStatus()
    {
        return trim(strtolower($this->status)) === 'Đang giao hàng';
    }

    public function completeStatus()
    {
        return trim(strtolower($this->status)) === 'Đã nhận hàng';
    }
}
