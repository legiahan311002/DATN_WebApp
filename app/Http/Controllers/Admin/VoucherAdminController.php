<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Voucher\CreateVoucherRequest;
use App\Http\Requests\Voucher\UpdateVoucherRequest;
use App\Models\Order_Detail;
use App\Models\ShopProfile;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VoucherAdminController extends Controller
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
        $vouchers = Voucher::whereNull('id_shop')->get();

        return view('admin.voucher.index', compact('vouchers'));
    }

    public function store(CreateVoucherRequest $request)
    {
        try {
            Voucher::create([
                'code' => $request->input('code'),
                'id_shop' => null,
                'discountPercentage' => $request->input('discountPercentage'),
                'discountAmount' => $request->input('discountAmount'),
                'validFrom' => $request->input('validFrom'),
                'validTo' => $request->input('validTo'),
                'usageLimit' => $request->input('usageLimit'),
                'platformVoucher' => 0
            ]);

            Session::flash('success', 'Thêm voucher thành công');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Thêm voucher lỗi');
            // \Log::error($err->getMessage());
            // dd($err->getMessage());
            return redirect()->back();
        }

        return redirect()->intended('/admin/vouchers/list');
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
        try {
            $voucher = Voucher::findOrFail($id);
    
            return view('admin.voucher.update', compact('voucher'));
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            // Xử lý lỗi, có thể chuyển hướng hoặc hiển thị thông báo
            return redirect()->back()->with('error', 'Không tìm thấy voucher');
        }
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
            // dd($err->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->intended('/admin/vouchers/list');
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
