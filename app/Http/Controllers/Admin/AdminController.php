<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\AdminDatatable;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.admins.create');
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
            'name' => 'required',
            'email' => 'required|email|unique:admin',
            'password' => 'required|min:6',
        ]);
        $data['password'] = bcrypt(request('password'));
        Admin::create($data);

        return redirect(aurl('admins'));
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
        $data = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:admin,id,' . $id,
            'password' => 'sometimes|nullable|min:6']);
        if ($request->has('password')) {
            $data['password'] = bcrypt(request('password'));
        }

        $admin = Admin::where('id', $id)->update($data);

        return response($admin);
//        return redirect(aurl('admins'))->with('success', 'added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id)->delete();
        return response($admin);
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


}
