<?php

namespace App\Http\Controllers;

use App\Helpers\Smm;
use Illuminate\Http\Request;

class Services extends Controller
{
    public function test()
    {
        Smm::init([
            'link' => 'https://ngocduypanel.com/api/v2',
            'token' => '0a14758cf18b87d4bc26e51bce40d431',
        ]);
        $response = Smm::connect(['action' => 'status', 'orders' => '123,456,789']);
        echo '<pre>';
        print_r($response);
        echo '</pre>';
    }
}
