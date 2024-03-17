<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'voucher';
    protected $primaryKey = 'id';
    protected $fillable = ['code', 'id_shop', 'discountPercentage', 'discountAmount', 'validFrom', 'validTo', 'usageLimit', 'platformVoucher', 'created_at', 'updated_at'];

    public function shopProfile()
    {
        return $this->belongsTo(ShopProfile::class, 'id_shop', 'id');
    }

    public function usedVoucherCount()
    {
        return Order_Detail::where('voucher_code', $this->code)->count();
    }

    public function isHappening()
    {
        $currentDate = now();
        return $this->validFrom <= $currentDate && $this->validTo >= $currentDate;
    }

    public function isUpcoming()
    {
        $soonThreshold = now()->addDays(14); 
        return $this->validFrom > now() && $this->validFrom <= $soonThreshold;
    }

    public function isFinished()
    {
        return $this->validTo < now();
    }
}
