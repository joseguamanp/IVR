<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MateriasModel;
use App\Areas_Materias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_area = Areas_Materias::withTrashed()->get();
        $data = MateriasModel::withTrashed()->get();
        //dd($data); exit();
        return view('admin.materias.index',['dataA' => $id_area,'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getdatos=$this->getdatos();
        return view('admin.materias.index',['getdatos' =>$getdatos]);
    }

    public function getId(){
        $id = MateriasModel::withTrashed()->get();
        $next = count($id);
        if($next > 0){
            $next+=1;
        }else
            $next =1;
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
            $id_usu_cre = Auth::user()->id;
            $id = $this->getId();
            //dd($request->all()); exit();
            MateriasModel::create ([
            'id' => $id,
            'nombre_materia'=>$request->input('etiqueta'),
            'id_area_materia'=>$request->input('id_area_materia'),
            'descripcion' =>$request->input('descripcion'),
            'id_usu_cre'=>$id_usu_cre,
        ]);

        return redirect('/admin/materias');
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
        $mat = MateriasModel::find($id);
        //dd($data->id_area_materia); exit();
        $id_area_mat = $mat->id;
        $data = DB::table('acad_materias')
                    ->join('acad_areas_materias','acad_areas_materias.id','=','acad_materias.id_area_materia')
                    ->select('acad_materias.*','acad_areas_materias.nombre_area')
                    ->where('acad_materias.id','=',$id_area_mat)
                    ->get();
        //dd($data);exit();
        $areas =  Areas_Materias::all();
        return view('admin.materias.edit', ["data"=>$data, 'area' => $areas]);
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
        //dd($request->input('etiqueta'));exit();
        $data=MateriasModel::find($id);
        $data->nombre_materia= $request->input('etiqueta');
        $data->id_area_materia = $request->input('id_area_materia');
        $data->descripcion =  $request->input('descripcion');
        $data->save();
        return redirect('/admin/materias/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=MateriasModel::find($id);
        $data->delete();
         return redirect('/admin/materias/');
    }

    public function restaurar($id)
    {
        $datos=MateriasModel::onlyTrashed()->find($id)->restore();
        return redirect('/admin/materias/');
    }
}
