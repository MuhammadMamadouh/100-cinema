<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CastMedia extends Model
{
    public $timestamps = false;
    protected $table = 'cast_media';
    protected $fillable = [
        'path', 'cast_id'
    ];


}
