<?php

namespace App\Http\Controllers;

use App\Models\SmmPanel;
use App\Models\Server;
use App\Models\Services;
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
        $this->data['server'] = server::where('status', 1)->get();
        return view('admin.server', ['data' => $this->data]);
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

    public function admin_add_server(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'smmpanel' => 'required',
            'server_smm' => 'required',
            'price_smm' => 'required',
            'min' => 'required',
            'max' => 'required',
            'id_service' => 'required',
            'price' => 'required',
            'name' => 'required',
            'detail' => 'required',
        ], [
            'smmpanel.required' => 'Vui lòng nhập id SMM Panel !',
            'server_smm.required' => 'Vui lòng nhập id Server SMM Panel !',
            'price_smm.required' => 'Vui lòng nhập giá SMM Panel !',
            'min.required' => 'Vui lòng nhập số lượng tối thiểu !',
            'max.required' => 'Vui lòng nhập số lượng tối đa !',
            'id_service.required' => 'Vui lòng nhập id dịch vụ !',
            'price.required' => 'Vui lòng nhập giá tiền !',
            'name.required' => 'Vui lòng nhập tên server !',
            'detail.required' => 'Vui lòng nhập chi tiết server !',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'data' => $validator->errors()], 422);
        }

        $server = Server::create([
            'smmpanel' => $request->input('smmpanel'),
            'server_smm' => $request->input('server_smm'),
            'price_smm' => $request->input('price_smm'),
            'min' => $request->input('min'),
            'max' => $request->input('max'),
            'id_service' => $request->input('id_service'),
            'price' => $request->input('price'),
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
        ]);

        if ($server) {
            return response()->json(['status' => 'success', 'data' => 'Thêm Server mới thành công']);
        } else {
            return response()->json(['status' => 'error', 'data' => 'Thêm Server mới thất bại']);
        }
    }
}
