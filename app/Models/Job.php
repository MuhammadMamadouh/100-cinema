<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    protected $table = 'job';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

    public function casts()
    {
        $job_id = $this->getKey();
        return DB::table('cast_jobs')
            ->join('cast', 'cast_jobs.cast_id', 'cast.id')
            ->select('cast.*')
            ->where('cast_jobs.job_id', '=', $job_id)
            ->get();
    }
}
