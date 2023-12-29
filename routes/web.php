<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

$folder = 'client';
Route::prefix($folder)->group(function () {

    Route::get('/{index?}', [Client::class, 'index'])
        ->where('index', '(index)?')
        ->name('home');

    Route::match(['get', 'post'], 'register/', [Client::class, 'register'])->name('register');
});
