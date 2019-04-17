<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cast extends Model
{
    protected $table = 'cast';
    protected $fillable = ['name', 'about', 'gender',
        'country', 'date_of_birth', 'image',
    ];


    /**
     * Get Jobs of specific person
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function jobs()
    {
        return $this->belongsToMany('App\Models\Job', 'cast_jobs', 'cast_id', 'job_id');
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllCastsWithJobs()
    {
        return DB::table('cast_jobs')
            ->join('cast', 'cast_jobs.cast_id', 'cast.id')
            ->join('job', 'cast_jobs.job_id', 'job.id')
            ->select('cast.*', 'job.name as job_name')
            ->get();
    }

    /**
     * Movies of specific person of crew
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function movies()
    {

        return $this->belongsToMany('App\Models\Movies', 'cast_of_movies', 'cast_id', 'movies_id');
    }


    /**
     * Get Media Of Specific Person Of Crew
     *
     * @param null $limit
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function media($limit = null)
    {
        return $this->hasMany('App\Models\CastMedia', 'cast_id');
    }

}
