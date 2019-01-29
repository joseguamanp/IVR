<?php
namespace App\Http\Controllers;
use App\Carreras;
use App\AcademicoMalla;
use App\MallasCarrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MallasCarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('acad_mallas_carrera')
            ->join('acad_mallas', 'acad_mallas.id', '=', 'acad_mallas_carrera.id_malla')
            ->join('acad_carrera', 'acad_carrera.id', '=', 'acad_mallas_carrera.id_carrera')
            ->select('acad_mallas_carrera.*','acad_mallas.nombre_malla','acad_carrera.nombreCarrera')
            ->get();
        $getdats = $this->getdatos();
        //dd($data);exit();
        return view('admin.mallasCarrera.index',['data' =>$data,'getdato' => $getdats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getId(){
        $id = MallasCarrera::whereRaw('id > ? or deleted_at <> null', [0])->get();
        $next = count($id);
        if($next > 0 ){
            $next+=1;
        }else
            $next =1;
        return $next;
    }

    public function getdatos()
    {
        $decision=array('SI','NO');
        return $getdato=array('mall' =>AcademicoMalla::all(),
            'carrera'=>Carreras::all(),
            'decision'=>$decision);
    }

    public function create()
    {
        $getdatos=$this->getdatos();
        return view('admin.mallasCarrera.index1',['getdato' =>$getdatos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //dd($request->all()); exit();
            $id_usu_cre = Auth::user()->id;
            $id = $this->getId();
            MallasCarrera::create ([
                'id' => $id,
                'id_malla'=>$request->input('id_malla'),
                'id_carrera'=>$request->input('id_carrera'),
                'id_usu_cre' => $this->getId(),
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
        $getdato=$this->getdatos();
        $data = MallasCarrera::find($id);
        return view('admin.mallasCarrera.edit', ["data"=>$data, 'getdato' =>$getdato]);
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
        $data=MallasCarrera::find($id);
        $data->id_malla=$request->input('id_malla');
        $data->id_carrera=$request->input('id_carrera');
        $data->save();
        return redirect('/admin/mallasCarrera/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $JornadaCarrera=MallasCarrera::find($id);
        $JornadaCarrera->delete();
        return redirect('/admin/mallasCarrera/');
    }

    public function restaurar($id)
    {
        $datos=MallasCarrera::onlyTrashed()->find($id)->restore();
        return redirect('/admin/mallasCarrera/');
    }
}
