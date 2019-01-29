<?php

namespace App\Http\Controllers;

use App\SectorEconomico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecEcoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SectorEconomico::All();
        return view('admin.sectorEcon.index',['data' => $data]);
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
    public function store(Request $request)
    {
        $id = SectorEconomico::All();
        $next = count($id);
        if($next < 1)
            $next = 1;
        else
            $next += 1;
        $dato = SectorEconomico::create([
            'id' => $next,
            'etiqueta' => strtoupper($request->input('etiqueta')),
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
        $data = SectorEconomico::find($id);
        return view('admin.sectorEcon.edit', ["data"=>$data]);
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
        $data = SectorEconomico::find($id);
        $data->etiqueta=$request->input('etiqueta');
        $data->id_usu_mod = Auth::user()->id;
        $data->save();
        return redirect('/admin/sectorEcon/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
