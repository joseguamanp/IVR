<?php

namespace App\Http\Controllers\admin\datosidentificacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstadocivilRequest;
use App\estadocivil;

class estadocivilController extends Controller
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
        $datos = estadocivil::withTrashed()->get();
        return view('admin.listasenescyt.datosidentificacion.estadocivil',['datos'=>$datos]);
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
    public function validarId($id,$etiqueta){
        estadocivil::create([
            'id'=>$id,
            'etiqueta'=>strtoupper($etiqueta),            
            ]);
    }
    public function store(EstadocivilRequest $request)
    {        
        $data = estadocivil::All();
        $valor=count($data);
        $etiqueta = $request->input('etiqueta');
        if($valor > 0){
            $valor++;
            $this->validarId($valor,$etiqueta); 
        }else{
            $valor=1;
            $this->validarId($valor, $etiqueta);
        }
        
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
        $datosid = estadocivil::find($id);
        return view('admin.listasenescyt.datosidentificacion.editestadocivil',['editaret'=>$datosid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstadocivilRequest $request, $id)
    {
        $datoset = estadocivil::find($id);
        /*$datoset->sexo = strtoupper($request->input('sexo'));
        $datoset->genero = strtoupper($request->input('genero'));*/
        $datoset->etiqueta = strtoupper($request->input('etiqueta'));        
        $datoset->save();
        return redirect('/admin/estadocivil/'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datoset=estadocivil::find($id);
        $datoset->delete();
        return redirect('/admin/estadocivil/');
    }
    public function restaurar($id)
    {
        $datos=estadocivil::onlyTrashed()->find($id)->restore();
        return redirect('/admin/estadocivil/');
    }
}
