<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Job;


class CastController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cast = Cast::find($id);
        $jobs = $cast->jobs();
        $movies = $cast->movies();
        $images = $cast->media()->limit(3)->get();
        return view('front.crew.view', compact('cast', 'jobs', 'movies', 'images'));
    }

    /**
     * Display media of the specified person of crew.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function media($id)
    {
        $cast = Cast::find($id);
        $media = $cast->media;
        return view('front.crew.media', compact('cast', 'media'));
    }

    public function viewCastsByJob($name)
    {
        $job = Job::where('name', $name)->first();
        $casts = $job->casts();
        return view('front.crew.castByJob', compact('casts', 'job'));
    }
}
