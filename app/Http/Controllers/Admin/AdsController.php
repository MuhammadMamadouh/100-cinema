<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CastDatatable;
use App\Http\Controllers\Controller;
use App\DataTables\AdsDatatable;
use App\Models\Cast;
use App\Models\Category;
use App\Models\Job;
use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Yajra\DataTables\Html\Builder;


class AdsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param AdsDatatable $ads
     * @return \Illuminate\Http\Response
     */
    public function index(AdsDatatable $ads)
    {

        $collection = app()->routes->getRoutes();

        $pages = [];
        $names = [];
        foreach ($collection as $route) {

            if (strpos($route->uri(), 'admin') !== 0) {
                $pages [] = $route->uri();
                $names [] = '';
            }
        }

        return $ads->render('admin.ads.index', compact('pages', 'names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validate(request(), [
            'name' => 'required|string',
            'link' => 'required|url',
            'start_at' => 'required|date|',
            'end_at' => 'required|date|',
            'page' => 'required',
            'status' => 'required',
            'image' => v_image(),
        ]);
        if (!empty($data['image'])) {
            $data['image'] = $request->file('image')->storeAs('ads/' . $data['name'], $data['name'] . time());
        }

        $data['start_at'] = strtotime($data['start_at']);
        $data['end_at'] = strtotime($data['end_at']);
        Ads::create($data);

        return redirect(aurl('ads'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

//        return view('layouts.sidebar', compact('ads'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Ads::find($id);
        return view('admin.ads.edit', compact('movie'));
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
        //
        $data = $this->validate(request(), [
            'title' => 'required|string',
            'playtime' => 'required|integer|min:2',
            'language' => 'nullable|min:6',
            'country' => 'string|required',
            'story' => 'string|nullable',
            'trailer' => 'string|nullable',
            'year' => 'integer|required|',
            'poster' => v_image(),
        ]);
        if (!empty($data['poster'])) {
            $data['poster'] = $request->file('poster')->storeAs('ads/' . $data['title'], $data['title'] . time());
        }
        if (!empty($data['trailer'])) {
            $trailer = explode('v=', $request->trailer);
            $data['trailer'] = $trailer[1];
        }
        Ads::where('id', $id)->update($data);
        return redirect(aurl('ads'))->with('success', 'added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Ads::find($id);
        Storage::deleteDirectory('ads/' . $movie->title);
        $movie->delete();
        session()->flash('success', trans('admin.deleted_record'));
        session()->flash('');
        return redirect(aurl('ads'));
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
            Ads::destroy(\request('item'));
        } else {
            Ads::find(\request('item'))->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('admins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function addCrew(Builder $builder, $id, Request $request)
    {
        if (request()->ajax()) {
            return datatables(Cast::query())
                ->addColumn('checkbox', 'admin.ads.btn.checkbox')
//                ->addColumn('select_job', 'admin.ads.btn.select_job')
                ->addColumn('select_job', function (Cast $cast) {
                    $jobs = Job::all();
                    return view('admin.ads.btn.select_job', [
                        'jobs' => $jobs, 'id' => $cast->id]);
                })
                ->rawColumns(['AddToMovie', 'checkbox', 'select_job'])->toJson();
        }

        $dataTable = $builder->columns($this->getColumns())->minifiedAjax();

        return view('admin.ads.add_crew', compact('dataTable', 'jobs'));
    }

    protected function getColumns()
    {
        return [
            [
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' => '<input type="checkbox" class="check_all" onclick="checkAll()">',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ],
            [
                'name' => 'id',
                'data' => 'id',
                'title' => '#',
            ],
            [
                'name' => 'name',
                'data' => 'name',
                'title' => 'name',
            ],
            [
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => 'created_at',
            ],
            [
                'name' => 'updated_at',
                'data' => 'updated_at',
                'title' => 'updated_at',
            ],
            [
                'name' => 'select_job',
                'data' => 'select_job',
                'title' => 'Select Job',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ],
        ];
    }

    /**
     * Add actors, directors, writers, ... etc. to a movie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addActors()
    {
        $cast_id = \request()->cast_id;
        $movie_id = \request()->movie_id;
        $jobs = \request()->jobs;
        foreach ($jobs as $job) {
            //Cast::insertCastJob($cast->id, $job);
            DB::table('cast_of_ads')->insert([
                'cast_id' => $cast_id,
                'ads_id' => $movie_id,
                'job_id' => $job,
            ]);
        }
        return back();
    }

    /**
     * add Categories to a movie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addCategory()
    {
        $movie_id = \request()->movie_id;
        $categories = \request()->categotries;
        DB::table('ads_category')->where('ads_id', $movie_id)->delete();
        foreach ($categories as $category) {
            DB::table('ads_category')->insert([
                'ads_id' => $movie_id,
                'category_id' => $category,
            ]);
        }
        return back();
    }

}
