<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product_Detail;
use Illuminate\Support\Facades\Redirect;
use Omnipay\Omnipay;
use App\Models\User;
use App\Models\Order_Detail;


class PaymentController extends Controller
{
    // private $gateway;
    // public function __construct() {
    //     $this->gateway = Omnipay::create("PayPal_Rest");
    //     $this->gateway->setClientId(env("PAYPAL_CLIENT_ID"));
    //     $this->gateway->setSecret(env("PAYPAL_CLIENT_SECRET"));
    //     $this->gateway->setTestMode(true);
    // }

    // public function pay(Request $request) {
    //     $user = $request->user();
    //     $price = $request->input('price');
    //     $idProductDetail = $request->input('color');
    //     $quantity = $request->input('quantity');
    //     $size = $request->input('size');
    //     try{
    //         $response = $this->gateway->purchase(array(
    //             'amount' => $price / 100000, // số tiền : cần chuyển sang usd
    //             'currency' => env('PAYPAL_CURRENCY'),
    //             // thay cổng theo server máy đang chạy http://localhost:8000 
    //             'returnUrl' => "http://127.0.0.1:8000/success?" . http_build_query([
    //                 'quantity' => $quantity,
    //                 'size' => $size,
    //                 'idProductDetail' => $idProductDetail, 
    //                 'price' => $price, 
    //             ]), // direct đến trang success nếu thành công
    //             'cancelUrl' => url('error'), // direact đến trang eror nếu thất bại
    //         ))->send();

    //         if($response->isRedirect()) {
    //             $response->redirect();
    //         } else {
    //             return $response->getMessage();
    //         }

    //     }catch (\Throwable $th){
    //         return $th->getMessage();
    //     }
    // }

    // public function success(Request $request) {
    //     $username = session('username');
    //     $price = $request->input('price');
    //     $productDetail = $request->input('idProductDetail');
    //     $quantity = $request->input('quantity');
    //     $size = $request->input('size');

    //     $order = new Order();
    //     $order->username = $username; 
    //     $order->day_order = now(); 
    //     $order->status = 'Đã thanh toán'; 
    //     $order->save();

    //     // Tạo một chi tiết đơn hàng mới
    //     $orderDetail = new Order_Detail();
    //     $orderDetail->id_order = $order->id; 
    //     $orderDetail->id_product_detail = $productDetail;
    //     $orderDetail->quantity = $quantity;
    //     $orderDetail->size = $size;
    //     $orderDetail->price = $price; 
    //     $orderDetail->status = 'Chờ duyệt'; 
    //     $orderDetail->save();

    //     return redirect()->route('view')->with('ok', 'Đã đặt hàng thành công');
    // }

    // public function error() {
    //     return "User is decline Payment!"; //thanh toán thất bại
    // }


    public function vnpayPayment(Request $request)
    { 
        $user = $request->user();
        $productDetail = Product_Detail::find($request->input('color'));
        $idProductDetail = $productDetail->id;
        $quantity = $request->input('quantity');
        $size = $request->input('size');
        $latestOrderId = Order::max('id');
        $priceVoucherSEASIDE = session('priceVoucherSEASIDE');
        $priceVoucherShop = session('priceVoucherShop');

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        // thay cổng theo server máy đang chạy http://localhost:8000 
        $vnp_Returnurl = "http://127.0.0.1:8000/saveOrderOnline?" . http_build_query([
            'quantity' => $quantity,
            'size' => $size,
            'idProductDetail' => $idProductDetail,
        ]);

        $vnp_TmnCode = "B2J4MPE7";
        $vnp_HashSecret = "GJMOFOTJTDUCFICNLVGVBIBLCXLRDDHH";

        $vnp_TxnRef = $latestOrderId+1;
        $vnp_OrderInfo = 'Thanh toan hoa don';
        $vnp_OrderType = 'xtmn';
        $vnp_Amount =  ($productDetail->price * $quantity + 20000 - $priceVoucherSEASIDE - $priceVoucherShop)*100;
        $vnp_Locale = 'VN';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }


}
