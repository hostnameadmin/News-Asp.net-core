<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'ticket';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'id_order',
        'title',
        'content',
        'level',
        'username',
        'status',
    ];

    protected $attributes = [
        'id_order' => 0,
        'title' => 'Tiêu đề hỗ trợ',
        'content' => 'Nội dung cần hỗ trợ',
        'username' => 'Tài khoản',
        'status' => 0,
    ];
}
