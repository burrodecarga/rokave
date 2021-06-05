<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('name', 'asc')->get();
        $title = "permissions";
        return view('master.permissions.index', compact('permissions', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = new Permission;
        $title = "permissions";
        $btn = "save";
        return view('master.permissions.create', compact('permission', 'title', 'btn'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required|unique:permissions']);

        $permission = Permission::create([
            "name" => $request->name,
            "permission" => $request->permission,
        ]);
        return redirect()->route('permissions.index')->with('success', 'permission ' . $permission->name . ' creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);
        $roles = collect();
        $allRoles = Role::all();
        foreach ($allRoles as $role) {
            if ($role->hasPermissionTo($permission->name)) $roles[] = $role->name;
        }
        //dd($roles);
        $btn = "back";
        $title = "detail of permission";
        return view('master.permissions.show', compact('permission', 'roles', 'title', 'btn'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $permission = Permission::find($id);
        $btn = "modify";
        $title = "Permission";
        return view('master.permissions.edit', compact('permission', 'title', 'btn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $permission = Permission::find($id);
        $request->validate(['name'=>'required|unique:permissions,id,'.$permission->id]);

        $permission->update([
            "name" => $request->name,
            "permission" => $request->permission,
        ]);
        return redirect()->route('permissions.index')->with('success', 'permission ' . $permission->name . ' actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $name = $permission->name;
        $roles = Role::all();
        foreach ($roles as $rol) {
            $rol->revokePermissionTo($name);
        }
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'permission ' . $name . ' Eliminado exitosamente');
    }
}
