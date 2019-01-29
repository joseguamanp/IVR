<?php

namespace App\Http\Controllers\admin\datosidentificacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EtniaRequest;
use App\Etnia;
use Illuminate\Support\Facades\Auth;
class etniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
        $datos = Etnia::withTrashed()->get();
        return view('admin.listasenescyt.datosidentificacion.createetnia',['datos'=>$datos]);
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
    public function store(EtniaRequest $request)
    {
        $dato=Etnia::All();
        $contar=count($dato);
        $valor=strtoupper($request->input('etiqueta'));
        if ($contar > 0) {   
            $contar++; 
            $this->validar($valor,$contar);
        }else{
            $contar=1; 
            $this->validar($valor,$contar);
        }
        
        return $this->index();
    }
    public function validar($valor,$contar)
    {
        //$id_user=Auth::user()->id;
        $base=Etnia::create([
                'id'=>$contar,
                'etiqueta'=>$valor,
            ]); 
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
        $datosid = Etnia::find($id);
        return view('admin.listasenescyt.datosidentificacion.editaretnia',['editaret'=>$datosid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EtniaRequest $request, $id)
    {
        $datoset = Etnia::find($id);
        $datoset->etiqueta = strtoupper($request->input('etiqueta'));
        $datoset->save();
        return redirect('/admin/datosetnia/');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datoset=Etnia::find($id);
        $datoset->delete();
        return redirect('/admin/datosetnia/');
    }
    public function restaurar($id)
    {
        $datos=Etnia::onlyTrashed()->find($id)->restore();
        return redirect('/admin/datosetnia/');
    }
}
