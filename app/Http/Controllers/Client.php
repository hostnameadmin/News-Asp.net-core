<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Register;
use App\Http\Requests\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Gmail;

/*
Code : DVMXH SMM Panel
Version : 1.0
Developer by : anhyeuem37 (https://www.facebook.com/anhyeuem3737)
Sdt : 0922235437
Vui lòng không tự ý sửa code, nếu gặp vấn đề sẽ không được hỗ trợ
*/

class Client extends Controller
{
    private $domain;
    private $data;

    public function __construct(Request $request)
    {
        $this->domain = parse_url($request->root(), PHP_URL_HOST);
        $this->data = [];
    }

    public function index()
    {
        $this->data  = ['title' => 'Tuongtacsales.com'];
        return view('index', ['data' => $this->data]);
    }

    public function register()
    {
        $this->data  = ['title' => 'Đăng ký tài khoản'];
        return view('register', ['data' => $this->data]);
    }

    public function login()
    {
        $this->data  = ['title' => 'Đăng nhập hệ thống'];
        return view('login', ['data' => $this->data]);
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Đã đăng xuất tài khoản!');
    }

    public function reset_password($token = null)
    {
        if ($token) {
            $User = User::where('token', $token)->first();
            if (!$User) {
                return redirect()->route('login')->withErrors('Token không hợp lệ!');
            }
        }
        $this->data  = ['title' => 'Lấy lại mật khẩu'];
        return view('reset_password', ['data' => $this->data, 'token' => $token]);
    }

    public function register_send(Register $request)
    {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'token' => Str::random(60)
        ]);
        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }

    public function login_send(Login $request)
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


    public function send_token(request $request)
    {
        $request->validate(
            [
                'email' => 'required|email'
            ],
            [
                'email.required'  => 'Vui lòng nhập địa chỉ email !',
                'email.email' => 'Địa chỉ email không hợp lệ !'
            ]
        );
        $Email = User::where('email', $request->email)->first();
        if ($Email) {
            $token = $Email->token;
            $link = route('reset_password', ['token' => $token]);
            $subject = 'Quên mật khẩu';
            $content = '<div id=":o8" class="a3s aiL "><h3>' . $this->domain . ' xác nhận quên mật khẩu tài khoản !</h3>
                <p>Xin chào : ' . $Email->name . '!</p>
                <p>Bạn vui lòng truy cập liên kết <a href="' . $link . '" target="_blank" data-saferedirecturl="">này </a> để thực hiện thay đổi mật khẩu nhé</p>
                <p>Nếu có vấn đề gì cần trao đổi thêm, bạn có thể liên hệ với ' . $this->domain . ' qua kênh hỗ trợ:</p>
                <ul>
                    <li>Email: <a href="mailto:anhdoitrapro@gmail.com" target="_blank">anhdoitrapro@gmail.com</a></li>
                    <li>Hotline: 0922235437 </li>
                </ul><div class="yj6qo"></div><div class="adL">
                </div></div>';
            Mail::to($request->email)->send(new Gmail($subject, $content));
            return redirect()->route('login')->with('success', 'Gửi email lấy lại mật khẩu thành công!');
        }
        return redirect()->route('reset_password')->withErrors('Địa chỉ email không chính xác !');
    }

    public function new_password(request $request)
    {
        $request->validate(
            [
                'password' => 'required|min:6|confirmed',
                'token' => 'required'
            ],
            [
                'token.require' => 'Token là bắt buộc !',
                'password.required'  => 'Vui lòng nhập mật khẩu !',
                'password.min' => 'Mật khẩu không an toàn !',
                'password.confirmed' => 'Nhập lại mật khẩu không chính xác !'
            ]
        );
        $User = User::where('token', $request->token)->first();
        if ($User) {
            $User->update([
                'password' => Hash::make($request->password),
                'token' => Str::random(60)
            ]);
            return redirect()->route('login')->with('success', 'Lấy lại mật khẩu thành công !');
        }
        return redirect()->route('login')->withErrors('Token không hợp lệ !');
    }
}
