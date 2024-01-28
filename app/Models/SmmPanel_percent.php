<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmmPanel_percent extends Model
{
    use HasFactory;
    protected $table = 'smmpanel_percent';
    public $timestamps = false;
    protected $fillable = [
        'key',
        'value',
    ];

    protected $attributes = [
        'key' => 0,
        'value' => 1,
    ];
}
