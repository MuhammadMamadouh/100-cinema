<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    protected $table = 'movies_reviews';
    protected $fillable = [
        'users_id',
        'movies_id',
        'rate',
        'review',
    ];

}
