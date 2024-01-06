<?php

namespace App\Http\Controllers;

use App\Helpers\Smm;
use App\Models\Partner;
use App\Models\Services;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Server;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Service extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }
    public function service(Request $request, $category, $service)
    {
        $category = Category::where('name', $category)->where('status', 1)->first()->toArray();
        $service = Services::where('slug', $service)->where('status', 1)->first()->toArray();
        if ($category && $service) {
            $subcategory = Subcategory::where('id_category', $category['id'])->first()->toArray();
            $check = Services::where('id_subcategory', $subcategory['id'])->first()->toArray();
            if ($check) {
                $server = Server::where('id_service', $service['id'])->get()->toArray();
                if ($server) {
                    $this->data['server'] = $server;
                    $this->data['service'] = $service;
                    $this->data['title'] = 'Dịch vụ ' . $category['name'] . ' ' . $service['name'];
                    return view('service', ['data' => $this->data]);
                }
            }

            return redirect()->route('login');
        }
        abort(403, 'Truy cập trái phép');
    }
}
