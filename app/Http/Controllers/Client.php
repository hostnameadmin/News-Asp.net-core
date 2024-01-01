<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Register;
use App\Http\Requests\Login;
use Illuminate\Support\Facades\Hash;

/*
Code : DVMXH SMM Panel
Version : 1.0
Developer by : anhyeuem37 (https://www.facebook.com/anhyeuem3737)
Sdt : 0922235437
Vui lòng không tự ý sửa code, nếu gặp vấn đề sẽ không được hỗ trợ
*/

class Client extends Controller
{

    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function index(request $request)
    {
        $this->data  = ['title' => 'Tuongtacsales.com'];
        return view('index', ['data' => $this->data]);
    }

    public function register_view()
    {
        $this->data  = ['title' => 'Đăng ký tài khoản'];
        return view('register', ['data' => $this->data]);
    }

    public function confirm_register(Register $request)
    {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }

    public function login_view()
    {
        $this->data  = ['title' => 'Đăng nhập hệ thống'];
        return view('login', ['data' => $this->data]);
    }

    public function confirm_login(Login $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 0) {
                Auth::logout();
                return redirect()->route('login')->withErrors('Tài khoản đang bị khóa hoặc chưa được kích hoạt.');
            }
            return redirect()->route('home');
        }
        return back()->withInput()->withErrors('Thông tin đăng nhập không chính xác');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Đã đăng xuất tài khoản!');
    }
}
