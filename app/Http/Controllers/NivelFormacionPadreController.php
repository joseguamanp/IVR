<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\NivelFormacionPadre;
use App\Http\Requests\NivelFormacionPadreRequest;

class NivelFormacionPadreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = NivelFormacionPadre::All();
        $data = NivelFormacionPadre::withTrashed()->get();
        return view('admin.nivelFormacionPadre.index', ['data' =>$data] );
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

    public  function calcularId(){

        $registros = NivelFormacionPadre::All();

        $max_valor = count($registros);


        if($max_valor > 0){

            $max_valor++;

        } else {

            $max_valor = 1;
        }

        return $max_valor;

    }

    public function store(NivelFormacionPadreRequest $request)
    {
        $id = $this->calcularId();
       
        $etiqueta = strtoupper($request->input('etiqueta'));
        $id_usu_cre = Auth::user()->id;

        NivelFormacionPadre::create([

            'id' => $id, 
            'etiqueta' => $etiqueta,
            'id_usu_cre' => $id_usu_cre,

        ]);

        return redirect('admin/formacionpadre');
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
        $data = NivelFormacionPadre::find($id);
        return view('admin.nivelFormacionPadre.edit', ["data"=>$data]);
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
        $data=NivelFormacionPadre::find($id);
        $data->etiqueta=strtoupper($request->input('etiqueta'));
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/formacionpadre/');
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
