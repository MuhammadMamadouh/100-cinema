<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class Ads extends Model
{
    protected $table = 'ads';
    protected $fillable = [
        'name',
        'link',
        'image',
        'start_at',
        'end_at',
        'page',
        'status',
    ];
}
