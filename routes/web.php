<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Service;
use App\Http\Controllers\Smm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
Code : DVMXH SMM Panel
Version : 1.0
Developer by : anhyeuem37 (https://www.facebook.com/anhyeuem3737)
Sdt : 0922235437
Vui lòng không tự ý sửa code, nếu gặp vấn đề sẽ không được hỗ trợ
*/

Route::get('/', function () {
    return view('welcome');
});

$folder = 'client'; ## Tài khoản
Route::prefix($folder)->middleware('Login')->group(function () {

    /* Chưa đăng nhập */

    ## View
    Route::get('register', [Client::class, 'register'])->name('register');
    Route::get('login', [Client::class, 'login'])->name('login');
    Route::get('reset_password/{token?}', [Client::class, 'reset_password'])->name('reset_password');
    ## Chức năng
    Route::post('register_send', [Client::class, 'register_send'])->name('register_send');
    Route::post('login_send', [Client::class, 'login_send'])->name('login_send');
    Route::post('send_token', [Client::class, 'send_token'])->name('send_token');
    Route::post('new_password', [Client::class, 'new_password'])->name('new_password');
    ## Rào
    Route::get('register_send', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('login_send', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('send_token', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('new_password', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('change_token', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('ticket_send', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('option', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('note', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('price', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('backup_balance', function () {
        abort(403, 'Truy cập trái phép');
    });
});

Route::get($folder . '/logout', [Client::class, 'logout'])->name('logout');

/* Đã đăng nhập */

Route::prefix($folder)->middleware('Index')->group(function () {
    Route::get('/{index?}', [Client::class, 'index'])
        ->where('index', '(index)?')
        ->name('home');
    Route::get('service/{category}/{service}', [Service::class, 'service'])->name('service');
    Route::post('service/order', [Service::class, 'order'])->name('order');
    Route::get('history', [Client::class, 'history'])->name('history');
    Route::get('info', [Client::class, 'info'])->name('info');
    Route::get('api', [Client::class, 'api'])->name('api');
    Route::get('banking', [Client::class, 'banking'])->name('banking');
    Route::get('ticket', [Client::class, 'ticket'])->name('ticket');
    Route::get('backup', [Client::class, 'backup'])->name('backup');
    Route::post('change_token', [Client::class, 'change_token'])->name('change_token');
    Route::post('change_password', [Client::class, 'change_password'])->name('change_password');
    Route::post('ticket_send', [Client::class, 'ticket_send'])->name('ticket_send');
    Route::post('option', [Service::class, 'option'])->name('option');
    Route::post('note', [Service::class, 'note'])->name('note');
    Route::post('price', [Service::class, 'price'])->name('price');
    Route::post('backup_balance', [Client::class, 'backup_balance'])->name('backup_balance');
});

/* Đăng nhập và có quyền ADMIN */
$folder = 'admin';
Route::prefix($folder)->middleware('Admin')->group(function () {
    Route::get('/{index?}', [Admin::class, 'index'])
        ->where('index', '(index)?')
        ->name('admin_index');

    Route::get('smmpanel/{id?}', [Admin::class, 'smmpanel'])->name('admin_smmpanel');
    Route::get('server/{id?}', [Admin::class, 'server'])->name('admin_server');
    Route::get('category/{id?}', [Admin::class, 'category'])->name('admin_category');
    Route::get('subcategory/{id?}', [Admin::class, 'subcategory'])->name('admin_subcategory');
    Route::get('service/{id?}', [Admin::class, 'service'])->name('admin_service');
    Route::get('order', [Admin::class, 'order'])->name('admin_order');
    Route::get('ticket', [Admin::class, 'ticket'])->name('admin_ticket');
    Route::get('user/{id?}', [Admin::class, 'user'])->name('admin_user');
    Route::get('banking/{id?}', [Admin::class, 'banking'])->name('admin_banking');
    Route::get('transaction', [Admin::class, 'transaction'])->name('admin_transaction');
    Route::get('news/{id?}', [Admin::class, 'news'])->name('admin_news');
    Route::get('smmpanel_activity', [Admin::class, 'smmpanel_activity'])->name('admin_smmpanel_activity');
    Route::get('activity_log', [Admin::class, 'activity_log'])->name('admin_activity_log');
    Route::get('history_order', [Admin::class, 'history_order'])->name('admin_history_order');
    Route::get('smmpanel_percent', [Admin::class, 'smmpanel_percent'])->name('admin_smmpanel_percent');

    Route::post('admin_add_smmpanel', [Admin::class, 'admin_add_smmpanel'])->name('admin_add_smmpanel');
    Route::post('admin_add_news', [Admin::class, 'admin_add_news'])->name('admin_add_news');
    Route::post('admin_add_subcategory', [Admin::class, 'admin_add_subcategory'])->name('admin_add_subcategory');
    Route::post('admin_add_service', [Admin::class, 'admin_add_service'])->name('admin_add_service');
    Route::post('admin_get_services', [Admin::class, 'admin_get_services'])->name('admin_get_services');
    Route::post('admin_add_server', [Admin::class, 'admin_add_server'])->name('admin_add_server');
    Route::post('admin_add_category', [Admin::class, 'admin_add_category'])->name('admin_add_category');
    Route::post('admin_add_banking', [Admin::class, 'admin_add_banking'])->name('admin_add_banking');
    Route::post('admin_get_balance', [Admin::class, 'admin_get_balance'])->name('admin_get_balance');
    Route::post('admin_category_change_status', [Admin::class, 'admin_category_change_status'])->name('admin_category_change_status');
    Route::post('admin_order_change_status', [Admin::class, 'admin_order_change_status'])->name('admin_order_change_status');
    Route::post('admin_subcategory_change_status', [Admin::class, 'admin_subcategory_change_status'])->name('admin_subcategory_change_status');
    Route::post('admin_ticket_change_status', [Admin::class, 'admin_ticket_change_status'])->name('admin_ticket_change_status');
    Route::post('admin_banking_change_status', [Admin::class, 'admin_banking_change_status'])->name('admin_banking_change_status');
    Route::post('admin_user_change_status', [Admin::class, 'admin_user_change_status'])->name('admin_user_change_status');
    Route::post('admin_news_change_status', [Admin::class, 'admin_news_change_status'])->name('admin_news_change_status');
    Route::post('admin_service_change_status', [Admin::class, 'admin_service_change_status'])->name('admin_service_change_status');
    Route::post('admin_server_change_status', [Admin::class, 'admin_server_change_status'])->name('admin_server_change_status');
    Route::post('admin_smm_change_status', [Admin::class, 'admin_smm_change_status'])->name('admin_smm_change_status');
    Route::post('admin_delete_category', [Admin::class, 'admin_delete_category'])->name('admin_delete_category');
    Route::post('admin_update_category', [Admin::class, 'admin_update_category'])->name('admin_update_category');
    Route::post('admin_update_subcategory', [Admin::class, 'admin_update_subcategory'])->name('admin_update_subcategory');
    Route::post('admin_update_smmpanel', [Admin::class, 'admin_update_smmpanel'])->name('admin_update_smmpanel');
    Route::post('admin_update_service', [Admin::class, 'admin_update_service'])->name('admin_update_service');
    Route::post('admin_update_server', [Admin::class, 'admin_update_server'])->name('admin_update_server');
    Route::post('admin_update_user', [Admin::class, 'admin_update_user'])->name('admin_update_user');
    Route::post('admin_update_news', [Admin::class, 'admin_update_news'])->name('admin_update_news');
    Route::post('admin_update_banking', [Admin::class, 'admin_update_banking'])->name('admin_update_banking');
    Route::post('settings', [Admin::class, 'settings'])->name('settings');
    Route::post('admin_update_smmpanel_percent', [Admin::class, 'admin_update_smmpanel_percent'])->name('admin_update_smmpanel_percent');

    Route::get('admin_add_smmpanel', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_add_new', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_add_subcategory', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_add_service', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_add_server', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_add_category', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_add_banking', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_get_balance', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_category_change_status', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_ticket_change_status', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_banking_change_status', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_user_change_status', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_service_change_status', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_server_change_status', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_smm_change_status', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_delete_category', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_update_category', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_update_subcategory', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_update_smmpanel', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_update_service', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_update_server', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_update_user', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_update_news', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_update_banking', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('settings', function () {
        abort(403, 'Truy cập trái phép');
    });
    Route::get('admin_update_smmpanel_percent', function () {
        abort(403, 'Truy cập trái phép');
    });
});

/* Global - không cần đăng nhập */
Route::get('smm/order', [Smm::class, 'order'])->name('smm_order');
Route::get('smm/status', [Smm::class, 'status'])->name('smm_status');
Route::get('smm/activity_log', [Smm::class, 'activity_log'])->name('smm_activity_log');
Route::get('mbbank', [Client::class, 'mbbank'])->name('mbbank');
Route::get('acb', [Client::class, 'acb'])->name('acb');
Route::get('vcb', [Client::class, 'vcb'])->name('vcb');
