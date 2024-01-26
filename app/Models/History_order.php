<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_order extends Model
{
    use HasFactory;
    protected $table = 'history_order';
    public $timestamps = true;
    protected $fillable = [
        'type',
        'begin_balance',
        'change_balance',
        'quantity_balance',
        'note',
        'username'
    ];

    protected $attributes = [
        'type' => '+',
        'begin_balance' => '100.000',
        'change_balance' => '100.000',
        'quantity_balance' => '100.000',
        'note' => 'Đơn hàng #56789',
        'username' => 'Tài khoản'

    ];
}
