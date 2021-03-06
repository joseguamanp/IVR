<?php

namespace App\Http\Controllers\admin\mant_academico;

use Illuminate\Http\Request;
use App\AcadCarreraCoordinador;
use App\DocenteInfoPerModel;
use App\Carreras;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AcadCarreraCoordinadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->getData();
        $acad = AcadCarreraCoordinador::withTrashed()->get();
        return view('admin.acadCarreraCoordinador.index',['data' =>$data, 'acad' =>$acad]);
    }

    public function getData(){ 

        return $arrayName=array(
                                'carreras' => Carreras::All(),                                
                                'AcadDoceInfoPersonal' => DocenteInfoPerModel::All(),
                                );
    }

    /*public function AcadCarreraCoordinador(Request $request)
    {
        $data=AcadCarreraCoordinador::create($request->all());
        return redict('/admin/academicoCarreraCoordinador');
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=AcadCarreraCoordinador::create($request->all());
        return redirect('/admin/academicoCarreraCoordinador');
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
        $data = AcadCarreraCoordinador::find($id);
        $carrera = Carreras::All();
        $docente = DocenteInfoPerModel::All();
        return view('admin.acadCarreraCoordinador.edit',["data" => $data, "carrera" => $carrera, "docente" => $docente]);
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
        $data=AcadCarreraCoordinador::find($id);
        $data->id_carrera=$request->input('id_carrera');
        $data->id_docente=$request->input('id_docente');
        $data->save();
        return redirect('/admin/academicoCarreraCoordinador/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=AcadCarreraCoordinador::find($id);
        $data->delete();
         return redirect('/admin/academicoCarreraCoordinador/');
    }
    public function restaurar($id)
    {
        $data=AcadCarreraCoordinador::onlyTrashed()->find($id)->restore();
        return redirect('/admin/academicoCarreraCoordinador/');
    }
}
