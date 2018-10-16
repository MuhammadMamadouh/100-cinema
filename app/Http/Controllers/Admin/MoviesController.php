<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CastDatatable;
use App\Http\Controllers\Controller;
use App\DataTables\MoviesDatatable;
use App\Models\Cast;
use App\Models\Category;
use App\Models\Job;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Html\Builder;


class MoviesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MoviesDatatable $movies)
    {
        return $movies->render('admin.movies.index', ['title' => '']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.movies.create');
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
            $data['poster'] = $request->file('poster')->storeAs('movies/' . $data['title'], $data['title'] . time());
        }
        if (!empty($data['trailer'])) {
            $trailer = explode('v=', $request->trailer);
            $data['trailer'] = $trailer[1];
        }
        Movies::create($data);

        return redirect(aurl('movies'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $movie = Movies::find($id);
        $actors = $movie->actors();
        $directors = $movie->directors();
        $movieCategories = $movie->categories;
        $categories = Category::all();
        return view('admin.movies.view', compact(
            'movie', 'actors', 'directors', 'categories', 'movieCategories'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movies::find($id);
        return view('admin.movies.edit', compact('movie'));
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
            $data['poster'] = $request->file('poster')->storeAs('movies/' . $data['title'], $data['title'] . time());
        }
        if (!empty($data['trailer'])) {
            $trailer = explode('v=', $request->trailer);
            $data['trailer'] = $trailer[1];
        }
        Movies::where('id', $id)->update($data);
        return redirect(aurl('movies'))->with('success', 'added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movies::find($id);
        Storage::deleteDirectory('movies/' . $movie->title);
        $movie->delete();
        session()->flash('success', trans('admin.deleted_record'));
        session()->flash('');
        return redirect(aurl('movies'));
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
            Movies::destroy(\request('item'));
        } else {
            Movies::find(\request('item'))->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('admins'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function addCrew(Builder $builder, $id, Request $request)
    {
        if (request()->ajax()) {
            return datatables(Cast::query())
                ->addColumn('checkbox', 'admin.movies.btn.checkbox')
//                ->addColumn('select_job', 'admin.movies.btn.select_job')
                ->addColumn('select_job', function (Cast $cast) {
                    $jobs = Job::all();
                    return view('admin.movies.btn.select_job', [
                        'jobs' => $jobs, 'id' => $cast->id]);
                })
                ->rawColumns(['AddToMovie', 'checkbox', 'select_job'])->toJson();
        }

        $dataTable = $builder->columns($this->getColumns())->minifiedAjax();

        return view('admin.movies.add_crew', compact('dataTable', 'jobs'));
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
            DB::table('cast_of_movies')->insert([
                'cast_id' => $cast_id,
                'movies_id' => $movie_id,
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
        DB::table('movies_category')->where('movies_id', $movie_id)->delete();
        foreach ($categories as $category) {
            DB::table('movies_category')->insert([
                'movies_id' => $movie_id,
                'category_id' => $category,
            ]);
        }
        return back();
    }

}
