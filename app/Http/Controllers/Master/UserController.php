<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();
        $title = "users list";
        return view('master.users.index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        $title = "users";
        $btn = "save";
        $userRole = 0;
        $roles = Role::all();
        $users = user::orderBy('name', 'asc')->get();
        return view('master.users.create', compact('user', 'userRole', 'roles', 'title', 'btn'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate( [
            'email' => 'required|max:255|unique',
            'name' => 'required',
            'role' => ['required'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $operador = auth()->user()->getRoleNames()->first();
        $rol = "inhabilitado";
        $area = 'N/A';
        if ($operador == "super-admin") {
            $rol = $request->role;
            $rolId = Role::where('id', '=', $rol)->get('area')->first();
        }
        //dd($rolId->area, $rol);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(30);
        $user->email_verified_at =now();
        $user->save();
        $user->assignRole($rol);
        return redirect()->route('users.index')->with('success', 'user ' . $user->name . ' creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roleName = $user->getRoleNames()->first();
        if ($roleName == null) {
            $userRole = 0;
        } else {
            $userRole_id = Role::where('name', $roleName)->get()->pluck('id')->first();
            $userRole = $userRole_id;
        }
        $roles = Role::all();
        $btn = "modify";
        $title = "user";
        return view('master.users.edit', compact('user', 'userRole', 'roles', 'title', 'btn'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       $request->validate( [
        'email' => 'required|max:255|unique:users,id,'.$user->id,
        'name' => 'required',
        'role' => ['required'],

    ]);
        $operador = auth()->user()->getRoleNames()->first();
        if ($request->password == '') {
            $password = $user->password;
        } else {
            $password = bcrypt($request->get('password'));
        }
        $area = Role::where('id', $request->role)->pluck('area')->first();
        $user->update([
            'name' => $request->name,
            'email' => $request->get('email'),
            'password' => $password,
        ]);

        if (!$request->role == '') {
            if ($operador == "super-admin") {
                $user->syncRoles([]);
                $user->assignRole($request->role);
            }
        }

        return redirect()->route('users.index')->with('success', 'user ' . $user->name . ' actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->syncRoles([]);
        $name = $user->name;
        $user->delete();
        return redirect()->route('users.index')->with('success', 'user ' . $name . ' Eliminado exitosamente');
    }
}
