<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Condominio;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate(['condominio_id'=>'required']);
        $condominio = Condominio::find($request->condominio_id);
        $socials = $condominio->socials;
        return view('master.socials.index',compact('condominio','socials',));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $condominio_id = $request->condominio_id;
        $brands = Brand::orderBy('name')->get();
        return view('master.socials.create',compact('brands','condominio_id'));
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
          'name'=>'required',
          'url'  =>'required',
          'condominio_id'  =>'required'
      ]);
      $social = new Social($request->all());
      $social->save();
      return redirect()->route('condominios.edit',$request->condominio_id)->with('success', 'Red Social ' . $social->name . ' creado exitosamente');

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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        $social->delete();
        return redirect()->route('condominios.index')->with('success', 'Condominio ' . $social->name . ' eliminado exitosamente');
    }
}
