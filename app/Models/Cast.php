<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cast extends Model
{
    protected $table = 'cast';
    protected $fillable = [
        'name',
        'about',
        'gender',
        'country',
        'date_of_birth',
        'image',
    ];

    public static function insertCastJob($cast_id, $job_id)
    {
        DB::table('cast_jobs')->insert([
            'cast_id' => $cast_id,
            'job_id' => $job_id,
        ]);
    }

    public function jobs()
    {
//        return $this->belongsToMany('App\Models\Job', 'cast_jobs', 'cast_id','job_id');
        $cast_id = $this->getKey();
        return DB::table('cast_jobs')
            ->join('job', 'cast_jobs.job_id', 'job.id')
            ->select('job.name as job_name')
            ->where('cast_jobs.cast_id', '=', $cast_id)
            ->get();
    }

    public function getCastWithJobs()
    {
        $cast_id = $this->getKey();
        return DB::table('cast_jobs')
            ->join('cast', 'cast_jobs.cast_id', 'cast.id')
            ->join('job', 'cast_jobs.job_id', 'job.id')
            ->select('cast.*', 'job.name as job_name')
            ->where('cast_jobs.cast_id', '=', $cast_id)
            ->get();
    }

    public function getAllCastsWithJobs()
    {
        return DB::table('cast_jobs')
            ->join('cast', 'cast_jobs.cast_id', 'cast.id')
            ->join('job', 'cast_jobs.job_id', 'job.id')
            ->select('cast.*', 'job.name as job_name')
            ->get();
    }

    /**
     *
     * function returns movies of cast
     * @return \Illuminate\Support\Collection
     */
    public function movies()
    {
        $cast_id = $this->getKey();
        return DB::table('cast_of_movies')
            ->join('job', 'cast_of_movies.job_id', '=', 'job.id')
            ->join('movies', 'cast_of_movies.movies_id', '=', 'movies.id')
            ->select('movies.id as movie_id', 'movies.title', 'movies.poster', 'movies.year', 'job.*')
            ->where('cast_of_movies.cast_id', '=', $cast_id)
            ->get();
    }
}
