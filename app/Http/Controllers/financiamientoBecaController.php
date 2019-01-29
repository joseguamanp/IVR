<?php

namespace App\Http\Controllers;

use App\FinanciamientoBeca;
use App\Http\Requests\FinanciamientoBecaRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class financiamientoBecaController extends Controller
{
    public function index()
    {
        $datos = FinanciamientoBeca::withTrashed()->get();
        return view('admin.financiamientobeca.index',['finanBeca'=>$datos]);
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
    public function store(FinanciamientoBecaRequest $request)
    {        
        $id = FinanciamientoBeca::All();
        $next = count($id);
        if($next == 0)
            $next = 1;
        $next++;
        $dato = FinanciamientoBeca::create ([
            'id' => $next,
            'etiqueta'=> strtoupper($request->input('etiqueta')),
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
        $finanBeca = FinanciamientoBeca::find($id);
        return view('admin.financiamientobeca.edit',['editarfinanbeca'=>$finanBeca]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FinanciamientoBecaRequest $request, $id)
    {
        $finanBeca = FinanciamientoBeca::find($id);
        $finanBeca->etiqueta = strtoupper($request->input('etiqueta'));
        $finanBeca->save();
        return redirect('/admin/financiamientobeca/'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finanBeca=FinanciamientoBeca::find($id);
        $finanBeca->delete();
        return redirect('/admin/financiamientobeca/');
    }

     public function restaurar($id)
    {
        $datos=FinanciamientoBeca::onlyTrashed()->find($id)->restore();
        return redirect('/admin/financiamientobeca/');
    }
}
