<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CastDatatable;
use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\CastMedia;
use App\Models\Job;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class CastController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CastDatatable $casts)
    {
        $jobs = Job::all();
        return $casts->render('admin.cast.index', compact('jobs'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'country' => 'string|required',
            'about' => 'string|nullable',
            'image' => v_image(),
            'date_of_birth' => 'date',
        ]);
        $cast = Cast::create($data);
        if (!empty($data['image'])) {
            $data['image'] = $request->file('image')->storeAs('cast/' . $cast->id, time());
        }
        $cast = Cast::find($cast->id);
        $cast->image = $data['image'];
        $cast->save();


        $jobs = $request->input('jobs');
        foreach ($jobs as $job) {
            //Cast::insertCastJob($cast->id, $job);
            DB::table('cast_jobs')->insert([
                'cast_id' => $cast->id,
                'job_id' => $job,
            ]);
        }
        return response(['success' => 'Cast has been added successfully']);
    }

    /**
     * Store Media to a specific person of crew
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function storeMedia(Request $request)
    {
        $cast_id = $request->cast_id;
        $this->validate(\request(), ['images.*' => v_image()]);
        $images = \request()->file('images');
        $media = [];
        foreach ($images as $image) {
            $ext = $image->getClientOriginalExtension();
            $path = $image->storeAs('cast/' . $cast_id, rand(1, 500000) . '.' . $ext);
            $pic = CastMedia::create(['cast_id' => $cast_id,
                'path' => $path,]);
            $media[] = "<li class=\"col-sm-3\">
                            <a class=\"thumbnail\">
                                <img src=" . Storage::url($path) . " alt=\"\">
                                <div class=\"overlay\" data-id=\"{{$pic->id}}\">
                                    <span class=\"fa fa-trash-o .gallery_delete\"></span>
                                </div>
                            </a>
                        </li>";
        }
        return response(['media' => $media]);
    }

    /**
     * Display media of the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function media($id)
    {
        $cast = Cast::find($id);
        if ($cast) {
            $media = $cast->media;
            return view('admin.cast.media', compact('cast', 'media'));
        } else {
            abort(404);
        }
    }


    /**
     * Remove media of the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyMedia()
    {
        $id = \request()->id;

        try {
            $media = CastMedia::find($id);
            \Storage::delete($media->path);
            $media->delete();
            return response(['success' => 'Media has been updated successfully']);
        } catch (QueryException $exception) {
            return response(['errors' => 'something error']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cast = Cast::find($id);
        if ($cast) {
            $cast = Cast::find($id);
            $jobs = Job::all();
            return view('admin.cast.edit', compact('cast', 'jobs'));
        } else {
            abort(404);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $cast = Cast::find($id);
        if ($cast) {
            $data = $this->validate(request(), [
                'name' => 'required|string',
                'country' => 'string|required',
                'about' => 'string|nullable',
                'image' => v_image(),
                'date_of_birth' => 'date',
            ]);

            if (!empty($data['image'])) {

                $data['image'] = up()->upload([
                    'file' => 'image',
                    'path' => 'cast/' . $cast->id,
                    'upload_type' => 'single',
                    'deleted_file' => $cast->image,
                    'new_name' => time() . '.' . \request()->file('image')->extension(),
                ]);
            }
            Cast::where('id', $id)->update($data);

            return response(['success' => 'Cast has been updated successfully']);
        } else {
            return response(['errors' => 'something error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cast = Cast::find($id);
        if ($cast) {
            $cast = Cast::find($id);
            Storage::deleteDirectory('cast/' . $cast->id);
            $cast->delete();
            return response(['success' => 'Cast has been updated successfully']);
        } else {
            return response(['errors' => 'something error']);
        }
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function multiDestroy()
    {
        if (is_array(request('item'))) {
            Cast::destroy(\request('item'));
        } else {
            Cast::find(\request('item'))->delete();
        }
        session()->flash('success', 'deleted successfully');
        return redirect(aurl('cast'));
    }


}
