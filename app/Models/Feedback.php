<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng
    protected $fillable = ['id_order_detail', 'message', 'star', 'created_at', 'updated_at'];

    public function orderDetail()
    {
        return $this->belongsTo(Order_Detail::class, 'id_order_detail');
    }

    public function images()
    {
        return $this->hasMany(Feedback_Images::class, 'id_feedback');
    }
}
