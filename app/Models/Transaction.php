<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'username',
        'type',
        'amount',
        'description',
        'transactionid',
        'created_at',
        'updated_at',
        'status',
    ];

    protected $attributes = [
        'username' => '',
        'type' => '',
        'amount' => 0,
        'description' => '',
        'transactionid' => '',
        'created_at' => '',
        'updated_at' => '',
        'status' => 1,
    ];
}
