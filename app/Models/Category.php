<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'icon',
        'priority',
        'name',
        'id_subcategory',
        'status',
    ];

    protected $attributes = [
        'id' => '',
        'icon' => '',
        'priority' => '',
        'name' => '',
        'status' => '',
    ];

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class, 'id_category');
    }
}
