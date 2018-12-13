<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\AdminDatatable;
use App\Models\Cast;
use App\Models\Movies;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDatatable $admin)
    {
        return $admin->render('admin.admins.index', ['title' => '']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:admin',
            'password' => 'required|min:6',
        ]);
        $data['password'] = bcrypt(request('password'));

        Admin::create($data);

        return response(['success' => 'admin has been added successfully']);
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
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.admins.edit', compact('admin'));
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
        $admin = Admin::find($id);
        if ($admin) {

            $data = $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|email|unique:admin,id,' . $id,
                'password' => 'sometimes|nullable|min:6']);
            if ($request->has('password')) {
                $data['password'] = bcrypt(request('password'));
            }

            Admin::where('id', $id)->update($data);

            return response(['success' => 'admin has been updated successfully']);
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
        $admin = Admin::find($id);
        //check if admin exist
        if ($admin) {

            $admin->delete();

            return response(['success' => 'admin has been deleted successfully']);

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
            Admin::destroy(\request('item'));
        } else {
            Admin::find(\request('item'))->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('admins'));
    }


    /**
     * display home page
     */
    public function home()
    {

        $movies = Movies::all()->count();
        $workers = Cast::all()->count();
        $posts = Post::all()->count();
        $videos = Video::all()->count();

        return view('admin.index', compact('movies', 'workers', 'posts', 'videos'));
    }
}
