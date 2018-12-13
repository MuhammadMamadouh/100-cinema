<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\RolesDatatable;
use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param RolesDatatable $role
     * @return \Illuminate\Http\Response
     */
    public function index(RolesDatatable $role)
    {
        return $role->render('admin.roles.index', ['title' => '']);
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
            'display_name' => 'required',
        ]);

        Role::create($data);

        return response(['success' => 'Role has been added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        dd($role->permissions);
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
        $role = Role::find($id);
        if ($role) {
            $data = $this->validate(request(), [
                'name' => 'required',
                'display_name' => 'required',
            ]);

            Role::where('id', $id)->update($data);

            return response(['success' => 'Role has been updated successfully']);
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
        $role = Role::find($id);
        //check if role exist
        if ($role) {
            $role->delete();
            return response(['success' => 'Role has been deleted successfully']);
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
            Role::destroy(\request('item'));
        } else {
            Role::find(\request('item'))->delete();
        }
        return response(['success' => 'Roles are deleted successfully']);
    }


}
