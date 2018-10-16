<?php

namespace App\Http\Controllers\User;

use App\DataTables\CastDatatable;
use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


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
        $images = DB::table('cast_media')->select('path')->where('cast_id', $cast->id)->get();
        return view('front.crew.view', compact('cast', 'jobs', 'movies', 'images'));
    }

    public function viewCastsByJob($name)
    {
        $job = Job::where('name',$name)->first();
        $casts = $job->casts();
        return view('front.crew.castByJob', compact('casts', 'job'));
    }
}
