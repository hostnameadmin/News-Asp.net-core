<?php

namespace App\Http\Controllers;

use App\Helpers\Smm;
use App\Models\Partner;
use Illuminate\Http\Request;

class Services extends Controller
{
    public function test()
    {
        $Partner = Partner::where('status', 1)->get();
        foreach ($Partner as $value) {

            Smm::init([
                'link' => $value['link'],
                'token' => $value['token'],
            ]);
            $response = Smm::connect(['action' => 'services']);
            echo '-------------------------';
            echo '<pre>';
            print_r($response);
            echo '</pre>';
        }
    }
}
