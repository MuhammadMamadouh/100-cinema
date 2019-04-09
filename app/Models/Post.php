<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';

    protected $fillable = ['id', 'user_id', 'slug', 'title', 'details', 'image'];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get Comments of the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * relationship 1-M between post and like
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany('App\Models\PostLike');
    }

    /**
     * Get Latest Three Most Liked Posts
     */
    public function getMostLikedPosts()
    {

    }
}
