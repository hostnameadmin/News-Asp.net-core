<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
