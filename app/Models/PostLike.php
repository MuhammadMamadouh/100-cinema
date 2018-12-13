<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostLike extends Model
{
    public $timestamps = false;
    protected $table = 'post_likes';
    protected $fillable = ['post_id', 'user_id'];

    public function post()
    {
        return $this->belongsTo('App\Model\Post', 'post_id');
    }
}
