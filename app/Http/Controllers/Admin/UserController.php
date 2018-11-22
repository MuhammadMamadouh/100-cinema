<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\UserDatatable;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDatatable $userDatatable)
    {
        return $userDatatable->render('admin.users.index', ['title' => '']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        $data = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:admin',
            'password' => 'required|min:6',
        ]);
        $data['password'] = bcrypt(request('password'));
        User::create($data);

        return redirect(aurl('users'));
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
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
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

        User::where('id', $id)->update($data);

        return redirect(aurl('users'))->with('success', 'added successfully');
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
        User::find($id)->delete();
        session()->flash('success', trans('admin.deleted_record'));
        session()->flash('');
        return redirect(aurl('users'));
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
            User::destroy(\request('item'));
        } else {
            User::find(\request('item'))->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('users'));
    }


}
