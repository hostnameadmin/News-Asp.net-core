<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = [
        'id_order',
        'link',
        'server',
        'quantity',
        'total',
        'order_smm',
        'response_smm',
        'username',
        'comments',
        'status',
    ];

    protected $attributes = [
        'id_order' => 0,
        'reaction' => 0,
        'note' => 'ghi chú',
        'total' => 0,
        'order_smm' => 0,
        'response_smm' => 'Phản hồi',
        'start' => 0,
        'run' => 0,
        'quantity' => 0,
        'username' => 'Tài khoản',
        'comments' => 0,
        'status' => 'pending', ## 1 là hoạt động, 0 là bị khóa
    ];
}
