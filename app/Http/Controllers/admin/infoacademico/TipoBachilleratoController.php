<?php

namespace App\Http\Controllers\admin\infoacademico;

use App\TipoBachillerato;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TipoBachilleratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TipoBachillerato::withTrashed()->get();
        return view('admin.tipobachillerato.index',['data' =>$data] );
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
        $id = TipoBachillerato::withTrashed()->get();
        $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }

    public function store(Request $request)
    {
        //$id=Auth::user()->id;
        $dato = TipoBachillerato::create ([
            'id' => $this->getId(),
            'etiqueta'=> strtoupper($request->input('etiqueta'))
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
        $data = TipoBachillerato::find($id);
        return view('admin.tipobachillerato.edit', ["data"=>$data]);
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
        $data=TipoBachillerato::find($id);
        $data->etiqueta= strtoupper($request->input('etiqueta'));
        $data->save();
        return redirect('/admin/tipobachillerato/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $EstudianteOcupacion=TipoBachillerato::find($id);
        $EstudianteOcupacion->delete();
        return redirect('/admin/tipobachillerato/');
    }

    public function restaurar($id)
    {
        $datos=TipoBachillerato::onlyTrashed()->find($id)->restore();
        return redirect('/admin/tipobachillerato/');
    }
}
