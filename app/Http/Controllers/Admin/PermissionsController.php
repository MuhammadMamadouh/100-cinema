<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\PermissionsDatatable;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionsController extends Controller
{

    /**
     * Table a listing of the resource.
     *
     * @param PermissionsDatatable $permission
     * @return \Illuminate\Http\Response
     */
    public function index(PermissionsDatatable $permission)
    {
        return $permission->render('admin.permissions.index', ['title' => '']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->validate(request(), [
            'key' => 'required',
            'table_name' => 'nullable',
        ]);

        Permission::create($data);

        return response(['success' => 'Permission has been added successfully']);
    }

    /**
     * Table the specified resource.
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
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $permission = Permission::find($id);
        if ($permission) {
            $data = $this->validate(request(), [
                'key' => 'required',
                'table_name' => 'nullable',
            ]);

            Permission::where('id', $id)->update($data);

            return response(['success' => 'Permission has been updated successfully']);
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
        $permission = Permission::find($id);
        //check if permission exist
        if ($permission) {
            $permission->delete();
            return response(['success' => 'Permission has been deleted successfully']);
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
            Permission::destroy(\request('item'));
        } else {
            Permission::find(\request('item'))->delete();
        }
        return response(['success' => 'Permissions are deleted successfully']);
    }


}
