<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $table = 'services';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'id_subcategory',
        'status',
    ];

    protected $attributes = [
        'name' => '',
        'id_subcategory' => 0,
        'status' => 1,
    ];
}
