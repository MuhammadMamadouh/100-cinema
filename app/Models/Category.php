<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

    public function movies(){
        return $this->belongsToMany('App\Models\Movies', 'movies_category', 'category_id','movies_id');
    }
}
