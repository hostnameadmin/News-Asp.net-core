<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Transaction;
use App\Models\Services;
use App\Models\History_order;
use App\Models\Orders;
use App\Models\Ticket;
use App\Models\Banking;
use App\Models\News;
use App\Models\Settings;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Register;
use App\Http\Requests\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Mail\Gmail;
use App\Helpers\Anhyeuem37;


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
        $this->data['title'] = 'Trang chủ';
        $this->data['amount_month'] = Transaction::whereYear('created_at', '=', Carbon::now()->year)
            ->whereMonth('created_at', '=', Carbon::now()->month)->where('username', Auth::user()->username)
            ->sum('amount');
        $this->data['amount_total'] = Transaction::where('username', Auth::user()->username)
            ->sum('amount');
        $this->data['news'] = News::where('status', 1)->orderBy('id', 'desc')->get();
        return view('index', ['data' => $this->data]);
    }

    public function history()
    {
        $this->data['title'] = 'Lịch sử giao dịch';
        $username = Auth::user()->username;
        $this->data['history'] = History_order::where('username', $username)->orderBy('id', 'desc')
            ->paginate(10);
        return view('history', ['data' => $this->data]);
    }

    public function info()
    {
        $this->data['title'] = 'Thông tin tài khoản';
        $username = Auth::user()->username;
        $this->data['info'] = User::where('username', $username)->first();
        return view('info', ['data' => $this->data]);
    }

    public function register()
    {
        $this->data  = ['title' => 'Đăng ký tài khoản'];
        $this->data['logo'] = Settings::where('key', 'logo')->get();
        return view('register', ['data' => $this->data]);
    }

    public function login()
    {
        $this->data  = ['title' => 'Đăng nhập hệ thống'];
        $this->data['logo'] = Settings::where('key', 'logo')->get();
        return view('login', ['data' => $this->data]);
    }
    public function api()
    {
        $this->data  = ['title' => 'Kết nối API'];
        return view('api', ['data' => $this->data]);
    }

    public function banking()
    {
        $this->data  = ['title' => 'Nạp tiền vào tài khoản'];
        $this->data['settings'] = Settings::where('key', 'syntax')->first();
        $this->data['banking'] = Banking::where('status', 1)->get();
        return view('banking', ['data' => $this->data]);
    }

    public function backup()
    {
        $this->data  = ['title' => 'Khôi phục tài khoản'];
        return view('backup', ['data' => $this->data]);
    }

    public function ticket()
    {
        $this->data  = ['title' => 'Hỗ trợ - Khiếu nại'];
        $this->data['order'] = Orders::where('username', Auth::user()->username)->get();
        $this->data['ticket'] = Ticket::where('username', Auth::user()->username)->get();
        return view('ticket', ['data' => $this->data]);
    }

    public function ticket_send(request $request)
    {
        $request->validate([
            'id_order' => 'required|numeric',
            'level' => 'required|numeric',
            'title' => 'required',
            'content' => 'required',
        ], [
            'id_order.required' => 'Vui lòng nhập mã đơn hàng!',
            'id_order.numeric' => 'Mã đơn hàng không hợp lệ !',
            'title.required' => 'Vui lòng nhập tiêu đề!',
            'content.required' => 'Vui lòng nhập nội dung yêu cầu!',
        ]);

        $id = Ticket::create([
            'id_order' => $request->id_order,
            'title' => $request->title,
            'content' => $request->content,
            'level' => $request->level,
            'username' => Auth::user()->username,
            'status' => 0
        ]);

        if ($id) {
            return back()->with('success', 'Gửi Ticket thành công !');
        } else {
            return back()->withErrors('Gửi ticket thất bại !');
        }
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
        $this->data['logo'] = Settings::where('key', 'logo')->get();
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

    public function change_token(request $request)
    {
        $request->validate(
            ['token' => 'required'],
            ['token.required'  => 'Vui lòng nhập nhập mã token !']
        );
        $token = Auth::user()->token;
        $User = User::where('token', $token)->first();
        if ($User) {
            $User->update(['token' => Str::random(60)]);
            return back()->with('success', 'Thay đổi Token thành công !');
        }
        return back()->withErrors('Thông tin Token không chính xác !');
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ], [
            'old_password.required' => 'Vui lòng nhập mật khẩu cũ!',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới!',
            'new_password.confirmed' => 'Xác nhận mật khẩu không khớp!',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự!',
        ]);

        $currentUser = Auth::user();

        if (!Hash::check($request->old_password, $currentUser->password)) {
            return back()->withErrors('Mật khẩu cũ không chính xác!');
        }
        $User = User::where('password', $currentUser->password)->first();
        if ($User) {
            $User->update([
                'password' => Hash::make($request->new_password)
            ]);
        }
        return back()->with('success', 'Thay đổi mật khẩu thành công!');
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
            ['password' => 'required|min:6|confirmed', 'token' => 'required'],
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

    public function backup_balance(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'username.required' => 'Vui lòng nhập tên đăng nhập!',
            'email.required' => 'Vui lòng nhập địa chỉ Email!',
            'email.email' => 'Địa chỉ Email không hợp lệ!',
            'password.required' => 'Vui lòng nhập mật khẩu!'
        ]);

        $result = Anhyeuem37::curl('https://app.tuongtacsale.com/client/backup_balance.php', [
            'username' => $request->username,
            'email' => $request->email,
            'password' => md5(md5($request->password))
        ]);

        $response = json_decode($result, true);

        if ($response && is_array($response) && $response['status'] == 'success') {
            if (isset($response['data'])) {
                $id = Auth::user()->id;
                $user = User::where('id', $id)->first();
                if ($user) {
                    $user->update(['balance' => $user->balance + $response['balance'], 'level' => $response['level']]);
                    return back()->with('success', 'Khôi phục thành công!');
                }
            }
        }

        return redirect()->back()->withErrors(['error' => $response['message'] ?? 'Có lỗi xảy ra.']);
    }

    public function mbbank()
    {
        $banking = Banking::where('type', 'mbbank')->where('status', 1)->first();
        $result = Anhyeuem37::get('https://api.web2m.com/historyapimbv3/' . $banking->password . '/' . $banking->account_number . '/' . $banking->token . '');
        if (!empty($result)) {
            $array_result = json_decode($result, true);
            if ($array_result['status'] == 'true') {
                foreach ($array_result['transactions'] as $history_bank) {
                    $transactionid =    $history_bank['transactionID'];
                    $amount =  $history_bank['amount'];
                    $description = $history_bank['description'];
                    if ($history_bank['type'] == "IN") {
                        $settings = Settings::where('key', 'syntax')->get();
                        $username = Anhyeuem37::get_username_bank($settings->syntax, $description);
                        if (!Transaction::where('transactionid', $transactionid)) {
                            $user = User::where('username', $username);
                            if ($user) {
                                if ($amount > 10000) {
                                    $settings = Settings::where('key', 'promotion')->get();
                                    if ($settings->promotion > 0) {
                                        $amount = $amount + $amount * $settings->promotion / 100;
                                        $user->update([
                                            'balance' => $user->balance + $amount
                                        ]);
                                    } else {
                                        $user->update([
                                            'balance' => $user->balance + $amount
                                        ]);
                                    }
                                    Transaction::create([
                                        'username' => $username,
                                        'amount' => $amount,
                                        'description' => $description,
                                        'transactionid' => $transactionid
                                    ]);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
