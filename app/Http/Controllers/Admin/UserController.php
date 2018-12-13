<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\UserDatatable;
use App\Models\Role;
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
        $roles = Role::all();
        return $userDatatable->render('admin.users.index', ['roles' => $roles]);
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'about' => 'string|nullable',
            'image' => v_image(),
            'site' => 'string|max:255',
            'short_bio' => 'string|max:255',
        ]);
        $data['password'] = bcrypt(request('password'));
        User::create($data);

        return response(['success' => 'User has been added successfully']);
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

        //Check if User is exist
        $user = User::find($id);
        if ($user) {
            $data = $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,id,' . $id,
                'password' => 'required|min:6',
                'site' => 'sometimes|nullable|url',
                'about' => 'string',
                'short_bio' => 'nullable|string|max:255',
                'image' => v_image() . '|nullable',
                'new_password' => 'nullable:confirmed',
                'country' => 'required',

            ]);
            if (request()->has('password')) {
                $data['password'] = bcrypt(request('password'));
            }

            $user->name = \request()->name;
            $user->email = \request()->email;
            if ($data['new_password'] != '') {
                $user->password = bcrypt(\request()->new_password);
            } else {
                $user->password = bcrypt(\request()->password);
            }
            $user->site = $data['site'];
            $user->about = $data['about'];
            $user->country = $data['country'];
            if (!empty($data['image'])) {
                $data['image'] = request()->file('image')->storeAs('user/', $data['name'] . time() . '.' . request()->image->extension());
                Storage::delete($user->image);
                $user->image = $data['image'];
            }
            $user->save();

            return response(['success' => 'User has been updated successfully']);
        } else {
            return response(['errors' => 'something error']);
        }
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
        $user = User::find($id);
        if ($user) {

            $user->delete();

            return response(['success' => 'User has been deleted successfully']);
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
            User::destroy(\request('item'));
        } else {
            User::find(\request('item'))->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('users'));
    }

    public function show($id)
    {

        $user = User::find($id);
        $roles = $user->roles;
        $permissions = [];
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                $permissions[] = $permission;
            }
        }
        dd($permissions);
    }

}
