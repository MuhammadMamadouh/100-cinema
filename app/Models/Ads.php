<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'ads';
    protected $fillable = [
        'name', 'link', 'image',
        'start_at', 'end_at',
        'page', 'status',
    ];

    protected $dates = ['start_at', 'end_at',];
}
