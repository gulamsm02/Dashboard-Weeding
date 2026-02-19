<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'user_id','title','slug','access_token','status','expired_at','data_json'
    ];

    protected $casts = [
        'expired_at' => 'datetime',
        'data_json' => 'array',
    ];
}
