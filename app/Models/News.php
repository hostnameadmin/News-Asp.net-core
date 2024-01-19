<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'title',
        'content',
        'created_at',
        'updated_at',
        'status',
    ];

    protected $attributes = [
        'title' => '',
        'content' => '',
        'created_at' => '',
        'updated_at' => '',
        'status' => 1,
    ];
}
