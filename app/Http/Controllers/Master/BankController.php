<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Condominio;
use Illuminate\Http\Request;

class BankController extends Controller
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
        $banks = $condominio->banks;
        return view('master.banks.index',compact('condominio','banks',));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $condominio_id = $request->condominio_id;
        $bank = new Bank();
        return view('master.banks.create',compact('condominio_id','bank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function edit(Bank $bank)
    {
       $condominio = $bank->condominio;
       $condominio;

        return view('master.banks.edit',compact('bank','condominio'));
    }

    public function store(Request $request)
    {
      $request->validate(['ctta'=>'required','bank'=>'required','owner'=>'required','condominio_id'  =>'required']);
      $bank = new Bank($request->all());
      $bank->save();
      return redirect()->route('condominios.edit',$request->condominio_id)->with('success', 'Banco ' . $bank->bank .' - ctta : '.$bank->ctta.'  creado exitosamente');


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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $request->validate(['ctta'=>'required','bank'=>'required','owner'=>'required',]);
        $bank->update($request->all());
        $bank->save();
        $condominio = $bank->condominio;

        return redirect('/master/banks?condominio_id='.$condominio->id)->with('success', 'Banco ' . $bank->bank .' - ctta : '.$bank->ctta.'  creado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {

        $bank->delete();
        return redirect('/master')->with('success', 'Banco ' . $bank->bank .' - ctta : '.$bank->ctta.'  Eliminado exitosamente');
    }
}
