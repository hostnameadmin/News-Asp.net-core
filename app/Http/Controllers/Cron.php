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
use App\Http\Requests\Orders_Request;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Cron extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function order(Request $request)
    {
        $order = Orders::where('status', 'pending')->get();

        foreach ($order as $value) {
            $server = Server::where('id', $value['server'])->first();
            $partner = Partner::where('id', $server->id)->first();
            Smm::init([
                'link' => $partner->link,
                'token' => $partner->token,
            ]);
            $response = Smm::connect(
                [
                    'action' => 'add',
                    'service' => $server['server_partner'],
                    'link' => $value['link'],
                    'quantity' => $value['quantity'],
                    'reaction' => $value['reaction']
                ]
            );
            $result = json_decode($response, true);
            echo '<pre>';
            print_r($result);
            echo '</pre>';
        }
    }
}
