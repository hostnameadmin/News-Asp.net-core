<?php

namespace App\Http\Controllers;

use App\Models\SmmPanel;
use App\Models\Server;
use App\Models\Services;
use App\Models\Category;
use App\Models\Orders;
use App\Models\Settings;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Banking;
use App\Models\Transaction;
use App\Models\News;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
        $this->data['user'] = User::count();
        $this->data['balance'] = User::sum('balance');
        $this->data['new_user_today'] = User::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))
            ->count('id');
        $this->data['amount_today'] = Transaction::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))
            ->sum('amount');
        $this->data['spending_today'] = Orders::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))
            ->sum('total');
        $this->data['total_amount'] = Transaction::sum('amount');
        $this->data['total_order_amount'] = Orders::sum('total');
        $this->data['total_order'] = Orders::count();
        $this->data['total_order_process'] = Orders::where('status', 'success')->count();
        $this->data['total_order_pending'] = Orders::where('status', 'pending')->count();
        $this->data['total_order_partial_count'] = Orders::where('status', 'partial')->count();
        $this->data['total_order_error'] = Orders::where('status', 'error')->sum('total');
        $this->data['total_order_partial_amount'] = Orders::where('status', 'partial')->sum('total');
        $this->data['settings'] = Settings::get();
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
        $this->data['server'] = server::orderBy('id', 'desc')->get();
        return view('admin.server', ['data' => $this->data]);
    }

    public function category($id = null)
    {
        $this->data['title'] = 'Quản lý Danh mục';
        $this->data['subcategory'] = subcategory::get();
        $this->data['category'] = Category::with('subcategory')->orderBy('priority', 'asc')->paginate(3);
        if ($id) {
            $category = Category::with('subcategory')->where('id', $id)->first();
            if ($category) {
                $this->data['category'] = $category;
            } else {
                return redirect()->route('admin_category')->withErrors('Danh mục không hợp lệ !');
            }
        }
        return view('admin.category', ['data' => $this->data, 'id' => $id]);
    }

    public function admin_update_category(request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required|url',
            'id_subcategory' => 'required',
            'priority' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục !',
            'icon.required' => 'Vui lòng nhập link icon !',
            'icon.url' => 'Vui lòng nhập link icon hợp lệ !',
            'id_subcategory.required' => 'Vui lòng nhập ID danh mục phụ !',
            'priority.required' => 'Vui lòng nhập cấp đô ưu tiên !',
        ]);

        $category = Category::where('id', $request->id)->first();
        if ($category) {
            $category->update([
                'name' => $request->name,
                'icon' => $request->icon,
                'id_subcategory' => $request->id_subcategory,
                'priority' => $request->priority,
            ]);
        }
        return redirect()->route('admin_category')->with('success', 'Cập nhật thành công !');
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
        $this->data['order'] = Orders::orderBy('id', 'desc')->get();
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

    public function admin_add_news(request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề !',
            'content.required' => 'Vui lòng nhập nội dung !'
        ]);

        $news = News::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        if ($news) {
            return redirect()->back()->with('success', 'Thêm mới thành công!');
        } else {
            return redirect()->back()->withErrors('Thêm mới thất bại!');
        }
    }

    public function admin_add_subcategory(request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_category' => 'required|numeric'
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục con !',
            'id_category.numeric' => 'Vui lòng nhập danh mục chính hợp lệ !',
            'id_category.required' => 'Vui lòng nhập id danh mục chính !'
        ]);

        $subcategory = Subcategory::create([
            'name' => $request->name,
            'id_category' => $request->id_category
        ]);

        if ($subcategory) {
            return redirect()->back()->with('success', 'Thêm mới thành công!');
        } else {
            return redirect()->back()->withErrors('Thêm mới thất bại!');
        }
    }

    public function admin_add_service(request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_subcategory' => 'required|numeric'
        ], [
            'name.required' => 'Vui lòng nhập tên dịch vụ !',
            'id_subcategory.numeric' => 'Vui lòng nhập danh mục con hợp lệ !',
            'id_subcategory.required' => 'Vui lòng nhập id danh mục con !'
        ]);

        $Service = Services::create([
            'name' => $request->name,
            'id_subcategory' => $request->id_subcategory
        ]);

        if ($Service) {
            return redirect()->back()->with('success', 'Thêm mới thành công!');
        } else {
            return redirect()->back()->withErrors('Thêm mới thất bại!');
        }
    }

    public function admin_add_banking(request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'account_number' => 'required|numeric',
            'account_name' => 'required',
            'token' => 'required',
            'type' => 'required',
            'logo' => 'required'
        ], [
            'username.required' => 'Vui lòng nhập tên đăng nhập !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'account_number.required' => 'Vui lòng nhập số tài khoản !',
            'account_number.numeric' => 'Vui lòng nhập tên tài khoản hợp lệ !',
            'account_name.required' => 'Vui lòng nhập chủ tài khoản !',
            'token.required' => 'Vui lòng nhập mã token !',
            'type.required' => 'Vui lòng nhập loại ngân hàng !',
            'logo.required' => 'Vui lòng nhập link logo ngân hàng !',
            'logo.url' => 'Vui lòng nhập link logo ngân hàng hợp lệ !',
        ]);

        $Banking = Banking::create([
            'username' => $request->username,
            'password' => $request->password,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'token' => $request->token,
            'type' => $request->type,
            'logo' => $request->logo,
            'status' => 1
        ]);

        if ($Banking) {
            return redirect()->back()->with('success', 'Thêm mới thành công!');
        } else {
            return redirect()->back()->withErrors('Thêm mới thất bại!');
        }
    }

    function admin_category_change_status(request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
        ], [
            'id.required' => 'Vui lòng nhập id cần cập nhật !',
            'id.numeric' => 'Vui lòng nhập id hợp lệ !',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
        }
        $category = Category::where('id', $request->id)->first();
        if ($category) {
            if ($category->status == 1) {
                $category->update([
                    'status' => 0
                ]);
            } else {
                $category->update([
                    'status' => 1
                ]);
            }
        }
        return response()->json(['status' => 'success', 'message' => 'Cập nhật trạng thái thành công']);
    }

    function admin_delete_category(request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
        ], [
            'id.required' => 'Vui lòng nhập id cần cập nhật !',
            'id.numeric' => 'Vui lòng nhập id hợp lệ !',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
        }
        $category = Category::where('id', $request->id)->first();
        if ($category) {
            $category->delete();
        }
        return response()->json(['status' => 'success', 'message' => 'Xóa danh mục thành công !']);
    }

    public function settings(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'keyword' => 'required',
            'logo' => 'required',
            'hotline' => 'required',
            'admin' => 'required',
            'facebook' => 'required',
            'support' => 'required',
            'level1' => 'required',
            'level2' => 'required',
            'level3' => 'required',
            'level4' => 'required',
            'level5' => 'required',
        ], [
            'title.required' => 'Vui lòng nhập tên tiêu đề !',
            'description.required' => 'Vui lòng nhập mô tả !',
            'keyword.required' => 'Vui lòng nhập từ khóa tìm kiếm !',
            'logo.required' => 'Vui lòng nhập link logo !',
            'hotline.required' => 'Vui lòng nhập số hotline !',
            'admin.required' => 'Vui lòng nhập tên ADMIN !',
            'facebook.required' => 'Vui lòng nhập link facebook !',
            'support.required' => 'Vui lòng nhập link support !',
            'level1.required' => 'Vui lòng nhập số tiền cấp đô 1 !',
            'level2.required' => 'Vui lòng nhập số tiền cấp đô 2 !',
            'level3.required' => 'Vui lòng nhập số tiền cấp đô 3 !',
            'level4.required' => 'Vui lòng nhập số tiền cấp đô 4 !',
            'level5.required' => 'Vui lòng nhập số tiền cấp đô 5 !',
        ]);

        $settingsKeys = [
            'title', 'description', 'keyword', 'logo', 'hotline', 'admin',
            'facebook', 'support', 'level1', 'level2', 'level3', 'level4', 'level5'
        ];

        foreach ($settingsKeys as $key) {
            Settings::where('key', $key)->update(['value' => $request[$key]]);
        }

        return redirect()->back()->with('success', 'Cập nhật thành công !');
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
            return redirect()->back()->with('success', 'Thêm mới thành công!');
        } else {
            return redirect()->back()->withErrors('Thêm mới thất bại!');
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
            return redirect()->back()->with('success', 'Thêm mới thành công!');
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
            return redirect()->back()->with('success', 'Thêm mới thành công!');
        } else {
            return redirect()->back()->withErrors('Thêm mới thất bại!');
        }
    }
}
