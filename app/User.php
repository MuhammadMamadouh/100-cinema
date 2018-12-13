<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country', 'site', 'gender', 'short_bio', 'about', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_roles', 'user_id', 'role_id');
    }

    /**
     * Reviews on movies which user has written it
     */
    public function reviews()
    {
        $user = $this->getKey();
        return DB::table('movies_reviews')
            ->join('movies', 'movies_reviews.movies_id', '=', 'movies.id')
            ->select('movies_reviews.*', 'movies.title', 'movies.poster')
            ->where('users_id', '=', $user)
            ->orderBy('created_at', 'desc');
    }

    /**
     * Posts of specific user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * Get Follower of the user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany('App\User', 'friend_with', 'follower', 'followed');
    }

    /**
     * Insert a follower to the user
     *
     * @param int $followed
     * @return void
     */
    public function insertFollower(int $followed)
    {
        DB::table('friend_with')->insert([
            'follower' => auth()->user()->id,
            'followed' => $followed,
        ]);
    }

    /**
     * Delete a follower to the user
     *
     * @param int $followed
     * @return void
     */
    public function deleteFollower(int $followed)
    {
        DB::table('friend_with')->where([
            'follower' => auth()->user()->id,
            'followed' => $followed,
        ])->delete();
    }

    /**
     * Check if the auth user is following the other user
     * @param int $follower
     * @return bool
     */
    public function isFollowedBy(int $follower)
    {
        $followed = $this->getKey();
        $following = DB::table('friend_with')->where([
            'follower' => $follower,
            'followed' => $followed,
        ])->first();

        if ($following) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * Get posts of the users which auth user is following them
     * @return \Illuminate\Database\Query\Builder
     */
    public function followedPosts()
    {
        if (\Auth::check()) {
            return DB::table('posts')
                ->join('friend_with', 'friend_with.followed', 'posts.user_id')
                ->select('posts.*')
                ->where('friend_with.follower', '=', auth()->user()->id)->orderBy('created_at', 'desc');
        } else {
            return null;
        }
    }


}
