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
use App\Models\Log;
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
        $this->data  = ['title' => 'Services' . ' ' . $category . ' ' . $service];
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
                            $serverIds = array_column($servers, 'id');
                            $this->data['order'] = Orders::whereIn('server', $serverIds)
                                ->orderBy('id', 'desc')
                                ->paginate(3);
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
        function format_number($number)
        {
            return str_replace(',', '.', number_format($number));
        }
        $requestData = $request->toArray();
        $orders = Orders::where('link', $requestData['link'])
            ->whereIn('status', ['inprogress', 'pending'])
            ->count();
        if ($orders == 0) {
            $user = User::where('email', Auth::user()->email)->first();
            $total = 0;
            if ($user) {
                $server = Server::where('id', $requestData['server'])->first();
                if ($server) {
                    $total = $server->price * $requestData['quantity'];
                    $user->update(['balance' => $user->balance - $total]);
                }
            }
            $new = Orders::create([
                'id_order' => Str::random(10),
                'link' => $requestData['link'],
                'server' => $requestData['server'],
                'quantity' => $requestData['quantity'],
                'total' => $total,
                'username' => $user->username
            ]);
            Log::create([
                'type' => '-',
                'begin_balance' => format_number($user->balance + $total),
                'quantity_balance' => format_number($total),
                'change_balance' => format_number($user->balance + $total - $total),
                'note' => 'Đơn hàng #' . $new->id_order . ' Tăng ' . $requestData['quantity'] . ' máy chủ ' . $requestData['server'] . ' trừ số tiền ' . format_number($total) . ' trong tài khoản',
                'username' => Auth::user()->username
            ]);
            return redirect()->back()->with('success', 'Đặt đơn thành công!');
        } else {
            return redirect()->back()->withErrors('Link này có đơn đang hoạt động, hãy đợi hoàn thành và thử lại!');
        }
    }
}
