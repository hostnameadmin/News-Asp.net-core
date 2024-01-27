<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity_log extends Model
{
    use HasFactory;
    protected $table = 'activity_log';
    public $timestamps = true;
    protected $fillable = [
        'content',
        'username',
        'ip_address',
    ];

    protected $attributes = [
        'content' => 0,
        'username' => 0,
        'ip_address' => 0,
    ];
}
