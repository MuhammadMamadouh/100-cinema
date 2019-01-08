<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MoviesDatatable;
use App\Http\Controllers\Controller;
use App\Models\Cast;
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
        return response(['success' => 'Movie has been added successfully']);
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
        $movie = Movies::find($id);
        if ($movie) {
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
            return response(['success' => 'Movie has been updated successfully']);
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
        $movie = Movies::find($id);
        if ($movie) {
            Storage::deleteDirectory('movies/' . $movie->title);
            $movie->delete();
            return response(['success' => 'Movie has been deleted successfully']);
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
    public function addCrew(Builder $builder, $id)
    {
        if (request()->ajax()) {
            return datatables(Cast::query())
                ->addColumn('checkbox', 'admin.movies.btn.checkbox')
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
        $jobs = \request()->input('jobs');

        // Delete records before save new
        DB::table('cast_of_movies')
            ->where('movies_id', $movie_id)
            ->where('cast_id', $cast_id)
            ->delete();

        try {
            foreach ($jobs as $job) {
                DB::table('cast_of_movies')->insert([
                    'cast_id' => $cast_id,
                    'movies_id' => $movie_id,
                    'job_id' => $job,
                ]);
            }
            return back();
        } catch (\PDOException $exception) {

            return response(['errors' => 'This person has been added to crew before']);
        }

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
        return response(['success' => 'category added successfully']);
    }

}
