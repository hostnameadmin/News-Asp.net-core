<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;
    protected $table = 'server';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'smmpanel',
        'server_smm',
        'price_smm',
        'min',
        'max',
        'id_service',
        'price',
        'name',
        'detail',
    ];

    protected $attributes = [
        'smmpanel' => 0,
        'server_smm' => 0,
        'price_smm' => 0,
        'min' => 0,
        'max' => 0,
        'id_service' => 0,
        'name' => 0,
        'detail' => 0,
        'level1' => 0,
        'level2' => 0,
        'level3' => 0,
        'level4' => 0,
        'level5' => 0,
        'reaction' => 0,
        'comment' => 0,
        'dayvip' => 0,
        'status' => 1,
    ];
}
