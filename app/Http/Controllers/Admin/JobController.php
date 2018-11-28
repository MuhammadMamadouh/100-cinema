<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\JobDatatable;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JobDatatable $jobDatatable)
    {
        return $jobDatatable->render('admin.jobs.index', ['title' => '']);
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
            'name' => 'required',
        ]);
        Job::create($data);

        return response(['success' => 'Job has been added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $job = Job::find($id);
        if ($job) {
            $data = $this->validate(request(), ['name' => 'required|unique:job',]);

            Job::where('id', $id)->update($data);

            return response(['success' => 'Job has been updated successfully']);
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
        //
        $job = Job::find($id);
        if ($job) {
            Job::find($id)->delete();
            session()->flash('success', 'deleted successfully');
            session()->flash('');

            return response(['success' => 'Job has been deleted successfully']);
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

        } else {
            Job::find(\request('item'))->delete();
        }
        session()->flash('success', 'deleted successfully');
        return redirect(aurl('jobs'));
    }


}
