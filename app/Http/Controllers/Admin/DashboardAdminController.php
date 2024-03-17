<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\BuyerProfile;
use App\Models\ShopProfile;
use App\Models\Order_Detail;
use App\Models\Voucher;
use App\Models\Voucher_order;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $countBuyer = BuyerProfile::count();
        $countShop = ShopProfile::where('approved', 1)->count();
    
        $totalOrder = Order_Detail::where('status', 'Đã nhận hàng')->sum('price') * 0.1;
    
        $totalVoucher = DB::table(DB::raw('(SELECT voucher.discountAmount, COUNT(voucher.id) AS voucher_count
            FROM order_detail
            JOIN voucher_order ON order_detail.id = voucher_order.id_order
            JOIN voucher ON voucher_order.voucher_code = voucher.id
            WHERE voucher.id_shop IS NULL
              AND order_detail.status = \'Đã nhận hàng\'
            GROUP BY voucher.discountAmount) as subquery'))
            ->selectRaw('SUM(subquery.discountAmount * subquery.voucher_count) AS totalAmount')
            ->pluck('totalAmount')
            ->first();
    
        return view('admin.home.index', [
            'countBuyer' => $countBuyer,
            'countShop' => $countShop,
            'totalOrder' => $totalOrder,
            'totalVoucher' => $totalVoucher,
        ]);
    }
    
}
