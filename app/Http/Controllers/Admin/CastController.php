<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CastDatatable;
use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Job;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::all();
        return view('admin.cast.create.create', compact('jobs'));
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
        return redirect(aurl("cast"));
    }

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
    }

    public function storeImages(Request $request)
    {
        $cast_id = $request->cast_id;
        $this->validate(\request(), ['images.*' => v_image()]);
        $images = \request()->file('images');
        foreach ($images as $image) {
            $ext = $image->getClientOriginalExtension();
            $path = $image->storeAs('cast/' . $cast_id, rand(1, 500000) . '.' . $ext);
            DB::table('cast_media')->insert([
                'cast_id' => $cast_id,
                'path' => $path,
            ]);
        }
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $cast = Cast::find($id)->getCastWithJobs();
        $jobs = Cast::find($id)->jobs();
        $movies = Cast::find($id)->movies();
        $cast = Cast::find($id);
        return view('admin.cast.profile', compact('cast', 'jobs', 'movies'));
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
        $jobs = Job::all();
        return view('admin.cast.edit', compact('cast', 'jobs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $this->validate(request(), [
            'name' => 'required|string',
            'country' => 'string|required',
            'about' => 'string|nullable',
            'image' => v_image(),
            'date_of_birth' => 'date',
        ]);

        if (!empty($data['image'])) {
//            $data['image'] = $request->file('image')->store('users');
            $data['image'] = up()->upload([
                'file' => 'image',
                'path' => 'cast/' . Cast::find($id)->id,
                'upload_type' => 'single',
                'deleted_file' => Cast::find($id)->image,
                'new_name' => time(),
            ]);
        }
        Cast::where('id', $id)->update($data);

//        $job = DB::table('course_facilities')->where('course_code', $code)->delete();
//        foreach ($ids as $id) {
//            DB::table('course_facilities')->insert([
//                'course_code' => $code,
//                'facility_id' => $id,
//            ]);
//        }
        return redirect(aurl('cast'))->with('success', 'updated successfully');
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
        Storage::deleteDirectory('cast/' . $cast->id);
        $cast->delete();
        return response($cast);
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
