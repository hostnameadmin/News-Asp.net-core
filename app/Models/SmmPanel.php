<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/*
Code : DVMXH
Version : 1.0
Developer by : anhyeuem37 (https://www.facebook.com/anhyeuem3737)
Sdt : 0922235437
Vui lòng không tự ý sửa code, nếu gặp vấn đề sẽ không được hỗ trợ
*/

class SmmPanel extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'smmpanel';
    public $timestamps = false;

    protected $fillable = [
        'link',
        'token',
        'balance',
        'name',
        'status'
    ];

    protected $attributes = [
        'link' => '1', ## 1 là hoạt động, 0 là bị khóa
        'token' => '1', ## 1 là hoạt động, 0 là bị khóa
        'balance' => '1', ## 1 là hoạt động, 0 là bị khóa
        'name' => '1', ## 1 là hoạt động, 0 là bị khóa
        'status' => '1', ## 1 là hoạt động, 0 là bị khóa
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
