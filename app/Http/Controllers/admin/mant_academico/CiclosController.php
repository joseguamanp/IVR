<?php

namespace App\Http\Controllers\admin\mant_academico;

use App\Ciclos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CiclosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ciclos::withTrashed()->get();
        return view('admin/ciclos.index',['data' =>$data] );
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
        $id = Ciclos::whereRaw('id > ? or deleted_at <> null', [0])->get();
        $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $data = Ciclos::create ([
            'id' =>$this->getId(),
            'nombre_ciclo'=> strtoupper($request->input('nombre')),
            'nombre_corto' => strtoupper($request->input('nombre_corto')),
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
        $data = Ciclos::find($id);
        return view('admin.ciclos.edit', ["data"=>$data]);
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
        $data=Ciclos::find($id);
        $data->nombre_ciclo=strtoupper($request->input('nombre_ciclo'));
        $data->save();
        return redirect('/admin/ciclos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Ciclo=Ciclos::find($id);
        $Ciclo->delete();
        return redirect('/admin/ciclos/');
    }

    public function restaurar($id)
    {
        $data = Ciclos::onlyTrashed()->find($id)->restore();
        return redirect('/admin/ciclos/');
    }
}
