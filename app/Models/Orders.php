<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'Orders';
    public $timestamps = false;
    protected $fillable = [
        'id_order',
        'link',
        'server',
        'quantity',
        'total'
    ];

    protected $attributes = [
        'reaction' => 0,
        'note' => 'ghi chú',
        'total' => 0,
        'status' => 'pending', ## 1 là hoạt động, 0 là bị khóa
    ];
}
