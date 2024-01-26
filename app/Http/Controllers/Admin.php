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
use App\Models\Ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Smm as Smm_Global;
use App\Models\SmmPanel_Activity;
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

    public function smmpanel($id = null)
    {
        $this->data['title'] = 'Quản lý SMM Panel';
        $this->data['smmpanel'] = SmmPanel::orderBy('status', 'desc')->paginate(3);
        if ($id) {
            $category = SmmPanel::where('id', $id)->first();
            if ($category) {
                $this->data['smmpanel'] = $category;
            } else {
                return redirect()->route('admin_smmpanel')->withErrors('SMM Panel không hợp lệ !');
            }
        }
        return view('admin.smmpanel', ['data' => $this->data, 'id' => $id]);
    }

    public function smmpanel_activity()
    {
        $this->data['title'] = 'Nhật ký SMM Panel';
        $this->data['smmpanel_activity'] = SmmPanel_Activity::orderBy('status', 'desc')->paginate(3);
        return view('admin.smmpanel_activity', ['data' => $this->data]);
    }

    public function admin_update_smmpanel(request $request)
    {
        $request->validate([
            'link' => 'required|url',
            'token' => 'required',
            'name' => 'required',
        ], [
            'link.required' => 'Vui lòng nhập Link SMM Panel !',
            'link.url' => 'Vui lòng nhập Link SMM Panel hợp lệ !',
            'token.required' => 'Vui lòng nhập mã token !',
            'name.required' => 'Vui lòng nhập Tên SMM Panel !',
        ]);

        $SmmPanel = SmmPanel::where('id', $request->id)->first();
        if ($SmmPanel) {
            $SmmPanel->update([
                'link' => $request->link,
                'token' => $request->token,
                'name' => $request->name
            ]);
        }
        return redirect()->route('admin_smmpanel')->with('success', 'Cập nhật thành công !');
    }

    public function server($id = null)
    {
        $this->data['title'] = 'Quản lý Server';
        $this->data['services'] = Services::where('status', 1)->get();
        $this->data['smmpanel'] = SmmPanel::where('status', 1)->get();
        $this->data['server'] = server::orderBy('id', 'desc')->paginate(3);
        if ($id) {
            $server = Server::where('id', $id)->first();
            if ($server) {
                $this->data['services'] = Services::where('status', 1)->get();
                $this->data['smmpanel'] = SmmPanel::where('status', 1)->get();
                $this->data['server'] = $server;
            } else {
                return redirect()->route('admin_server')->withErrors('Server không hợp lệ !');
            }
        }
        return view('admin.server', ['data' => $this->data, 'id' => $id]);
    }

    public function admin_update_server(Request $request)
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

        $server = Server::where('id', $request->id)->first();
        if ($server) {
            $server->update([
                'name' => $request->name,
                'detail' => $request->detail,
                'price' => $request->price,
                'price_smm' => $request->price_smm,
                'server_smm' => $request->server_smm,
                'level1' => $request->level1,
                'level2' => $request->level2,
                'level3' => $request->level3,
                'level4' => $request->level4,
                'level5' => $request->level5,
                'dayvip' => $request->dayvip,
                'comment' => $request->comment,
                'reaction' => $request->reaction,
                'cancel' => $request->cancel,
                'speed' => $request->speed,
                'note' => $request->note,
                'note_cancel' => $request->note_cancel,
                'min' => $request->min,
                'max' => $request->max,
                'id_service' => $request->id_service,
            ]);
            return redirect()->route('admin_server')->with('success', 'Cập nhật thành công!');
        } else {
            return redirect()->route('admin_server')->withErrors('Cập nhật thất bại!');
        }
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

    public function subcategory($id = null)
    {
        $this->data['title'] = 'Quản lý Danh mục phụ';
        $this->data['subcategory'] = subcategory::paginate(3);
        $this->data['category'] = Category::get();
        if ($id) {
            $subcategory = Subcategory::with('category')->where('id', $id)->first();
            if ($subcategory) {
                $this->data['subcategory'] = $subcategory;
            } else {
                return redirect()->route('admin_subcategory')->withErrors('Danh mục con không hợp lệ !');
            }
        }
        return view('admin.subcategory', ['data' => $this->data, 'id' => $id]);
    }

    public function admin_update_subcategory(request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_category' => 'required|numeric',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục con !',
            'id_category.required' => 'Vui lòng nhập id danh mục !',
            'id_category.numeric' => 'Vui lòng nhập id danh mục hợp lệ !',
        ]);

        $subcategory = Subcategory::where('id', $request->id)->first();
        if ($subcategory) {
            $subcategory->update([
                'name' => $request->name,
                'id_category' => $request->id_category,
            ]);
        }
        return redirect()->route('admin_subcategory')->with('success', 'Cập nhật thành công !');
    }

    public function service($id = null)
    {
        $this->data['title'] = 'Quản lý Dịch vụ';
        $this->data['services'] = Services::paginate(3);
        $this->data['subcategory'] = subcategory::where('status', 1)->get();
        if ($id) {
            $Services = Services::where('id', $id)->first();
            if ($Services) {
                $this->data['subcategory'] = subcategory::where('status', 1)->get()->paginate(3);
                $this->data['service'] = $Services;
            } else {
                return redirect()->route('admin_service')->withErrors('Dịch vụ không hợp lệ !');
            }
        }
        return view('admin.service', ['data' => $this->data, 'id' => $id]);
    }

    public function admin_update_service(request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_subcategory' => 'required|numeric',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục con !',
            'id_subcategory.required' => 'Vui lòng nhập id danh mục con !',
            'id_subcategory.numeric' => 'Vui lòng nhập id danh mục con hợp lệ !',
        ]);

        $Services = Services::where('id', $request->id)->first();
        if ($Services) {
            $Services->update([
                'name' => $request->name,
                'id_subcategory' => $request->id_subcategory,
            ]);
        }
        return redirect()->route('admin_service')->with('success', 'Cập nhật thành công !');
    }

    public function order()
    {
        $this->data['title'] = 'Quản lý Đơn hàng';
        $this->data['order'] = Orders::orderBy('id', 'desc')->paginate(3);
        return view('admin.order', ['data' => $this->data]);
    }

    public function user($id = null)
    {
        $this->data['title'] = 'Quản lý Khách hàng';
        $this->data['user'] = User::paginate(8);
        if ($id) {
            $user = User::where('id', $id)->first();
            if ($user) {
                $this->data['user'] = $user;
            } else {
                return redirect()->route('admin_user')->withErrors('Tài khoản không hợp lệ !');
            }
        }

        return view('admin.user', ['data' => $this->data, 'id' => $id]);
    }

    public function admin_update_user(request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'token' => 'required',
            'level' => 'required',
            'status' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên tài khoản !',
            'username.required' => 'Vui lòng nhập tên đăng nhập !',
            'email.required' => 'Vui lòng nhập địa chỉ email !',
            'email.email' => 'Vui lòng nhập địa chỉ email hợp lệ !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'level.required' => 'Vui lòng nhập cấp độ !',
            'token.required' => 'Vui lòng nhập mã token !',
        ]);

        $user = User::where('id', $request->id)->first();
        if ($user) {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'balance' => $request->balance,
                'password' => Hash::make($request->password),
                'token' => $request->name,
                'level' => $request->level,
                'status' => $request->status,
            ]);
        }
        return redirect()->route('admin_user')->with('success', 'Cập nhật thành công !');
    }

    public function banking($id = null)
    {
        $this->data['title'] = 'Quản lý Tài khoản ngân hàng';
        $this->data['banking'] = Banking::paginate(3);
        if ($id) {
            $banking = Banking::where('id', $id)->first();
            if ($banking) {
                $this->data['banking'] = $banking;
            } else {
                return redirect()->route('admin_banking')->withErrors('ID ngân hàng không hợp lệ !');
            }
        }
        return view('admin.banking', ['data' => $this->data, 'id' => $id]);
    }

    public function ticket()
    {
        $this->data['title'] = 'Quản lý hỗ trợ - khiếu nại';
        $this->data['ticket'] = Ticket::paginate(3);
        return view('admin.ticket', ['data' => $this->data]);
    }

    public function transaction()
    {
        $this->data['title'] = 'Quản lý lịch sử nạp ngân hàng';
        $this->data['transaction'] = Transaction::paginate(3);
        return view('admin.transaction', ['data' => $this->data]);
    }

    public function admin_update_banking(request $request)
    {
        $request->validate([
            'type' => 'required',
            'username' => 'required',
            'password' => 'required',
            'account_number' => 'required|numeric',
            'account_name' => 'required',
            'token' => 'required',
            'logo' => 'required|url',
        ], [
            'type.required' => 'Vui lòng nhập ngân hàng !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'account_number.required' => 'Vui lòng nhập số tài khoản !',
            'account_number.numeric' => 'Vui lòng nhập số tài khoản hợp lệ !',
            'account_name.required' => 'Vui lòng nhập chủ tài khoản !',
            'token.required' => 'Vui lòng nhập mã token !',
            'logo.required' => 'Vui lòng nhập link logo !',
            'logo.url' => 'Vui lòng nhập link logo hợp lệ !',
        ]);

        $banking = Banking::where('id', $request->id)->first();
        if ($banking) {
            $banking->update([
                'type' => $request->type,
                'username' => $request->username,
                'password' => $request->password,
                'account_number' => $request->account_number,
                'account_name' => $request->account_name,
                'token' => $request->token,
                'logo' => $request->logo
            ]);
        }
        return redirect()->route('admin_banking')->with('success', 'Cập nhật thành công !');
    }

    public function news($id = null)
    {
        $this->data['title'] = 'Quản lý Thông báo';
        $this->data['news'] = News::paginate(3);
        if ($id) {
            $news = News::where('id', $id)->first();
            if ($news) {
                $this->data['news'] = $news;
            } else {
                return redirect()->route('admin_user')->withErrors('ID thông báo không hợp lệ !');
            }
        }
        return view('admin.news', ['data' => $this->data, 'id' => $id]);
    }

    public function admin_update_news(request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề !',
            'content.required' => 'Vui lòng nhập nội dung bài đăng !',
        ]);

        $news = News::where('id', $request->id)->first();
        if ($news) {
            $news->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }
        return redirect()->route('admin_news')->with('success', 'Cập nhật thành công !');
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

    function admin_ticket_change_status(request $request)
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
        $ticket = Ticket::where('id', $request->id)->first();
        if ($ticket) {
            if ($ticket->status == 1) {
                $ticket->update([
                    'status' => 0
                ]);
            } else {
                $ticket->update([
                    'status' => 1
                ]);
            }
        }
        return response()->json(['status' => 'success', 'message' => 'Cập nhật trạng thái thành công']);
    }

    function admin_banking_change_status(request $request)
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
        $banking = Banking::where('id', $request->id)->first();
        if ($banking) {
            if ($banking->status == 1) {
                $banking->update([
                    'status' => 0
                ]);
            } else {
                $banking->update([
                    'status' => 1
                ]);
            }
        }
        return response()->json(['status' => 'success', 'message' => 'Cập nhật trạng thái thành công']);
    }

    function admin_user_change_status(request $request)
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
        $user = User::where('id', $request->id)->first();
        if ($user) {
            if ($user->status == 1) {
                $user->update([
                    'status' => 0
                ]);
            } else {
                $user->update([
                    'status' => 1
                ]);
            }
        }
        return response()->json(['status' => 'success', 'message' => 'Cập nhật trạng thái thành công']);
    }

    function admin_news_change_status(request $request)
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
        $news = News::where('id', $request->id)->first();
        if ($news) {
            if ($news->status == 1) {
                $news->update([
                    'status' => 0
                ]);
            } else {
                $news->update([
                    'status' => 1
                ]);
            }
        }
        return response()->json(['status' => 'success', 'message' => 'Cập nhật trạng thái thành công']);
    }

    function admin_server_change_status(request $request)
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
        $server = Server::where('id', $request->id)->first();
        if ($server) {
            if ($server->status == 1) {
                $server->update([
                    'status' => 0
                ]);
            } else {
                $server->update([
                    'status' => 1
                ]);
            }
        }
        return response()->json(['status' => 'success', 'message' => 'Cập nhật trạng thái thành công']);
    }

    function admin_service_change_status(request $request)
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
        $Services = Services::where('id', $request->id)->first();
        if ($Services) {
            if ($Services->status == 1) {
                $Services->update([
                    'status' => 0
                ]);
            } else {
                $Services->update([
                    'status' => 1
                ]);
            }
        }
        return response()->json(['status' => 'success', 'message' => 'Cập nhật trạng thái thành công']);
    }

    function admin_subcategory_change_status(request $request)
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
        $Subcategory = Subcategory::where('id', $request->id)->first();
        if ($Subcategory) {
            if ($Subcategory->status == 1) {
                $Subcategory->update([
                    'status' => 0
                ]);
            } else {
                $Subcategory->update([
                    'status' => 1
                ]);
            }
        }
        return response()->json(['status' => 'success', 'message' => 'Cập nhật trạng thái thành công']);
    }

    function admin_smm_change_status(request $request)
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
        $category = SmmPanel::where('id', $request->id)->first();
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
            'facebook', 'support', 'level1', 'level2', 'level3', 'level4', 'level5', 'syntax', 'promotion'
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
            'id_subcategory' => 'required',
            'priority' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục !',
            'icon.required' => 'Vui lòng nhập link icon !',
            'icon.url' => 'Vui lòng nhập link icon hợp lệ !',
            'id_subcategory.required' => 'Vui lòng nhập ID danh mục phụ !',
            'priority.required' => 'Vui lòng nhập cấp đô ưu tiên !',
        ]);
        $category = Category::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'id_subcategory' => $request->id_subcategory,
            'priority' => $request->priority,
            'status' => 1
        ]);

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
