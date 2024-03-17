<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Voucher\CreateVoucherRequest;
use App\Http\Requests\Voucher\UpdateVoucherRequest;
use App\Models\Order_Detail;
use App\Models\ShopProfile;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VoucherController extends Controller
{
    protected $voucher;

    public function __construct(Voucher $voucher)
    {
        $this->voucher = $voucher;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $shopProfile = ShopProfile::where('username', $user->username)->first();
        $vouchers = $shopProfile->vouchers()->get();

        return view('seller.voucher.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seller.voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateVoucherRequest $request)
    {
        try {
            $user = auth()->user();

            // Query the ShopProfile model to get the name_shop
            $shopProfile = ShopProfile::where('username', $user->username)->first();
            $idShop = $shopProfile->id;
            Voucher::create([
                'code' => $request->input('code'),
                'id_shop' => $idShop,
                'discountPercentage' => $request->input('discountPercentage'),
                'discountAmount' => $request->input('discountAmount'),
                'validFrom' => $request->input('validFrom'),
                'validTo' => $request->input('validTo'),
                'usageLimit' => $request->input('usageLimit'),
                'platformVoucher' => 1
            ]);

            Session::flash('success', 'Thêm voucher thành công');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Thêm voucher lỗi');
            // \Log::error($err->getMessage());
            // dd($err->getMessage());
            return redirect()->back();
        }

        return redirect()->intended('/seller1/vouchers/list');
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
        $user = auth()->user();
        $shopProfile = ShopProfile::where('username', $user->username)->first();
        $voucher = $shopProfile->vouchers()->findOrFail($id);

        return view('seller.voucher.update', compact('voucher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoucherRequest $request, string $id)
    {
        try {
            $voucher = Voucher::findOrFail($id);
            
            $voucher->code = $request->input('code');
            $voucher->discountPercentage = $request->input('discountPercentage');
            $voucher->discountAmount = $request->input('discountAmount');
            $voucher->validFrom = $request->input('validFrom');
            $voucher->validTo = $request->input('validTo');
            $voucher->usageLimit = $request->input('usageLimit');
            $voucher->save();

            Session::flash('success', 'Cập nhật voucher thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật voucher lỗi');
            // \Log::error($err->getMessage());
            dd($err->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->intended('/seller1/vouchers/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $voucher = Voucher::findOrFail($id);
            $voucher->delete();

            return redirect()->back()->with('success', 'Xóa voucher thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xóa voucher thất bại');
        }

    }
}
