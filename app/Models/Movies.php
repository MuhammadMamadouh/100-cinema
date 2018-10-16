<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Movies extends Model
{
    protected $table = 'Movies';
    protected $fillable = [
        'title',
        'playtime',
        'country',
        'rate',
        'language',
        'year',
        'story',
        'trailer',
        'poster',
    ];

    public function actors($limit=null)
    {
        $movie = $this->getKey();
        return DB::table('cast_of_movies')
            ->join('job', 'cast_of_movies.job_id', '=', 'job.id')
            ->join('cast', 'cast_of_movies.cast_id', '=', 'cast.id')
            ->select('cast.id', 'cast.name', 'cast.image', 'job.name as job_name')
            ->where('cast_of_movies.movies_id', '=', $movie)
            ->where('cast_of_movies.job_id', '=', 1)
            ->limit($limit)
            ->get();
    }

    /**
     * get Directors of a specified movie
     *
     * @return \Illuminate\Support\Collection
     */
    public function directors()
    {
        $movie = $this->getKey();
        return DB::table('cast_of_movies')
            ->join('job', 'cast_of_movies.job_id', '=', 'job.id')
            ->join('cast', 'cast_of_movies.cast_id', '=', 'cast.id')
            ->select('cast.id as cast_id', 'cast.name', 'cast.image', 'job.name as job_name')
            ->where('cast_of_movies.movies_id', '=', $movie)
            ->where('cast_of_movies.job_id', '=', 2)
            ->get();
    }

    /**
     * Define Categories of a specified movie
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'movies_category', 'movies_id', 'category_id');

//        return $this->hasMany('App\Models\Category');
    }

    /**
     * get Directors of a specified movie
     * @return \Illuminate\Support\Collection
     */
    public function reviews()
    {
        $movie = $this->getKey();
        return DB::table('movies_reviews')
            ->join('users', 'movies_reviews.users_id', '=', 'users.id')
            ->select('movies_reviews.*', 'users.id AS user_id', 'users.image as user_image', 'users.name as user_name')
            ->where('movies_reviews.movies_id', '=', $movie)
            ->orderBy('created_at', 'desc')->get();
    }

    /**
     * get Directors of a specified movie
     * @return \Illuminate\Support\Collection
     */
    public function averageRate()
    {
        $movie = $this->getKey();
        return DB::table('movies_reviews')
            ->where('movies_id', '=', $movie)
            ->average('rate');
    }

}
