<?php

namespace App\Http\Controllers;

use App\RazonBeca4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RazonBecaController4 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RazonBeca4::withTrashed()->get();
        return view('admin.razon4.index', ['data' =>$data] );
    }

    public function getId(){
        $id = RazonBeca4::whereRaw('id > ? or deleted_at <> null', [0])->get();
        $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }
    public function store(Request $request)
    {
        $id=Auth::user()->id;
        $dato = RazonBeca4::create ([
            'id' => $this->getId(),
            'etiqueta'=> mb_strtoupper($request->input('etiqueta')),
            'id_usu_cre' => $this->getId(),
        ]);
        return redirect('/admin/razon4/');
    }

    public function edit($id)
    {
        $data = RazonBeca4::find($id);
        return view('admin.razon4.edit', ["data"=>$data]);
    }

    public function update(Request $request, $id)
    {
        $data=RazonBeca4::find($id);
        $data->etiqueta=mb_strtoupper($request->input('etiqueta'));
        $data->save();
        return redirect('/admin/razon4/');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
    public function destroy($id)
    {
        $razon4=RazonBeca4::find($id);
        $razon4->delete();
        return redirect('/admin/razon4/');
    }

    public function restaurar($id){
        $data = RazonBeca4::onlyTrashed()->find($id)->restore();
        return redirect('/admin/razon4/');
    }
}
