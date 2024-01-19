<?php

namespace App\Http\Controllers;

use App\Models\SmmPanel;
use App\Models\Server;
use App\Models\Services;
use App\Models\Category;
use App\Models\Orders;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Banking;
use App\Models\Transaction;
use App\Models\News;
use Illuminate\Http\Request;
use App\Helpers\Smm as Smm_Global;
use Illuminate\Support\Facades\Validator;


class Admin extends Controller
{
    private $data;

    public function __construct(Request $request)
    {
        $this->data = [];
    }

    public function index()
    {
        $this->data['title'] = 'Quản trị hệ thống';
        return view('admin.index', ['data' => $this->data]);
    }

    public function smmpanel()
    {
        $this->data['title'] = 'Quản lý SMM Panel';
        $this->data['smmpanel'] = SmmPanel::orderBy('status', 'desc')->get();
        return view('admin.smmpanel', ['data' => $this->data]);
    }

    public function server()
    {
        $this->data['title'] = 'Quản lý Server';
        $this->data['services'] = Services::where('status', 1)->get();
        $this->data['smmpanel'] = SmmPanel::where('status', 1)->get();
        $this->data['server'] = server::get();
        return view('admin.server', ['data' => $this->data]);
    }

    public function category()
    {
        $this->data['title'] = 'Quản lý Danh mục';
        $this->data['category'] = Category::get();
        $this->data['subcategory'] = Subcategory::where('status', 1)->get();
        return view('admin.category', ['data' => $this->data]);
    }

    public function subcategory()
    {
        $this->data['title'] = 'Quản lý Danh mục phụ';
        $this->data['subcategory'] = subcategory::get();
        $this->data['category'] = Category::where('status', 1)->get();
        return view('admin.subcategory', ['data' => $this->data]);
    }

    public function service()
    {
        $this->data['title'] = 'Quản lý Dịch vụ';
        $this->data['services'] = Services::get();
        $this->data['subcategory'] = subcategory::where('status', 1)->get();
        return view('admin.service', ['data' => $this->data]);
    }

    public function order()
    {
        $this->data['title'] = 'Quản lý Đơn hàng';
        $this->data['order'] = Orders::get();
        return view('admin.order', ['data' => $this->data]);
    }

    public function user()
    {
        $this->data['title'] = 'Quản lý Khách hàng';
        $this->data['user'] = User::get();
        return view('admin.user', ['data' => $this->data]);
    }

    public function banking()
    {
        $this->data['title'] = 'Quản lý Tài khoản ngân hàng';
        $this->data['banking'] = Banking::get();
        return view('admin.banking', ['data' => $this->data]);
    }

    public function transaction()
    {
        $this->data['title'] = 'Quản lý lịch sử nạp ngân hàng';
        $this->data['transaction'] = Transaction::get();
        return view('admin.transaction', ['data' => $this->data]);
    }

    public function news()
    {
        $this->data['title'] = 'Quản lý Thông báo';
        $this->data['news'] = News::get();
        return view('admin.news', ['data' => $this->data]);
    }

