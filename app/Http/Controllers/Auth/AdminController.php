<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User_Permission;


class AdminController extends Controller
{
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->back();
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
                $id_permission = User_Permission::where('username', $user->username)->value('id_permission');
                session()->put('username', $user->username);

                if ($id_permission == 1) {
                    return redirect()->route('admin.home');
                } else {
                    return back()->with('fail', 'Không có quyền truy cập');
                }
            } else {
                auth()->logout(); 
                return back()->with('fail', 'Vui lòng xác thực email trước khi đăng nhập.');
            }
        } else {
            return back()->with('fail', 'Sai tên đăng nhập hoặc mật khẩu');
        }
    }

}
