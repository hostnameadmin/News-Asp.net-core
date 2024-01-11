<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Server;
use App\Models\Services;
use App\Models\Subcategory;
use App\Models\Category;

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
                            $data[] = [
                                'service' => $server['id'],
                                'name' => $services['name'],
                                'type' => 'Default',
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
        }
    }
}
