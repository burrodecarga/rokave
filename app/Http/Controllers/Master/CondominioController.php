<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Condominio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CondominioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $condominios = Condominio::all();
        $title ='List of Condominios';
        $btn ='';
        return view('master.condominios.index', compact('condominios','title','btn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('master.condominios.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:condominios',
        ]);
        $condominio = Condominio::create($request->all());

        if ($request->file('image')) {
            $url = $request->file('image')->store('public/logos');
            //$url = Storage::put('logos', $request->file('image'));
            $condominio->logo = $url;
            $condominio->save();
        }

        return redirect()->route('condominios.index')->with('success', 'Condominio ' . $condominio->name . ' creado exitosamente');
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
    public function edit(Condominio $condominio)
    {
        $brands = Brand::orderBy('name')->get();
        $users = User::orderBy('name')->get();
        $administrador =$condominio->administrador;
        return view('master.condominios.edit', compact('condominio', 'users','administrador','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Condominio $condominio)
    {

      // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:condominios,email,' . $condominio->id,
            'rut' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'mobil' => 'required',
            'user_id' => 'required',
            'logo'=>'image'
        ]);
        $condominio->update($request->all());

        if ($request->file('image')) {
            if ($condominio->logo) {
                Storage::delete($condominio->logo);
         //       $url = Storage::put('logos', $request->file('image'));
                $url = $request->file('image')->store('public/logos');
                $condominio->logo =$url;
            }else{
                $url = $request->file('image')->store('public/logos');
                //$url = Storage::put('logos', $request->file('image'));
                $condominio->logo = $url;
            }
            $condominio->save();

        }

        return redirect()->route('condominios.index')->with('success', 'Condominio ' . $condominio->name . ' creado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condominio $condominio)
    {
        $condominio->delete();
        return redirect()->route('condominios.index')->with('success', 'Condominio ' . $condominio->name . ' eliminado exitosamente');


    }
}
