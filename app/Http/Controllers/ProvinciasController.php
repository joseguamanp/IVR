<?php

namespace App\Http\Controllers;
use App\Http\Requests\PaisesRequest;
use App\Provincias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProvinciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Pais::withTrashed()->get();
        $data = Provincias::All();
        return view('admin.provincias.index', ['data' =>$data] );
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
        $id = Provincias::All();
        if(next($id) > 0){
            $id += 1;
        }else return 1;
        return $id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(PaisesRequest $request)
    {
        $dato = Provincias::create ([
            'id' => $this->getId(),
            'etiqueta'=> strtoupper($request->input('etiqueta')),
            'id_usu_cre' => Auth::user()->id,
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
        $data = Provincias::find($id);
        return view('admin.provincias.edit', ["data"=>$data]);
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
        $data=Provincias::find($id);
        $data->etiqueta=$request->input('etiqueta');
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/provincias/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nivelFormacion=NivelFormacionPadre::find($id);
        $nivelFormacion->delete();
        return redirect('/admin/formacionpadre/');
    }

    public function restaurar($id)
    {
        $datos=NivelFormacionPadre::onlyTrashed()->find($id)->restore();
        return redirect('/admin/formacionpadre/');
    }
}
