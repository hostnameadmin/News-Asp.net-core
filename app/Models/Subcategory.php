<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $table = 'subcategory';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'id_category',
        'status',
    ];

    protected $attributes = [
        'name' => '',
        'id_category' => 0,
        'status' => 1,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
