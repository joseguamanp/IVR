<?php

namespace App\Http\Controllers;

use App\PerGratuidad;
use Illuminate\Http\Request;

class PerdidaGraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PerGratuidad::withTrashed()->get();
        return view('admin.perdidaGra.index', ['data' =>$data] );
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

    public function getId(){
        $id = PerGratuidad::whereRaw('id > ? or deleted_at <> null', [0])->get();
        $next = count($id);
        $next += 1;
        if($next < 0)
            return 1;
        return $next;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dato = PerGratuidad::create ([
            'id' => $this->getId(),
            'etiqueta'=> strtoupper($request->input('etiqueta')),
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
        $data = PerGratuidad::find($id);
        return view('admin.perdidaGra.edit', ["data"=>$data]);
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
        $data=PerGratuidad::find($id);
        $data->etiqueta=$request->input('etiqueta');
        $data->save();
        return redirect('/admin/perdidaGra/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PerdidaGratuidad=PerGratuidad::find($id);
        $PerdidaGratuidad->delete();
        return redirect('/admin/perdidaGra/');
    }

    public function restaurar($id)
    {
        $datos=PerGratuidad::onlyTrashed()->find($id)->restore();
        return redirect('/admin/perdidaGra/');
    }
}
