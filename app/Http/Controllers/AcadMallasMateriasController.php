<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcadMallasMateriasModel;
use App\AcademicoMalla;
use App\MateriasModel;
use App\NivAcademico;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AcadMallasMateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('acad_mallas_materias')
            ->join('acad_mallas', 'acad_mallas.id', '=', 'acad_mallas_materias.id_malla')
            ->join('acad_materias', 'acad_materias.id', '=', 'acad_mallas_materias.id_materia')
            ->join('sene_nivelacademicocurso', 'sene_nivelacademicocurso.id', '=', 'acad_mallas_materias.id_nivel')
            ->select('acad_mallas_materias.*', 'acad_materias.nombre_materia', 'acad_mallas.nombre_malla','sene_nivelacademicocurso.etiqueta')
            ->get();
        return view('admin.AcadMallasMaterias.vista',['data' =>$data]);
    }

    public function getdatos()
    {
        $decision=array('SI','NO');
    	return $getdatos=array('malla' =>AcademicoMalla::all(),
    				    'materia'=>MateriasModel::all(),
    				    'nivel'=>NivAcademico::all(),
                        'decision'=>$decision);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getdatos=$this->getdatos();
        return view('admin.AcadMallasMaterias.index',['getdatos' =>$getdatos]);
    }

    public function getId(){
        $id = AcadMallasMateriasModel::All();
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
            AcadMallasMateriasModel::create ([
            'id' => $id,
            'id_malla'=>$request->input('id_malla'),
            'id_materia'=>$request->input('id_materia'),
            'id_nivel'=>$request->input('id_nivel'),
            'optativa_sn'=>$request->input('optativa_sn'),
            'num_horas_semanas'=>$request->input('num_horas_semanas'),
            'num_horas_totales'=>$request->input('num_horas_totales'),
            'num_creditos'=>$request->input('num_creditos'),
            'observacion'=>$request->input('observacion'),
            'id_usu_cre'=>$id_usu_cre,
        ]);

        return redirect('/admin/MallasMaterias');
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
        $data = AcadMallasMateriasModel::find($id);
        return view('admin.AcadMallasMaterias.edit', ["data"=>$data,'getdatos' =>$getdatos]);
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
        $data=AcadMallasMateriasModel::find($id);
        $data->id_malla=$request->input('id_malla');
        $data->id_materia=$request->input('id_materia');
        $data->id_nivel=$request->input('id_nivel');
        $data->optativa_sn=$request->input('optativa_sn');
        $data->num_horas_semanas=$request->input('num_horas_semanas');
        $data->num_horas_totales=$request->input('num_horas_totales');
        $data->num_creditos=$request->input('num_creditos');
        $data->observacion=$request->input('observacion');
        $data->save();
        return redirect('/admin/MallasMaterias/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=AcadMallasMateriasModel::find($id);
        $data->delete();
         return redirect('/admin/MallasMaterias/');
    }

    public function restaurar($id)
    {
        $datos=AcadMallasMateriasModel::onlyTrashed()->find($id)->restore();
        return redirect('/admin/MallasMaterias/');
    }
}
