<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Helpers\Smm;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Services;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Server;
use App\Models\Orders;
use App\Http\Requests\Orders_Request;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

/*
Code : DVMXH SMM Panel
Version : 1.0
Developer by : anhyeuem37 (https://www.facebook.com/anhyeuem3737)
Sdt : 0922235437
Vui lòng không tự ý sửa code, nếu gặp vấn đề sẽ không được hỗ trợ
*/

class Service extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function service(Request $request, $category, $service)
    {
        $this->data  = ['title' => 'Đăng nhập hệ thống'];
        if ($category && $service) {
            $serviceModel = [];
            $services = Services::get();
            foreach ($services as $value) {
                if (Str::slug($value['name']) == $service) {
                    $serviceModel = $value;
                    break;
                }
            }
            if ($serviceModel) {
                $subcategory = Subcategory::where('id', $serviceModel['id_subcategory'])->first()->toArray();
                if ($subcategory) {
                    $categoryModel = Category::where('id', $subcategory['id_category'])->first()->toArray();
                    if ($categoryModel && strtolower($categoryModel['name']) == $category) {
                        $servers = Server::where('id_service', $serviceModel['id'])->where('status', 1)->get()->toArray();
                        if ($servers) {
                            $this->data['server'] = $servers;
                        }
                    }
                }
            }
        }
        if (empty($servers)) {
            return redirect()->route('home');
        }
        return view('service', ['data' => $this->data]);
    }

    public function order(Orders_Request $request)
    {
        $requestData = $request->toArray();
        $user = User::where('email', Auth::user()->email)->first();
        $total = 0;
        if ($user) {
            $server = Server::where('id', $requestData['server'])->first();
            if ($server) {
                $total = $server->price * $requestData['quantity'];
                $user->update(['balance' => $user->balance - $total]);
            }
        }
        Orders::create([
            'id_order' => Str::random(10),
            'link' => $requestData['link'],
            'server' => $requestData['server'],
            'quantity' => $requestData['quantity'],
            'total' => $total,
            'username' => $user->username
        ]);

        return redirect()->back()->with('success', 'Đặt đơn thành công!');
    }
}
