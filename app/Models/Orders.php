<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'Orders';
    public $timestamps = true;
    protected $fillable = [
        'id_order',
        'link',
        'server',
        'quantity',
        'total',
        'order_smm',
        'response_smm',
        'status',
    ];

    protected $attributes = [
        'reaction' => 0,
        'note' => 'ghi chú',
        'total' => 0,
        'order_smm' => 0,
        'response_smm' => 'Phản hồi',
        'start' => 0,
        'run' => 0,
        'username' => 'Tài khoản',
        'status' => 'pending', ## 1 là hoạt động, 0 là bị khóa
    ];
}
