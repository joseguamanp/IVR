<?php

namespace App\Http\Controllers\admin\datosidentificacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GeneroRequest;
use App\genero;
class generoController extends Controller
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
        $datos = genero::withTrashed()->get();
        return view('admin.listasenescyt.datosidentificacion.genero',['datos'=>$datos]);
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
        genero::create([
            'id'=>$id,
            'etiqueta'=>strtoupper($etiqueta),            
            ]);
    }
    public function store(GeneroRequest $request)
    {
        $data = genero::All();
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
        $datosid = genero::find($id);
        return view('admin.listasenescyt.datosidentificacion.generoedit',['editaret'=>$datosid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GeneroRequest $request, $id)
    {
        $datoset = genero::find($id);
        $datoset->etiqueta = strtoupper($request->input('etiqueta'));
        /*$datoset->sexo = strtoupper($request->input('sexo'));
        
        $datoset->etiqueta = strtoupper($request->input('etiqueta'));   */     
        $datoset->save();
        return redirect('/admin/genero/'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datoset=genero::find($id);
        $datoset->delete();
        return redirect('/admin/genero/');
    }
    public function restaurar($id)
    {
        $datos=genero::onlyTrashed()->find($id)->restore();
        return redirect('/admin/genero/');
    }
}
