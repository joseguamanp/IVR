<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Areas_Materias;
use Illuminate\Support\Facades\Auth;

class AreasMateriasController extends Controller
{
    public function index()
    {
        $data = Areas_Materias::withTrashed()->get();
        return view('admin.Areas_Materias.index',['data' =>$data] );
       
    }

 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getdatos=$this->getdatos();
        return view('admin.Areas_Materias.index',['getdatos' =>$getdatos]);
    }
    public function getId(){
        $id = Areas_Materias::all();
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
            $dato = Areas_Materias::create ([
            'id' => $id,
            'nombre_area'=>$request->input('etiqueta'),
            'descripción'=>$request->input('descripción'),
            'id_usu_cre' => $id_usu_cre,
            
        ]);

        return redirect('/admin/Areas_Materias');
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
        $data = Areas_Materias::find($id);
        return view('admin.Areas_Materias.edit', ["data"=>$data]);
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
        $data=Areas_Materias::find($id);
        $data->nombre_area=$request->input('etiqueta');
        $data->descripción=$request->input('descripción');
        $data->save();
        return redirect('/admin/Areas_Materias/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vinculacionSociedad=Areas_Materias::find($id);
        $vinculacionSociedad->delete();
        return redirect('/admin/Areas_Materias/');
    }
    
    public function restaurar($id)
    {
        $datos=Areas_Materias::onlyTrashed()->find($id)->restore();
        return redirect('/admin/Areas_Materias/');
    }
}
