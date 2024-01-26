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
        'id_subcategory',
        'status',
    ];

    protected $attributes = [
        'icon' => '',
        'priority' => '',
        'name' => '',
        'id_subcategory' => '',
        'status' => 1,
    ];

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class, 'id_category');
    }
}
