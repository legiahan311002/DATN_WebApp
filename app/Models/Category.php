<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng
    protected $fillable = ['name_category','url_category','created_at','updated_at'];
    public function categoryChildren()
    {
        return $this->hasMany(Category_Child::class, 'id_category');
    }
    public function categories_child()
    {
        return $this->hasMany(Category_Child::class, 'name_shop', 'name_shop');
    }
}
