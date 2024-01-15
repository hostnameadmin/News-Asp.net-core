<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Helpers\Smm as Smm_Global;
use App\Models\SmmPanel;
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

class Smm extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function order(Request $request)
    {
        $order = Orders::where('status', 'pending')->get();
        if (!$order->isEmpty()) {
            foreach ($order as $value) {
                $server = Server::where('id', $value['server'])->where('status', 1)->first();
                if ($server) {
                    $partner = SmmPanel::where('id', $server->smmpanel)->where('status', 1)->first();
                    if ($partner) {
                        Smm_Global::init([
                            'link' => $partner->link,
                            'token' => $partner->token,
                        ]);
                        $data = [
                            'action' => 'add',
                            'service' => $server['server_smm'],
                            'link' => $value['link'],
                        ];
                        if ($value['comments'] != 0) {
                            $data['comments'] = $value['comments'];
                        } else {
                            $data['quantity'] = $value['quantity'];
                            $data['reaction'] = $value['reaction'];
                        }
                        $response = Smm_Global::connect($data);
                        $result = json_decode($response, true);
                        if (isset($result['order']) && !empty($result['order'])) {
                            $value->update([
                                'order_smm' => $result['order'],
                                'status' => 'inprogress',
                                'note' => 'Đặt đơn thành công'
                            ]);
                            $status  = ['status' => 'success', 'message' => 'Đặt đơn thành công'];
                        } else {
                            $value->update([
                                'status' => 'error',
                                'response_smm' => $result['error'],
                            ]);
                            $status  = ['status' => 'error', 'message' => $result['error']];
                        }
                    } else {
                        $status = ['status' => 'error', 'message' => 'Không có Smm Panel nào được kích hoạt'];
                    }
                } else {
                    $status = ['status' => 'error', 'message' => 'Không có Server Smm Panel đối tác nào được kích hoạt'];
                }
            }
        } else {
            $status = ['status' => 'error', 'message' => 'Không có đơn hàng nào phù hợp'];
        }
        echo '<pre>';
        print_r($status);
        echo '</pre>';
    }

    public function status(Request $request)
    {
        $orders = Orders::whereNotIn('status', ['pending', 'success', 'refund', 'error', 'partial'])->get();
        $orderCount = $orders->count();
        if ($orderCount > 0) {
            $list = [];
            foreach ($orders as $order) {
                $list[] = $order->order_smm;
            }
            $list_order = implode(',', $list);
            foreach ($orders as $order) {
                $server = Server::where('id', $order->server)->where('status', 1)->first();
                if ($server) {
                    $partner = SmmPanel::where('id', $server->smmpanel)->where('status', 1)->first();
                    if ($partner) {
                        Smm_Global::init([
                            'link' => $partner->link,
                            'token' => $partner->token,
                        ]);
                        $response = Smm_Global::connect([
                            'action' => 'status',
                            'orders' => $list_order
                        ]);
                        $result = json_decode($response, true);
                        if (is_array($result) && count($result) >= 1) {
                            foreach ($result as $key => $value) {
                                if ($key != 0) {
                                    $orderToUpdate = Orders::where('order_smm', $key)->first();
                                    if ($orderToUpdate) {
                                        if ($value['status'] == 'Partial') {
                                            $orderToUpdate->update(['status' => 'partial', 'start' => $value['start_count'], 'run' => $orderToUpdate['quantity'] - $value['remains']]);
                                        } elseif ($value['status'] == 'Completed') {
                                            $orderToUpdate->update(['status' => 'success', 'start' => $value['start_count'], 'run' => $orderToUpdate['quantity'] - $value['remains']]);
                                        } elseif ($value['status'] == 'In progress') {
                                            $orderToUpdate->update(['status' => 'inprogress', 'start' => $value['start_count'], 'run' => $orderToUpdate['quantity'] - $value['remains']]);
                                        } elseif ($value['status'] == 'Processing') {
                                            $orderToUpdate->update(['status' => 'inprogress', 'start' => $value['start_count'], 'run' => $orderToUpdate['quantity'] - $value['remains']]);
                                        } elseif ($value['status'] == 'Canceled') {
                                            $orderToUpdate->update(['status' => 'error', 'start' => $value['start_count'], 'run' => $orderToUpdate['quantity'] - $value['remains']]);
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        $result = ['status' => 'error', 'message' => 'Không có Smm Panel nào được kích hoạt'];
                    }
                } else {
                    $result = ['status' => 'error', 'message' => 'Không có Server của Smm Panel được kích hoạt'];
                }
            }
        } else {
            $result = ['status' => 'error', 'message' => 'Không có đơn hàng nào cần gửi qua Smm Panel'];
        }
        echo '<pre>';
        print_r($result);
        echo '</pre>';
    }
}
