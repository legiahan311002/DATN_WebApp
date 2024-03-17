<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Order_Detail;
use App\Models\User;
use App\Models\BuyerProfile;
use App\Models\Feedback;
use App\Models\Feedback_Images;
use App\Models\ShippingAddress;

class UserProfileController extends Controller
{
    public function showProfile()
    {
        $username = session('username');
        if(!$username) {
            return redirect()->route('client.home');
        }

       $user = User::where('username', $username)->first();
       $buyerProfile = BuyerProfile::where('username', $username)->first();


       if (!$user) {
           return redirect()->route('error.page')->with('error', 'User not found.');
       }
        return view('buyer.profile.profile',[
            'user'=>$user,
            'buyerProfile'=>$buyerProfile,
        ]);
    }

    public function updateProfile(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'accountName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'gender' => 'in:Nam,Nữ,Khác',
            'birthdate' => 'required|date',
            'upload' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $newUsername = $request->input('username');
        $existingUser = User::where('username', $newUsername)->first();

        if ($existingUser && $existingUser->username !== session('username')) {
            return redirect()
            ->back()
            ->withErrors(['username' => $existingUser->username . ' đã tồn tại'])
            ->withInput();

        }

        $user = User::where('username', session('username'))->first();
        $buyerProfile = BuyerProfile::where('username', session('username'))->first();

        if (!$user) {
            
            return redirect()->route('error.page')->with('error', 'User not found.');
        }

        
        $user->username = $newUsername; 
        $buyerProfile->account_name = $request->input('accountName');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone');
        $buyerProfile->gender = $request->input('gender');
        $buyerProfile->birth_day = $request->input('birthdate');

        if ($request->hasFile('upload')) {
            $imagePath = $request->file('upload')->store('profile_images', 'public');
            $buyerProfile->avt = Storage::url($imagePath);
        }

        $user->save();
        $buyerProfile->save();

        return redirect()->route('profile')->with('success', 'Cập nhật thông tin thành công.');
    }

    public function showPassword()
    {
        $username = session('username');
        if(!$username) {
            return redirect()->route('client.home');
        }
        return view('buyer.profile.password');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pass_old' => 'required|string|min:8',
            'pass_new' => 'required|string|min:8|different:pass_old',
            'pass_new_confirm' => 'required|string|min:8|same:pass_new',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('username', session('username'))->first();

        if (!$user || !Hash::check($request->input('pass_old'), $user->password)) {
            return redirect()
            ->back()
            ->withErrors(['Mật khẩu không đúng.'])
            ->withInput();
        }

        $user->password = Hash::make($request->input('pass_new'));
        $user->save();

        return redirect()->route('password')->with('success', 'Cập nhật mật khẩu thành công.');
    }

    public function showView()
    {    
        $username = session('username');
        if(!$username) {
            return redirect()->route('client.home');
        }
        $orderDetails = Order_Detail::join('order', 'order.id', '=', 'order_detail.id_order')
            ->join('product_detail', 'order_detail.id_product_detail', '=', 'product_detail.id')
            ->join('product_image', 'product_detail.id', '=', 'product_image.id_product_detail')
            ->join('product', 'product_detail.id_product', '=', 'product.id')
            ->select('product.name_product','product.id as idProduct', 'product_detail.name_product_detail', 'product_image.url_image', 'product_detail.price as productPrice','order.payment_methods', 'order_detail.*')
            ->where('order.username', '=',$username ) // Chắc chắn thay thế 'buyer_profile.username' bằng biến hoặc giá trị thích hợp
            ->get();
        

        return view('buyer.profile.view', ['orderDetails' => $orderDetails]);
    }

    // OrderController.php
    public function confirmReceived($id)
    {
        $orderDetail = Order_Detail::find($id);

        if (!$orderDetail) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
        }

        // Cập nhật trạng thái thành "Đã nhận hàng"
        $orderDetail->update(['status' => 'Đã nhận hàng']);

        return redirect()->back()->with('success', 'Đã xác nhận nhận hàng thành công.');
    }
    
    public function showSettings()
    {
        return view('buyer.profile.settings');
    }

    public function showAddress()
    {
        return view('buyer.profile.address');
    }

    public function addAddress(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ]);

        $address = new ShippingAddress();
        $address->name = $request->input('name');
        $address->phone_number = $request->input('phone');
        $address->address = $request->input('address');
        $address->default_address = 1;
        $address->username = auth()->user()->username; // Assuming you are using authentication

        // Save the address
        $address->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Address added successfully!');
    }

    public function submitReview(Request $request, $orderId) {
        // Lấy dữ liệu từ request
        $request->validate([
            'starRating' => [
                'required',
                Rule::in([1, 2, 3, 4, 5]), // Make sure the rating is one of 1, 2, 3, 4, or 5
            ],]);
        $starRating = $request->input('starRating');
        $comment = $request->input('comment');
    
        // Lưu hình ảnh vào thư mục cần thiết (nếu có)
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('review_images', 'public'); // Đặt tên thư mục lưu hình ảnh
                $imagePaths[] = Storage::url($path);
            }
        }
    
        // Lưu đánh giá vào cơ sở dữ liệu bằng Eloquent
        $review = new Feedback();
        $review->star = $starRating;
        $review->message = $comment;
        $review->id_order_detail = $orderId;
        $review->save();
    
        // Lưu các đường dẫn hình ảnh vào cơ sở dữ liệu (nếu có)
        foreach ($imagePaths as $imagePath) {
            $image = new Feedback_Images();
            $image->url_image = $imagePath;
            $image->id_feedback = $review->id;
            $image->save();
        }
    
        
        return redirect()->back()->with('ok', 'Đã đánh giá sản phẩm thành công.');
    }
    

}
