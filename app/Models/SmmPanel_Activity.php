<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmmPanel_Activity extends Model
{
    use HasFactory;
    protected $table = 'smmpanel_activity';
    public $timestamps = true;
    protected $fillable = [
        'smmpanel',
        'content',
    ];

    protected $attributes = [
        'smmpanel' => 0,
        'content' => 0,
    ];
}
