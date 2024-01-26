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
        'name',
        'detail',
        'price',
        'price_smm',
        'server_smm',
        'level1',
        'level2',
        'level3',
        'level4',
        'level5',
        'smmpanel',
        'min',
        'max',
        'reaction',
        'comment',
        'dayvip',
        'id_service',
        'cancel',
        'speed',
        'note',
        'note_cancel',
        'status',
    ];

    protected $attributes = [
        'name' => 0,
        'detail' => 0,
        'price' => 0,
        'price_smm' => 0,
        'server_smm' => 0,
        'level1' => 0,
        'level2' => 0,
        'level4' => 0,
        'level4' => 0,
        'level5' => 0,
        'smmpanel' => 0,
        'min' => 0,
        'max' => 0,
        'reaction' => 0,
        'comment' => 0,
        'dayvip' => 0,
        'id_service' => 0,
        'cancel' => 0,
        'speed' => 0,
        'note' => 0,
        'note_cancel' => 0,
        'status' => 1,
    ];
}
