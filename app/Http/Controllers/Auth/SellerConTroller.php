<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\User_Permission;
use App\Models\ShopProfile;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|unique:user|max:255',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'nullable|string|regex:/^\d{10}$/',

        ]);

        $user = User::create([
            'username' => $request->username,
            'account_name' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
            'createStore' => 0,
            'avt' => 'https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png',
            'email_verification_token' => Str::random(60),
        ]);

        session()->put('username', $request->username);
        $userPermission = new User_Permission();
        $userPermission->id_permission = 2;
        $userPermission->username = $user->username;
        $userPermission->save();

        Mail::to($user->email)->send(new VerifyEmail($user));

        Log::info('Email sent successfully');
        return redirect()->route('verify.email.custom')->with('success', 'Đăng ký thành công. Vui lòng kiểm tra email để xác thực tài khoản.');
    }

    public function verifyEmail($token)
    {
        // Tìm người dùng theo token
        $user = User::where('email_verification_token', $token)->first();

        // Kiểm tra xem người dùng có tồn tại không và email chưa được xác thực
        if ($user && !$user->email_verified) {
            // Cập nhật thông tin người dùng
            $user->email_verified = true;
            $user->email_verification_token = null;
            $user->save();
            return redirect()->route('verify.email.custom2')->with('success', 'Xác thực email thành công. Vui lòng <a href="' . route('create.shop') . '">cung cấp thông tin về cửa hàng</a> để hoàn tất đăng kí.');
        }

        return redirect()->route('verify.email.custom2')->with('error', 'Link xác thực không hợp lệ hoặc email đã được xác thực.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            // Kiểm tra cả trường email_verified
            if ($user->email_verified == 1) {
                $id_permission = User_Permission::where('username', $user->username)->pluck('id_permission')->toArray();
                session()->put('username', $user->username);

                if (in_array(2, $id_permission)) {
                    $shopProfile = ShopProfile::where('username', $user->username)->first();
                    if ($user->createStore == 0) {

                        return redirect()->route('create.shop');
                    } else {

                        if ($shopProfile && $shopProfile->approved == 1) {

                            return redirect()->route('seller');
                        } else {

                            return redirect()->route('auth.seller.confirm');
                        }
                    }
                } else {

                    return back()->with('fail', 'Không có quyền truy cập');
                }
            } else {
                // Người dùng chưa xác thực email
                auth()->logout(); // Đăng xuất người dùng
                return back()->with('fail', 'Vui lòng xác thực email trước khi đăng nhập.');
            }
        } else {
            return back()->with('fail', 'Sai tên đăng nhập hoặc mật khẩu');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->back();
    }

    public function create()
    {

        return view('auth.seller.informationshop', []);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name_shop' => 'required|string',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'avt' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $username = session('username');

        $user = User::where('username', $username)->first();

        if ($user) {
            $user->update(['createStore' => 1]);

            $shop = new ShopProfile();
            $shop->name_shop = $request->input('name_shop');
            $shop->username = $username;
            $shop->address = $request->input('address');
            $shop->description = $request->input('description');
            $shop->approved = 0;

            if ($request->hasFile('cover_image')) {
                $imagePath = $request->file('cover_image')->store('profile_images', 'public');
                $shop->cover_image = Storage::url($imagePath);
            }

            if ($request->hasFile('avt')) {
                $imageAvt = $request->file('avt')->store('profile_images', 'public');
                $shop->avt = Storage::url($imageAvt);
            }

            $shop->save();
            return redirect()->route('auth.seller.confirm');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }
    public function changeChannel()
    {
        $username = session('username');
        $createStore = User::where('username', $username)->value('createStore');
        if (session()->has('username')) {
            $id_permissions = User_Permission::where('username', $username)->pluck('id_permission')->toArray();
            if (in_array(2, $id_permissions)) {
                $shopProfile = ShopProfile::where('username', $username)->first();
                if ($createStore == 0) {

                    return redirect()->route('create.shop');
                } else {

                    if ($shopProfile && $shopProfile->approved == 1) {

                        return redirect()->route('seller');
                    } else {

                        return redirect()->route('auth.seller.confirm');
                    }
                }
            } else {
                $userPermission = new User_Permission();
                $userPermission->id_permission = 2;
                $userPermission->username = $username;
                $userPermission->save();

                $user = User::where('username', $username)->first();
                $user->update(['createStore' => 0]);

                return redirect()->route('create.shop');
            }
        } else {
            return redirect()->route('seller.login')->with('error', 'Please log in first.');
        }
    }
}
