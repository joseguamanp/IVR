<?php

namespace App\Http\Controllers;

use App\ModalidadCar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModalidadCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModalidadCar::withTrashed()->get();
        return view('admin.modCarrera.index',['data' =>$data] );
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
        $id = ModalidadCar::whereRaw('id > ? or deleted_at <> null', [0])->get();
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
        $dato = ModalidadCar::create ([
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
        $data = ModalidadCar::find($id);
        return view('admin.modCarrera.edit', ["data"=>$data]);
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
        $data=ModalidadCar::find($id);
        $data->etiqueta=$request->input('etiqueta');
        $data->save();
        return redirect('/admin/modCarrera/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $MdalidadCarrera=ModalidadCar::find($id);
        $MdalidadCarrera->delete();
        return redirect('/admin/modCarrera/');
    }

    public function restaurar($id)
    {
        $datos=ModalidadCar::onlyTrashed()->find($id)->restore();
        return redirect('/admin/modCarrera/');
    }
}
