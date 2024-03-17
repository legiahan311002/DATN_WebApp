<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order_Detail;
use App\Models\ShopProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('shopProfile');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $shopId = $request->idShop;
        $shopProfile = ShopProfile::find($shopId);

        if ($shopProfile) {
            $productCount = $shopProfile->products()->count();

            $orderDetailCount = 0;
            foreach ($shopProfile->products as $product) {
                foreach ($product->productDetails as $productDetail) {
                    $orderDetailCount += $productDetail->orderDetails->count();
                }
            }

            $revenue = 0;
            foreach ($shopProfile->products as $product) {
                foreach ($product->productDetails as $productDetail) {
                    $revenue += $productDetail->orderDetails
                        ->where('status', trim(strtolower('Đã nhận hàng')))
                        ->sum('price');
                }
            }

            $totalVoucher = DB::table(DB::raw('(SELECT voucher.discountAmount, COUNT(voucher.id) AS voucher_count
            FROM order_detail
            JOIN voucher_order ON order_detail.id = voucher_order.id_order
            JOIN voucher ON voucher_order.voucher_code = voucher.id
            JOIN product_detail ON order_detail.id_product_detail = product_detail.id
            JOIN product ON product_detail.id_product = product.id
            WHERE voucher.id_shop IS NULL
                AND order_detail.status = \'Đã nhận hàng\'
                AND product.id_shop = ' . $shopId . ' 
            GROUP BY voucher.discountAmount) as subquery'))
            ->selectRaw('SUM(subquery.discountAmount * subquery.voucher_count) AS totalAmount')
            ->pluck('totalAmount')
            ->first();
        

            return view('seller.dashboard.index', compact('productCount', 'orderDetailCount', 'revenue','totalVoucher'));
        } else {
            return response()->json(['error' => 'Shop not found'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
