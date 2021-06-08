<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Condominio;
use App\Models\User;
use Illuminate\Http\Request;

class CondominioApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Condominio $condominio)
    {
        $apartments = $condominio->apartments;
        return view('master.condominios.apartments.index', compact('condominio','apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Condominio $condominio)
    {
        $apartment = new Apartment();
        $users = User::orderBy('name','asc')->get();
        return view('master.condominios.apartments.create', compact('condominio','apartment','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Condominio $condominio)
    {
        $request->validate([
          'name' => 'required',
          'address' => 'required',
          'alicuota' =>'required',
          'area' => 'required',
          'user_id' => 'required',
          'phone' => 'required'
      ]);

      $condominio->apartments()->create($request->all());

      return redirect()->route('condominios-apartments.index',$condominio->id)->with('success', 'Condominio ' . $condominio->name . ' creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Condominio  $condominio
     * @return \Illuminate\Http\Response
     */
    public function show(Condominio $condominio,Apartment $apartment)
    {
        return view('master.condominios.apartments.show', compact('condominio','apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Condominio  $condominio
     * @return \Illuminate\Http\Response
     */
    public function edit(Condominio $condominio,Apartment $apartment)
    {
        $users = User::orderBy('name','asc')->get();
        return view('master.condominios.apartments.edit', compact('condominio','apartment','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Condominio  $condominio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Condominio $condominio,Apartment $apartment)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'alicuota' =>'required',
            'area' => 'required',
            'user_id' => 'required',
            'phone' => 'required'
        ]);

        $apartment->update($request->all());
        $apartment->save();

        return redirect()->route('condominios-apartments.index',$condominio->id)->with('success', 'Condominio ' . $condominio->name . ' creado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Condominio  $condominio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condominio $condominio,Apartment $apartment)
    {
      $apartment->delete();
      return redirect()->route('condominios-apartments.index',$condominio->id)->with('success', 'Apartamento ' . $apartment->name . ' eliminado exitosamente');

    }
}
