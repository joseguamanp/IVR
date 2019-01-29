<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParaleloSeneJornadaCarreraModel;
use App\JornadaCar;
use App\Carreras;
use App\AcadSedes;
use App\ParaleloAcad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ParaleloSeneJornadaCarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getdatos=$this->getdatos();
        return view('admin.pa_se_jor_car.index',['getdatos'=>$getdatos]);
    }

   public function getdatos()
    {
    	return $getdatos=array('carrera' =>Carreras::all(),
    				    'sedes'=>AcadSedes::all(),
    				    'jornada'=>JornadaCar::all(),
                        'paralelo'=>ParaleloAcad::all());
    }
    public function vistatabla()
    {
            $data = DB::table('acad_paralelos_sede_jornada_carrera')
            ->join('acad_carrera','acad_carrera.id','=','acad_paralelos_sede_jornada_carrera.id_carrera')
            ->join('acad_sedes','acad_sedes.id','=','acad_paralelos_sede_jornada_carrera.id_sede')
            ->join('sene_jornadacarrera', 'sene_jornadacarrera.id','=', 'acad_paralelos_sede_jornada_carrera.id_jornada')
            ->join('acad_paralelos','acad_paralelos.id','=', 'acad_paralelos_sede_jornada_carrera.id_paralelo')
            ->select('acad_paralelos_sede_jornada_carrera.*', 'acad_carrera.nombreCarrera', 'acad_sedes.nombre_sede','sene_jornadacarrera.etiqueta','acad_paralelos.nombre_paralelo')
            ->get();
            return response()->json(
            $data->toArray()
            );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$getdatos=$this->getdatos();
        //return view('admin.AcadMallasMaterias.index',['getdatos' =>$getdatos]);
    }

    public function getId(){
        $id = ParaleloSeneJornadaCarreraModel::withTrashed()->get();
        $next = count($id);
        if($next > 0){
            $next+=1;
        }else
            $next =1;
        return $next;
    }
    public function store(Request $request)
    {
            $id_usu_cre = Auth::user()->id;
            $id = $this->getId();
            ParaleloSeneJornadaCarreraModel::create ([
            'id' => $id,
            'id_carrera'=>$request->input('id_carrera'),
            'id_sede'=>$request->input('id_sede'),
            'id_jornada'=>$request->input('id_jornada'),
            'id_paralelo'=>$request->input('id_paralelo'),
            'id_usu_cre'=>$id_usu_cre,
        ]);
        $data = DB::table('acad_paralelos_sede_jornada_carrera')
            ->join('acad_carrera','acad_carrera.id','=','acad_paralelos_sede_jornada_carrera.id_carrera')
            ->join('acad_sedes','acad_sedes.id','=','acad_paralelos_sede_jornada_carrera.id_sede')
            ->join('sene_jornadacarrera', 'sene_jornadacarrera.id','=', 'acad_paralelos_sede_jornada_carrera.id_jornada')
            ->join('acad_paralelos','acad_paralelos.id','=', 'acad_paralelos_sede_jornada_carrera.id_paralelo')
            ->select('acad_paralelos_sede_jornada_carrera.*', 'acad_carrera.nombreCarrera', 'acad_sedes.nombre_sede','sene_jornadacarrera.etiqueta','acad_paralelos.nombre_paralelo')
            ->get();
        return response()->json(
            $data->toArray()
        );
        //return redirect('/admin/asignacion');
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
        $getdatos=$this->getdatos();
        $data = ParaleloSeneJornadaCarreraModel::find($id);
        return view('admin.pa_se_jor_car.edit', ["data"=>$data,'getdatos' =>$getdatos]);
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
        $data=ParaleloSeneJornadaCarreraModel::find($id);
        $data->id_carrera=$request->input('id_carrera');
        $data->id_sede=$request->input('id_sede');
        $data->id_jornada=$request->input('id_jornada');
        $data->id_paralelo=$request->input('id_paralelo');
        $data->save();
        return redirect('/admin/asignacion/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=ParaleloSeneJornadaCarreraModel::find($id);
        $data->delete();
        return response()->json(["mensaje eliminado"]);
    }

    public function restaurar($id)
    {
        $datos=ParaleloSeneJornadaCarreraModel::onlyTrashed()->find($id)->restore();
         return response()->json(["mensaje restaurar"]);
    }
}
