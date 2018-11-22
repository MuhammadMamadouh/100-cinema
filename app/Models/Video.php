<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = [
        'name',
        'link',
        'api_id',
        'type'
    ];
}
