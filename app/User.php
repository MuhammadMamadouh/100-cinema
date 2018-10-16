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

    /**
     * SELECT movies_reviews.*, movies.title, movies.poster, movies.id as movie_id FROM `movies_reviews`
     * INNER JOIN movies ON movies_reviews.movies_id = movies.id
     * WHERE users_id=5
     *
     *  select `movies_reviews`.*, `movies`.`title`, `movies`.`poster` from `movies_reviews`
     * inner join `movies` on `movies_reviews`.`movies_id ` = `movies`.`id` where `movies_reviews`.`users_id` = 5
     * order by `created_at` desc
     * Get the reviews of movies that user watched and reviewed it.
     * @return mixed
     */
    public function reviews()
    {
        $user = $this->getKey();
        return DB::table('movies_reviews')
            ->join('movies', 'movies_reviews.movies_id', '=', 'movies.id')
            ->select('movies_reviews.*', 'movies.title', 'movies.poster')
            ->where('users_id', '=', $user)
            ->orderBy('created_at', 'desc')->get();
    }
}
