<?php

namespace App\Http\Controllers;

use App\Helpers\Anhyeuem37;
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
use App\Models\Settings;
use App\Models\SmmPanel_percent;
use App\Models\SmmPanel_Activity;
use Illuminate\Support\Str;
use Carbon\Carbon;
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

    public function order()
    {
        $orders = Orders::where('status', 'pending')->get();

        if (!$orders->isEmpty()) {
            foreach ($orders as $order) {
                $server = Server::where('id', $order->server)->where('status', 1)->first();
                if ($server) {
                    $partner = SmmPanel::where('id', $server->smmpanel)->where('status', 1)->first();
                    if ($partner) {
                        Smm_Global::init([
                            'link' => $partner->link,
                            'token' => $partner->token,
                        ]);
                        $data = [
                            'action' => 'add',
                            'service' => $server->server_smm,
                            'link' => $order->link,
                        ];
                        if ($order->comments != 0) {
                            $data['comments'] = $order->comments;
                        } else {
                            $data['quantity'] = $order->quantity;
                            $data['reaction'] = $order->reaction;
                        }
                        $response = Smm_Global::connect($data);
                        $result = json_decode($response, true);

                        if (!empty($result) && isset($result['order'])) {
                            $order->update([
                                'order_smm' => $result['order'],
                                'status' => 'inprogress',
                                'note' => 'Đặt đơn thành công'
                            ]);
                            $status =  'Đặt đơn thành công';
                        } else {
                            $order->update([
                                'status' => 'error',
                                'note' => $result['error']
                            ]);
                            $status = $result['error'];
                        }
                    }
                }
            }
        } else {
            $status = 'Không có đơn nào cần gửi qua SMM Panel';
        }

        echo $status;
    }

    public function status()
    {
        $orders = Orders::whereNotIn('status', ['pending', 'success', 'refund', 'error', 'partial'])->get();
        $orderCount = $orders->count();
        if ($orderCount > 0) {
            $list = [];
            $list_server = [];
            $result = [];
            foreach ($orders as $order) {
                $list[] = $order->order_smm;
                $list_server[] = $order->server;
            }
            $list_order = implode(',', $list);
            foreach ($list_server as $serverId) {
                $serverRecord = Server::where('id', $serverId)->where('status', 1)->first();
                $partner = SmmPanel::where('id', $serverRecord->smmpanel)->where('status', 1)->first();
                if ($partner) {
                    Smm_Global::init([
                        'link' => $partner->link,
                        'token' => $partner->token,
                    ]);
                    $response = Smm_Global::connect([
                        'action' => 'status',
                        'orders' => $list_order
                    ]);
                    $result[] = json_decode($response, true);
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
                                        $orderToUpdate->update(['status' => 'processing', 'start' => $value['start_count'], 'run' => $orderToUpdate['quantity'] - $value['remains']]);
                                    } elseif ($value['status'] == 'Canceled') {
                                        $orderToUpdate->update(['status' => 'error', 'start' => $value['start_count'], 'run' => $orderToUpdate['quantity'] - $value['remains']]);
                                    }
                                }
                            }
                        }
                    }
                    $status = 'Lấy trạng thái đơn thành công';
                } else {
                    $status = 'Không có Smm Panel nào được kích hoạt';
                }
            }
        } else {
            $status = 'Không có đơn hàng nào cần gửi qua Smm Panel';
        }

        echo $status;
    }

    public function activity_log()
    {
        $SmmPanel_Data = SmmPanel::where('status', 1)->get();
        if ($SmmPanel_Data) {
            foreach ($SmmPanel_Data as $SmmPanel) {
                Smm_Global::init([
                    'link' => $SmmPanel->link,
                    'token' => $SmmPanel->token,
                ]);
                $response = Smm_Global::connect([
                    'action' => 'services',
                ]);
                $data = json_decode($response, true);
                if (is_array($data)) {
                    foreach ($data as $response) {
                        $servers = Server::where('smmpanel', $SmmPanel->id)->get();
                        if ($servers) {
                            foreach ($servers as $server) {
                                if ($response['service'] == $server->server_smm) {
                                    if ($response['rate'] != $server->price_smm) {
                                        $SmmPanel_Activity = SmmPanel_Activity::create(
                                            [
                                                'smmpanel' => $SmmPanel->id,
                                                'content' => 'SMM PANEL: ' .  $SmmPanel->id . ' Server hiện tại : ' . $server->id . '  Server gốc : ' . $server->server_smm . ' thay đổi giá từ ' . $server->price . ' thành ' . $response['rate']
                                            ]
                                        );
                                        $new_price = $server->price + $server->price * SmmPanel_percent::where('key', 'price')->first()['value'] / 100;
                                        $new_price_level1 = $server->level1 + $server->level1 * SmmPanel_percent::where('key', 'level1')->first()['value'] / 100;
                                        $new_price_level2 = $server->level2 + $server->level2 * SmmPanel_percent::where('key', 'level2')->first()['value'] / 100;
                                        $new_price_level3 = $server->level3 + $server->level3 * SmmPanel_percent::where('key', 'level3')->first()['value'] / 100;
                                        $new_price_level4 = $server->level4 + $server->level4 * SmmPanel_percent::where('key', 'level4')->first()['value'] / 100;
                                        $new_price_level5 = $server->level5 + $server->level5 * SmmPanel_percent::where('key', 'level5')->first()['value'] / 100;

                                        $server->update([
                                            'price' => $new_price,
                                            'level1' => $new_price_level1,
                                            'level2' => $new_price_level2,
                                            'level3' => $new_price_level3,
                                            'level4' => $new_price_level4,
                                            'level5' => $new_price_level5
                                        ]);
                                        if ($SmmPanel_Activity) {
                                            $Settings = Settings::where('key', 'telegram')->first();
                                            $currentTime = Carbon::now()->format('d-m-Y H:i:s');
                                            $message = "⚠️ Cập nhật Giá : " . $server->price . " => " . $response['rate'] . "\n" .
                                                "📅 Ngày: " . $currentTime . "\n" .
                                                "🧑‍💻 ID_Hiện Tại: " . $server->id . "\n" .
                                                "📊 ID_Gốc: " . $server->server_smm . "\n" .
                                                "👉 Tên Smm: " . $SmmPanel->id . '=>' . $SmmPanel->name;
                                            $apiUrl = "https://api.telegram.org/bot" . $Settings->value . "/sendMessage?chat_id=@smm_panel_global&text=" . urlencode($message);
                                            $result = Anhyeuem37::get($apiUrl);
                                            if ($result) {
                                                $result = json_decode($result, true);
                                                if ($result['ok'] == true) {
                                                    echo 'Thành công';
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
