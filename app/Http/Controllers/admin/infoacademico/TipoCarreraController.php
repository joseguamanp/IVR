<?php

namespace App\Http\Controllers\admin\infoacademico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TipoCarrera;
use App\Http\Requests\TipocarreraRequest;
class TipoCarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TipoCarrera::withTrashed()->get();
        return view('admin.tipocarrera.index',['data' =>$data] );
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
        $id = TipoCarrera::withTrashed()->get();
        $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }

    public function store(TipocarreraRequest $request)
    {
        //$id=Auth::user()->id;
        $dato = TipoCarrera::create ([
            'id' => $this->getId(),
            'etiqueta'=> strtoupper($request->input('etiqueta'))
        ]);
        return redirect("/admin/tipocarrera");
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
        $data = TipoCarrera::find($id);
        return view('admin.tipocarrera.edit', ["data"=>$data]);
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
        $data=TipoCarrera::find($id);
        $data->etiqueta= strtoupper($request->input('etiqueta'));
        $data->save();
        return redirect('/admin/tipocarrera/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $EstudianteOcupacion=TipoCarrera::find($id);
        $EstudianteOcupacion->delete();
        return redirect('/admin/tipocarrera/');
    }

    public function restaurar($id)
    {
        $datos=TipoCarrera::onlyTrashed()->find($id)->restore();
        return redirect('/admin/tipocarrera/');
    }
}