    public function admin_add_category(request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required|url',
            'subcategory' => 'required',
            'priority' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục !',
            'icon.required' => 'Vui lòng nhập link icon !',
            'icon.url' => 'Vui lòng nhập link icon hợp lệ !',
            'subcategory.required' => 'Vui lòng nhập ID danh mục phụ !',
            'priority.required' => 'Vui lòng nhập cấp đô ưu tiên !',
        ]);

        $category = Category::create($request->all());

        if ($category) {
            return redirect()->back()->with('success', 'Thêm mới danh mục thành công!');
        } else {
            return redirect()->back()->withErrors('Thêm mới dạm mục thất bại!');
        }
    }

    public function admin_add_smmpanel(Request $request)
    {
        $request->validate([
            'link' => 'required|url|unique:smmpanel',
            'token' => 'required',
        ], [
            'link.required' => 'Vui lòng nhập Link đối tác !',
            'link.url' => 'Vui lòng nhập Link hợp lệ !',
            'link.unique' => 'Link đối tác đã tồn tại !',
            'token.required' => 'Vui lòng nhập Token !',
        ]);

        $SmmPanel = SmmPanel::create([
            'link' => $request->link,
            'token' => $request->token
        ]);

        if ($SmmPanel) {
            return redirect()->back()->with('success', 'Thêm mới API SMM Panel thành công!');
        }
    }

    public function admin_get_services(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
        ], [
            'id.required' => 'Vui lòng nhập id !',
            'id.integer' => 'Vui lòng nhập id hợp lệ !',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'data' => $validator->errors()], 422);
        }

        $SmmPanel = SmmPanel::where('id', $request->input('id'))->where('status', '1')->first();
        if ($SmmPanel) {
            Smm_Global::init([
                'link' => $SmmPanel->link,
                'token' => $SmmPanel->token,
            ]);
            $response = Smm_Global::connect([
                'action' => 'services',
            ]);
            $data = json_decode($response, true);
            if (!isset($data['error'])) {
                $filteredData = [];
                foreach ($data as $value) {
                    $serverExists = Server::where('server_smm', $value['service'])->where('smmpanel', $request->input('id'))->exists();
                    if (!$serverExists) {
                        $filteredData[] = $value;
                    }
                }
                return response()->json(['status' => 'success', 'data' => $filteredData]);
            } else {
                return response()->json(['status' => 'error', 'data' => $data['error']]);
            }
        } else {
            return response()->json(['status' => 'error', 'data' => 'ID Smm Panel chưa được kích hoạt']);
        }
    }

    public function admin_get_balance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
        ], [
            'id.required' => 'Vui lòng nhập id !',
            'id.integer' => 'Vui lòng nhập id hợp lệ !',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'data' => $validator->errors()], 422);
        }
        $SmmPanel = SmmPanel::where('id', $request->input('id'))->where('status', '1')->first();
        if ($SmmPanel) {
            Smm_Global::init([
                'link' => $SmmPanel->link,
                'token' => $SmmPanel->token,
            ]);
            $response = Smm_Global::connect([
                'action' => 'balance',
            ]);
            $data = json_decode($response, true);
            if (!is_array($data)) {
                return response()->json(['status' => 'error', 'data' => 'Dữ liệu trả về không hợp lệ'], 500);
            }
            if (!isset($data['error'])) {
                if (is_array($data) && isset($data['balance'])) {
                    $test = $SmmPanel->update(['balance' => $data['balance']]);
                }
                return response()->json(['status' => 'success', 'data' => $test]);
            } else {
                return response()->json(['status' => 'error', 'data' => $data['error']]);
            }
        } else {
            return response()->json(['status' => 'error', 'data' => 'ID Smm Panel chưa được kích hoạt']);
        }
    }

    public function admin_add_server(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'price_smm' => 'required',
            'server_smm' => 'required',
            'level1' => 'required',
            'level2' => 'required',
            'level3' => 'required',
            'level4' => 'required',
            'level5' => 'required',
            'smmpanel' => 'required',
            'min' => 'required',
            'max' => 'required',
            'id_service' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập id tên server !',
            'detail.required' => 'Vui lòng nhập id thông tin server !',
            'price.required' => 'Vui lòng nhập giá giá tiền !',
            'price_smm.required' => 'Vui lòng nhập giá gốc SMM !',
            'server_smm.required' => 'Vui lòng nhập server gốc SMM !',
            'level1.required' => 'Vui lòng nhập giá cấp 1 !',
            'level2.required' => 'Vui lòng nhập giá cấp 2 !',
            'level3.required' => 'Vui lòng nhập giá cấp 3 !',
            'level4.required' => 'Vui lòng nhập giá cấp 4 !',
            'level5.required' => 'Vui lòng nhập giá cấp 5 !',
            'smmpanel.required' => 'Vui lòng nhập id SMM !',
            'min.required' => 'Vui lòng nhập số lượng tối thiểu !',
            'max.required' => 'Vui lòng nhập số lượng tối đa !',
            'id_service.required' => 'Vui lòng nhập ID dịch vụ !',
        ]);

        $server = Server::create($request->all());

        if ($server) {
            return redirect()->back()->with('success', 'Thêm mới Server thành công!');
        } else {
            return redirect()->back()->withErrors('Thêm mới Server thất bại!');
        }
    }
}
