<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'movies_reviews';
    protected $fillable = [
        'user_id',
        'movies_id',
        'rate',
        'review',
    ];

    /**
     * Get User wrote the review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function movie()
    {
        return $this->belongsTo('App\Models\Movies', 'movies_id');
    }
}
