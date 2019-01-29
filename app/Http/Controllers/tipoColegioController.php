<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipoColegio;
use Illuminate\Support\Facades\Auth;
class tipoColegioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tipoColegio::withTrashed()->get();
        return view('admin.tipoColegio.index',['data' =>$data] );
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
    public function getId(){
        $id = tipoColegio::all();
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
            $dato = tipoColegio::create ([
            'id' => $id,
            'etiqueta'=> strtoupper($request->input('etiqueta')),
            'id_usu_cre' => $id_usu_cre,
            
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
        $data = tipoColegio::find($id);
        return view('admin.tipoColegio.edit', ["data"=>$data]);
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
        $data=tipoColegio::find($id);
        $data->etiqueta=$request->input('etiqueta');
        $data->save();
        return redirect('/admin/tipoColegio/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vinculacionSociedad=tipoColegio::find($id);
        $vinculacionSociedad->delete();
        return redirect('/admin/tipoColegio/');
    }
    
    public function restaurar($id)
    {
        $datos=tipoColegio::onlyTrashed()->find($id)->restore();
        return redirect('/admin/tipoColegio/');
    }
}
