<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'icon',
        'priority',
        'name',
        'status',
    ];

    protected $attributes = [
        'icon' => '',
        'priority' => '',
        'name' => '',
        'status' => 1,
    ];
}
