<?php

namespace App\Http\Controllers;

use App\Models\SmmPanel;
use App\Models\Server;
use Illuminate\Http\Request;
use App\Helpers\Smm as Smm_Global;

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
        $request->validate([
            'id' => 'required|integer',
        ], [
            'id.required' => 'Vui lòng nhập id !',
            'id.integer' => 'Vui lòng nhập id hợp lệ !',
        ]);

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
            $filteredData = [];
            foreach ($data as $value) {
                $serverExists = Server::where('server_smm', $value['service'])->where('smmpanel', $request->input('id'))->exists();
                if (!$serverExists) {
                    $filteredData[] = $value;
                }
            }
            return response()->json(['status' => 'success', 'data' => $filteredData]);
        } else {
            return response()->json(['status' => 'error', 'data' => 'SMM Panel này chưa được kích hoạt']);
        }
    }
}
