<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerProfile extends Model
{
    use HasFactory;

    protected $table = 'buyer_profile';
    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'username',
        'account_name',
        'gender',
        'birth_day',
        'avt',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }

    public function shippingAddresses()
    {
        return $this->hasMany(ShippingAddress::class, 'id_shipping_address', 'username');
    }
}
