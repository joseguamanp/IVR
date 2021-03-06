<?php

namespace App\Http\Controllers\admin\datosidentificacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SexoRequest;
use App\sexo;
use Illuminate\Support\Facades\Auth;
class SexoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
        $datos = sexo::withTrashed()->get();
        return view('admin.listasenescyt.datosidentificacion.createsexo',['datos'=>$datos]);
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
    public function store(SexoRequest $request)
    {
        $dato=sexo::All();
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
        $base=sexo::create([
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
        $datosid = sexo::find($id);
        return view('admin.listasenescyt.datosidentificacion.editsexo',['editaret'=>$datosid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SexoRequest $request, $id)
    {
        $datoset = sexo::find($id);
        $datoset->etiqueta = strtoupper($request->input('etiqueta'));
        $datoset->save();
        return redirect('/admin/sexo/');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datoset=sexo::find($id);
        $datoset->delete();
        return redirect('/admin/sexo/');
    }
    public function restaurar($id)
    {
        $datos=sexo::onlyTrashed()->find($id)->restore();
        return redirect('/admin/sexo/');
    }
}
