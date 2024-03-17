<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $table = 'user'; // Tên của bảng trong cơ sở dữ liệu
    // Các trường của bảng
    protected $primaryKey = 'username';

    protected $fillable = ['username', 'email', 'phone_number', 'password', 'createStore', 'remember_token', 'facebook_id', 'google_id', 'email_verification_token', 'email_verified', 'created_at', 'updated_at'];
    // Thêm dòng sau để xác định rằng không sử dụng khóa tăng tự động
    public $incrementing = false;
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function shopProfile()
    {
        return $this->hasOne(ShopProfile::class, 'username', 'username');
    }

    
}
