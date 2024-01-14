<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;
use App\Models\Server;
use App\Models\Services;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Orders;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Api extends Controller
{
    public function v2(request $request)
    {
        if ($request->action == 'services') {
            $data = [];
            $servers = Server::where('status', 1)->get();
            foreach ($servers as $server) {
                $services = Services::where('id', $server['id_service'])->first();
                if ($services) {
                    $subcategory = Subcategory::where('id', $services['id_subcategory'])->first();
                    if ($subcategory) {
                        $category = Category::where('id', $subcategory['id_category'])->first();
                        if ($category) {
                            if ($services['comment'] == 0) {
                                $type = 'Default';
                            } else {
                                $type = 'Custom Comments';
                            }
                            $data[] = [
                                'service' => $server['id'],
                                'name' => $server['detail'],
                                'type' => $type,
                                'category' => $category['name'],
                                'rate' => $server['price'],
                                'min' => $server['min'],
                                'max' => $server['max'],
                            ];
                        }
                    }
                }
            }
            return response()->json($data, 200);
        } elseif ($request->action == 'add') {
            $validator = Validator::make($request->all(), [
                'link' => 'required|url',
                'service' => 'required|numeric',
                'quantity' => [
                    'nullable',
                    'numeric',
                    Rule::requiredIf(function () use ($request) {
                        return empty($request->comments);
                    }),
                ],
            ], [
                'link.required' => 'Invalid Link !',
                'link.url' => 'Invalid Link !',
                'service.required' => 'Invalid service !',
                'service.numeric' => 'Invalid service !',
                'quantity.numeric' => 'Invalid quantity !',
                'quantity.required' => 'Invalid quantity !',
            ]);

            if ($validator->fails()) {
                $firstErrorMessage = $validator->errors()->first();
                return response()->json([
                    'error' => $firstErrorMessage
                ], 422);
            }
            $requestData = $request->toArray();
            if (isset($requestData['comments'])) {
                $comments = explode("\n", $requestData['comments']);
                $requestData['quantity'] = count($comments);
            }
            $server = Server::where('id', $requestData['service'])->first()->toArray();
            if ($requestData['quantity'] < $server['min'] || $requestData['quantity'] > $server['max']) {
                return response()->json(['error' => 'Invalid quantity'], 401);
            }
            $orders = Orders::where('link', $requestData['link'])
                ->whereIn('status', ['inprogress', 'pending'])
                ->count();
            if ($orders == 0) {
                $user = User::where('token', $requestData['key'])->first();
                $total = 0;
                if ($user) {
                    $server = Server::where('id', $requestData['service'])->first();
                    if ($server) {
                        $level = $user->level >= 1 ? 'level' . $user->level : 'price';
                        $total = $server->$level * $requestData['quantity'];

                        if ($total > $user->balance) {
                            return response()->json(['error' => 'Balance not enough !'], 401);
                        }
                        $user->update(['balance' => $user->balance - $total]);
                    }
                }
                $data = [
                    'id_order' => mt_rand(1000000000, 9999999999),
                    'link' => $requestData['link'],
                    'server' => $requestData['service'],
                    'total' => $total,
                    'quantity' => $requestData['quantity'],
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
                }
                $newOrder = Orders::create($data);
                Log::create([
                    'type' => '-',
                    'begin_balance' => $user->balance + $total,
                    'quantity_balance' => $total,
                    'change_balance' => $user->balance - $total,
                    'note' => 'Đơn hàng #' . $newOrder->id_order . ' Tăng ' . $requestData['quantity'] . ' máy chủ ' . $requestData['service'] . ' trừ số tiền ' . $total . ' trong tài khoản',
                    'username' => $user->username
                ]);
                return response()->json(['order' => $newOrder->id_order], 200);
            } else {
                return response()->json(['error' => 'This link has an active application, please wait for it to complete and try again!'], 401);
            }
        } elseif ($request->action == 'status') {
            $validator = Validator::make($request->all(), [
                'orders' => 'required',
            ], [
                'orders.required' => 'Incorrect order ID !',
            ]);
            if ($validator->fails()) {
                $firstErrorMessage = $validator->errors()->first();
                return response()->json([
                    'error' => $firstErrorMessage
                ], 422);
            }
            $result = [];
            $orderIds = explode(',', $request->orders);
            foreach ($orderIds as $orderId) {
                $orders = Orders::where('id_order', $orderId)->get();
                if ($orders->isNotEmpty()) {
                    foreach ($orders as $order) {
                        switch ($order->status) {
                            case 'pending':
                                $order->status = 'Pending';
                                break;
                            case 'inprogress':
                                $order->status = 'In progress';
                                break;
                            case 'success':
                                $order->status = 'Completed';
                                break;
                            case 'error':
                                $order->status = 'Canceled';
                                break;
                        }
                        $result[$orderId] = [
                            'charge' => $order->total,
                            'start_count' => $order->start,
                            'status' => $order->status,
                            'remains' => $order->quantity - $order->run
                        ];
                    }
                } else {
                    $result[$orderId] = ['error' => 'Incorrect order ID'];
                }
            }
            $new_array = $result;
            return response()->json($new_array, 200);
        } elseif ($request->action == 'balance') {
            $result = User::where('token', $request->key)->first();
            if ($result) {
                return response()->json(['balance' => $result['balance'], 'currency' => 'VND'], 200);
            }
        } else {
            return response()->json(['error' => 'Incorrect request'], 200);
        }
    }
}
