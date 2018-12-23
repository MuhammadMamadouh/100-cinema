<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Job;
use Illuminate\Http\Request;


class CastController extends Controller
{


    /**
     * add images to crew.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function addImages(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            return view('admin.cast.create.add_cast_images', ['cast_id' => $id]);
        }
        if ($request->isMethod('post')) {
            if (!empty($data['image'])) {
                $data['image'] = $request->file('image')->storeAs('cast/' . $request->cast_id, time());
            }
//        return redirect(aurl('cast'));

        }
    }

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
        $images = $cast->media;
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
