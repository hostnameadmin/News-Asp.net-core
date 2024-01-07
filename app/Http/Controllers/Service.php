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

    public function service(Request $request)
    {
        $this->data  = ['title' => 'Đăng nhập hệ thống'];
        return view('service', ['data' => $this->data]);
    }
}
