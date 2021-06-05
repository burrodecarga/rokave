<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(5);
        $title = "list of roles";
        $btn = " ";
        return view("master.roles.index", compact("roles", "title", "btn"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        $permissions = Permission::all();
        $title = 'Create Role';
        $btn ='new Role';
        return view('master.roles.create',compact('role','permissions','title','btn'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required|unique:roles']);

        $permissions = collect($request->permissions);
        $role = Role::create([
            "name" => $request->name,
            "area" => $request->area,
        ]);
        if($permissions->count()>0){
            foreach ($permissions as $key => $p) {
            $role->givePermissionTo($p);
        }
        }

        return redirect()->route('roles.index')->with('success', 'Role ' . $role->name . ' creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $permission_id = $role->permissions->pluck('id')->toArray();
        $permissions = Permission::orderBy('permission', 'asc')->get();
        $btn = "back";
        $title = "detail of role";
        return view('master.roles.show', compact('role', 'permission_id', 'permissions', 'title', 'btn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission_id = $role->permissions->pluck('id')->toArray();
        //dd($permission_id);
        $permissions = Permission::orderBy('permission', 'asc')->get();
        $btn = "modify";
        $title = "modify role";
        //dd($permission_id, $permissions);
        return view('master.roles.edit', compact('role', 'permission_id', 'permissions', 'title', 'btn'));
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
                $role = Role::find($id);
$request->validate(['name'=>'required|unique:roles,id,'.$role->id]);
        $role->update([
            "name" => $request->name,
            "area" => $request->area,
        ]);
        $permissions = $request->permissions;

        $role->syncPermissions([]);

        if($permissions){
              foreach ($permissions as $key => $p) {
             $role->givePermissionTo($p);
         }
        }

        return redirect()->route('roles.index')->with('success', 'Role ' . $role->name . ' actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $name = $role->name;
        $role->syncPermissions([]);
        //dd($role);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role ' . $name . ' Eliminado exitosamente');
    }
}
