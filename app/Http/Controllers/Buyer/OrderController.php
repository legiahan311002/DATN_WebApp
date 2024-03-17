<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_Detail;
use App\Models\User;
use App\Models\Product;
use App\Models\Product_Images;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Size_Product;
use App\Models\ShippingAddress;
use App\Models\Voucher;
use App\Models\Voucher_order;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function ProcessOrder(Request $request)
    {
        if (session()->has('username')) {
            session()->forget('priceVoucherSEASIDE');
            session()->forget('selectedSEASIDEVoucher');
            session()->forget('priceVoucherShop');
            session()->forget('selectedVoucher');
            $username = session('username');
    
            // Check if the ShippingAddress exists
            $shippingAddress = ShippingAddress::where('username', $username)->get();
            
            if ($shippingAddress->isEmpty()) {
                // Handle the case when ShippingAddress is not found
                return redirect()->route('buyer.address.create')->with('info', 'Please add a shipping address first.');
            }
    
            $size = $request->input('size');
            $quantity = $request->input('quantity');
            $user = User::where('username', $username)->first();
            $selectedColorId = $request->input('color');
            $productDetail = Product_Detail::find($selectedColorId);
    
            $productId = $productDetail->id_product;
    
            $product = Product::find($productId);
    
            $voucherShops = Voucher::where('id_shop', $product->id_shop)
                ->where('usageLimit', '>', 0)
                ->where('validTo', '>=', Carbon::now())
                ->get();
    
            $voucherSEASIDEs = Voucher::whereNull('id_shop')
                ->where('usageLimit', '>', 0)
                ->where('validTo', '>=', Carbon::now())
                ->get();
    
            $product_Images = Product_Images::where('id_product_detail', $selectedColorId)->get();
    
            return view('buyer.order.orderProduct', [
                'user' => $user,
                'productDetail' => $productDetail,
                'product' => $product,
                'size' => $size,
                'quantity' => $quantity,
                'product_Images' => $product_Images,
                'shippingAddres' => $shippingAddress,
                'voucherShops' => $voucherShops,
                'voucherSEASIDEs' => $voucherSEASIDEs,
            ]);
        } else {
            // Handle the case when the user is not logged in
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
    }
    

    public function voucherShop(Request $request)
    {
        $username = session('username');
        $shippingAddres=ShippingAddress::WHERE('username',$username)->get();
        $selectedVoucher = $request->input('shopVoucher');        
        session()->put('selectedVoucher', $selectedVoucher);
        $priceVoucherShop = Voucher::where('id', $selectedVoucher)->value('discountAmount');
        session()->put('priceVoucherShop', $priceVoucherShop);
        
        $size = $request->input('size');
        $quantity = $request->input('quantity');
        $user = User::where('username', $username)->first();
        $selectedColorId = $request->input('color');
        $productDetail = Product_Detail::find($selectedColorId);

        $productId = $productDetail->id_product;

        $product = Product::find($productId);$voucherShops = Voucher::where('id_shop', $product->id_shop)
        ->where('usageLimit', '>', 0)
        ->where('validTo','>=',Carbon::now())
        ->get();
        $voucherSEASIDEs = Voucher::whereNull('id_shop')
        ->where('usageLimit', '>', 0)
        ->where('validTo','>=',Carbon::now())
        ->get();

        $product_Images = Product_Images::where('id_product_detail', $selectedColorId)->get();

        // dd($request->all());
        return view('buyer.order.orderProduct', [
            'user' => $user,
            'productDetail' => $productDetail,
            'product' => $product,  // Pass the product to the view
            'size' => $size,
            'quantity' => $quantity,
            'product_Images' => $product_Images,
            'shippingAddres' => $shippingAddres,
            'voucherShops' => $voucherShops,
            'voucherSEASIDEs' => $voucherSEASIDEs,
        ]);
        
    }public function voucherSEASIDE(Request $request)
    {
        $username = session('username');
        $shippingAddres=ShippingAddress::WHERE('username',$username)->get();
        $selectedSEASIDEVoucher = $request->input('SEASIDEvoucher');        
        session()->put('selectedSEASIDEVoucher', $selectedSEASIDEVoucher);
        $priceVoucherSEASIDE = Voucher::where('id', $selectedSEASIDEVoucher)->value('discountAmount');
        session()->put('priceVoucherSEASIDE', $priceVoucherSEASIDE);
        
        $size = $request->input('size');
        $quantity = $request->input('quantity');
        $user = User::where('username', $username)->first();
        $selectedColorId = $request->input('color');
        $productDetail = Product_Detail::find($selectedColorId);

        $productId = $productDetail->id_product;

        $product = Product::find($productId);$voucherShops = Voucher::where('id_shop', $product->id_shop)
        ->where('usageLimit', '>', 0)
        ->where('validTo','>=',Carbon::now())
        ->get();
        $voucherSEASIDEs = Voucher::whereNull('id_shop')
        ->where('usageLimit', '>', 0)
        ->where('validTo','>=',Carbon::now())
        ->get();

        $product_Images = Product_Images::where('id_product_detail', $selectedColorId)->get();

        // dd($request->all());
        return view('buyer.order.orderProduct', [
            'user' => $user,
            'productDetail' => $productDetail,
            'product' => $product,  // Pass the product to the view
            'size' => $size,
            'quantity' => $quantity,
            'product_Images' => $product_Images,
            'shippingAddres' => $shippingAddres,
            'voucherShops' => $voucherShops,
            'voucherSEASIDEs' => $voucherSEASIDEs,
        ]);
        
    }

    public function SaveOrder(Request $request) {
        $username = session('username');
        $priceVoucherSEASIDE = session('priceVoucherSEASIDE');
        $priceVoucherShop = session('priceVoucherShop');
        $productDetail = Product_Detail::find($request->input('color'));
        $quantity = $request->input('quantity');
        $size = $request->input('size');

        $order = new Order();
        $order->username = $username; 
        $order->id_shipping_address = '1'; 
        $order->payment_methods = 'Thanh toán khi nhận hàng'; 
        $order->save();

        // Tạo một chi tiết đơn hàng mới
        $orderDetail = new Order_Detail();
        $orderDetail->id_order = $order->id; 
        $orderDetail->id_product_detail = $productDetail->id;
        $orderDetail->quantity = $quantity;
        $orderDetail->size = $size;
        $orderDetail->price = $productDetail->price * $quantity + 20000 - $priceVoucherShop - $priceVoucherSEASIDE; 
        $orderDetail->status = 'Chờ duyệt'; 
        $orderDetail->save();

        $size_Product = Size_Product::where([
            ['id_product_detail', $productDetail->id],
            ['size', $size],
        ])->first();
        $size_Product->product_number -= $quantity;
        $size_Product->save();        
        $shopVoucherCode = $request->input('shopVoucher');
        $voucherSEASIDECode = $request->input('voucherSEASIDE');
    
        if (!empty($shopVoucherCode)) {
            Voucher_order::saveVoucher($orderDetail->id, $shopVoucherCode);
        }
    
        if (!empty($voucherSEASIDECode)) {
            Voucher_order::saveVoucher($orderDetail->id, $voucherSEASIDECode);
        }
        // dd($request->all());
        return redirect()->route('view')->with('ok', 'Đã đặt hàng thành công');

    }

    public function saveOrderOnline(Request $request) {
        // Lấy các tham số trả về từ VNPAY
    $vnp_ResponseCode = isset($_GET['vnp_ResponseCode']) ? $_GET['vnp_ResponseCode'] : '';

    // Kiểm tra xem thanh toán có bị hủy hay không
    if ($vnp_ResponseCode === '24') {
        // Thực hiện các xử lý khi thanh toán bị hủy
        echo "Thanh toán bị hủy. Xử lý tại đây.";
        return redirect()->route('client.home');
    } else {
        // Thực hiện các xử lý khác nếu cần
        $username = session('username');
        $quantity = $request->input('quantity');
        $size = $request->input('size');
        $vnp_Amount=$request->input('vnp_Amount');
        $idProductDetail = $request->input('idProductDetail');    
        
        $order = new Order();
        $order->username = $username; 
        $order->id_shipping_address = '1'; 
        $order->payment_methods = 'Đã thanh toán'; 
        $order->save();

        // Tạo một chi tiết đơn hàng mới
        $orderDetail = new Order_Detail();
        $orderDetail->id_order = $order->id; 
        $orderDetail->id_product_detail = $idProductDetail;
        $orderDetail->quantity = $quantity;
        $orderDetail->size = $size;
        $orderDetail->price = $vnp_Amount/100; 
        $orderDetail->status = 'Chờ duyệt'; 
        $orderDetail->save();
        if (session()->has('selectedSEASIDEVoucher')) {
            
            $selectedSEASIDEVoucher = session('selectedSEASIDEVoucher');
            Voucher_order::saveVoucher($orderDetail->id, $selectedSEASIDEVoucher);
        }        
        if (session()->has('selectedVoucher')) {
            
            $selectedVoucher = session('selectedVoucher');
            Voucher_order::saveVoucher($orderDetail->id, $selectedVoucher);
        }

        $size_Product = Size_Product::where([
            ['id_product_detail', $idProductDetail],
            ['size', $size],
        ])->first();
        $size_Product->product_number -= $quantity;
        $size_Product->save();  
        return redirect()->route('view')->with('ok', 'Đã đặt hàng thành công');
    }

    }
    
}