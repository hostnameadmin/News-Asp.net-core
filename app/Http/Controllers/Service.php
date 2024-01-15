<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Helpers\Smm;
use App\Models\SmmPanel;
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
                            $this->data['order'] = Orders::whereIn('server', $serverIds)->where('username', Auth::user()->username)
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
        $requestData = $request->toArray();
        if (isset($requestData['comments'])) {
            $comments = explode("\n", $requestData['comments']);
            $requestData['quantity'] = count($comments);
        }
        $server = Server::where('id', $requestData['server'])->first()->toArray();
        if ($requestData['quantity'] < $server['min'] || $requestData['quantity'] > $server['max']) {
            return redirect()->back()->withErrors('Số lượng không hợp lệ!');
        }
        $orders = Orders::where('link', $requestData['link'])
            ->whereIn('status', ['inprogress', 'pending'])
            ->count();
        if ($orders == 0) {
            $user = User::where('email', Auth::user()->email)->first();
            $total = 0;
            $level = '';
            if ($user) {
                $server = Server::where('id', $requestData['server'])->first();
                if ($server) {
                    if ($user->level >= 1) {
                        $level = 'level' . $user->level;
                        $total = $server->$level * $requestData['quantity'];
                    } else {
                        $total = $server->price * $requestData['quantity'];
                    }
                    if ($total > $user->balance) {
                        return redirect()->back()->withErrors('Số dư không đủ!');
                    }
                    $user->update(['balance' => $user->balance - $total]);
                }
            }
            $data = [
                'id_order' => mt_rand(1000000000, 9999999999),
                'link' => $requestData['link'],
                'server' => $requestData['server'],
                'total' => $total,
                'username' => $user->username
            ];
            if (isset($requestData['comments'])) {
                $data['comments'] = $requestData['comments'];
            } else {
                if (isset($requestData['reaction'])) {
                    $data['reaction'] = $requestData['reaction'];
                } else {
                    $data['reaction'] = 'like';
                }
                $data['quantity'] = $requestData['quantity'];
            }
            $new = Orders::create($data);
            Log::create([
                'type' => '-',
                'begin_balance' => $user->balance + $total,
                'quantity_balance' => $total,
                'change_balance' => $user->balance + $total - $total,
                'note' => 'Đơn hàng #' . $new->id_order . ' Tăng ' . $requestData['quantity'] . ' máy chủ ' . $requestData['server'] . ' trừ số tiền ' . $total . ' trong tài khoản',
                'username' => $user->username
            ]);
            return redirect()->back()->with('success', 'Đặt đơn thành công!');
        } else {
            return redirect()->back()->withErrors('Link này có đơn đang hoạt động, hãy đợi hoàn thành và thử lại!');
        }
    }

    public function option(Request $request)
    {
        $request->validate(
            ['server' => 'required'],
            ['server.required'  => 'Server là bắt buộc!']
        );
        $server = Server::where('id', $request->input('server'))->first();
        if ($server) {
            if ($server->comment == 1) {
                $html = '<div class="form-group row mb-3">
                <label for="" class="form-label col-md-3">Bình luận <span class="badge rounded-pill bg-warning" id="total_comment"></span></label>
                <div class="col-md-9">
                    <textarea class="form-control mb-3" name="comments" rows="3" placeholder="Mỗi bình luận 1 dòng" onkeyup="bill();"></textarea>
                </div>
            </div>';
                return response()->json(['status' => 'success', 'data' => $html]);
            } else {
                return response()->json(['status' => 'error', 'data' => '']);
            }
        }
    }

    public function price(Request $request)
    {
        $request->validate(
            ['server' => 'required', 'quantity' => 'required|integer|min:1'],
            [
                'server.required' => 'Server là bắt buộc!',
                'quantity.required' => 'Số lượng là bắt buộc!',
                'quantity.integer' => 'Số lượng phải là một số nguyên.',
                'quantity.min' => 'Số lượng phải lớn hơn 0.'
            ]
        );
        $user = Auth::user();
        $level = '';
        $server = Server::where('id', $request->input('server'))->where('status', 1)->first();
        if (!$server) {
            return response()->json(['error' => 'Server không tồn tại hoặc không hoạt động'], 404);
        }
        if ($user->level >= 1) {
            $level = 'level' . $user->level;
            $total = $server->$level * $request->input('quantity');
        } else {
            $total = $server->price * $request->input('quantity');
        }
        return response()->json(['total' => $total]);
    }
}
