<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

/*
Code : DVMXH SMM PANEL
Version : 1.0
Developer by : anhyeuem37 (https://www.facebook.com/anhyeuem3737)
Sdt : 0922235437
Vui lòng không tự ý sửa code, nếu gặp vấn đề sẽ không được hỗ trợ
*/

class Client extends Controller
{
    public function index()
    {
        $data = [];
        $data['title'] = 'Tuongtacsales.com';
        return view('index', ['data' => $data]);
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'username' => 'required|min:6|max:255|unique:user',
                'email' => 'required|email|unique:user',
                'password' => 'required|min:6'
            ]);
            DB::table('user')->insert([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')), // Mã hóa mật khẩu
                'status' => 0
            ]);
            Session::flash('success', 'Đăng ký tài khoản thành công!');
        }
        $data = [
            'title' => 'Đăng ký tài khoản',
        ];
        return view('register', ['data' => $data]);
    }
}
