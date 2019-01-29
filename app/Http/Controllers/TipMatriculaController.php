<?php

namespace App\Http\Controllers;

use App\TipMatricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipMatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TipMatricula::withTrashed()->get();
        return view('admin.tipoMatricula.index',['data' =>$data] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function getId(){
        $id = TipMatricula::whereRaw('id > ? or deleted_at <> null', [0])->get();
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
        $dato = TipMatricula::create ([
            'id' => $this->getId(),
            'etiqueta'=> strtoupper($request->input('etiqueta')),
            'id_usu_cre' => $this->getId(),
        ]);
        return $this->index();
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
        $data = TipMatricula::find($id);
        return view('admin.tipoMatricula.edit', ["data"=>$data]);
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
        $data=TipMatricula::find($id);
        $data->etiqueta=$request->input('etiqueta');
        $data->save();
        return redirect('/admin/tipoMatricula/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $TipoMatricula=TipMatricula::find($id);
        $TipoMatricula->delete();
        return redirect('/admin/tipoMatricula/');
    }

    public function restaurar($id)
    {
        $datos=TipMatricula::onlyTrashed()->find($id)->restore();
        return redirect('/admin/tipoMatricula/');
    }
}
