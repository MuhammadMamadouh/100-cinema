<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Movies extends Model
{
    protected $table = 'Movies';
    protected $fillable = [
        'title', 'playtime', 'country', 'rate',
        'language', 'year', 'story', 'trailer',
        'poster',
    ];

    /**
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    /**
     * Get Movies with specific attribute
     *
     * @param $attr
     * @param $value
     * @return mixed
     */
    public static function getMovieWhich($attr, $value)
    {
        $movies = Movies::where($attr, $value)->orderBy('year', 'desc')->paginate(10);
        return $movies;
    }

    /*
     * Get all staff working on specific movie with their jobs
     */
    public function getCrewJob()
    {
        $movie = $this->getKey();
        return DB::table('cast_of_movies')
            ->join('job', 'cast_of_movies.job_id', '=', 'job.id')
            ->join('cast', 'cast_of_movies.cast_id', '=', 'cast.id')
            ->select('cast.id', 'cast.name', 'cast.image', 'job.id as job_id', 'job.name as job_name')
            ->where('cast_of_movies.movies_id', '=', $movie)
            ->get();
    }

    /**
     * Get actors of a specific movie
     *
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function actors($limit = null)
    {
        return $this->belongsToMany('App\Models\Cast', 'cast_of_movies')->where('job_id', 1)->limit($limit);
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
        return $this->hasMany('App\Models\Review', 'movies_id');
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
