<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banking extends Model
{
    use HasFactory;

    protected $table = 'banking';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'username',
        'password',
        'account_number',
        'account_name',
        'token',
        'type',
        'status',
    ];

    protected $attributes = [
        'username' => '',
        'password' => '',
        'account_number' => 0,
        'account_name' => '',
        'token' => '',
        'type' => '',
        'status' => 1,
    ];
}
