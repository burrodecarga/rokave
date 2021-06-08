<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Condominio;
use App\Models\Interest;
use Illuminate\Http\Request;

class InterestController extends Controller
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
        $interests = $condominio->interests()->orderBy('id','desc')->get();
        return view('master.interests.index',compact('condominio','interests',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $condominio_id = $request->condominio_id;
        $interest = new Interest();
        return view('master.interests.create',compact('condominio_id','interest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate(['value'=>'required|numeric','date'=>'required|date']);
      $interest = new Interest($request->all());
      $interest->save();
      return redirect()->route('condominios.edit',$request->condominio_id)->with('success', 'Interes de Mora ' . $interest->interest .' - vigencia : '.$interest->date.'  creado exitosamente');}

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
    public function edit(Interest $interest)
    {
       $condominio = $interest->condominio;
       $condominio;

        return view('master.interests.edit',compact('interest','condominio'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interest $interest)
    {
        $request->validate(['value'=>'required|numeric','date'=>'required|date']);
        $interest->update($request->all());
        $interest->save();
        return redirect()->route('condominios.edit',$request->condominio_id)->with('success', 'Interes de Mora ' . $interest->interest .' - vigencia : '.$interest->date.'  actualizado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interest $interest)
    {
       $interest->delete();
       return redirect('/master')->with('success', 'Interes ' . $interest->value .' % - date : '.$interest->date.'  Eliminado exitosamente');
    }
}
