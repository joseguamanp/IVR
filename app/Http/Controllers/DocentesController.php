<?php

namespace App\Http\Controllers;

use App\Cantones;
use App\CargoDirectivo;
use App\DocenteInfoBecaModel;
use App\DocenteInfoPerModel;
use App\DocenteInfoAcadModelo;
use App\DocenteTiempo;
use App\EscalafonDocente;
use App\estadocivil;
use App\Etnia;
use App\genero;
use App\Nacionalidad;
use App\NivForDoce;
use App\Provincias;
use App\RelacionLaboralIess;
use App\sexo;
use App\TipoBeca;
use App\tipoDiscapacidad;
use App\tipodocumento;
use App\TipoEnfCast;
use App\TipoFinanciamiento;
use App\TipoSangre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //jorsy
        $tipDoc = tipodocumento::all();
        $sexo = sexo::all();
        $gen = genero::all();
        $etni = Etnia::all();
        $estCiv = estadocivil::all();
        $naci = Nacionalidad::all();
        $prov = Provincias::all();
        $canton = Cantones::all();
        $tipSan = TipoSangre::all();
        $tipoDis = tipoDiscapacidad::all();
        $tipoEnfCat = TipoEnfCast::all();

        //leyner
        $tipBec = TipoBeca::all();
        $tipFina = TipoFinanciamiento::all();

        //joel
        $nivFor = NivForDoce::all();
        $reLab = RelacionLaboralIess::all();
        $escDoc = EscalafonDocente::all();
        $cargo = CargoDirectivo::all();
        $tiempo = DocenteTiempo::all();

        return view('docentes.main.index',compact('nivFor', 'reLab', 'escDoc','cargo',
                                                           'carrera','jornada','tipo','nivel','paralelo',
                                                           'tipDoc','sexo','gen','etni','tipSan','estCiv','naci',
                                                           'prov','canton','tipoDis','tipoEnfCat',
                                                           'tipBec','tipFina','tiempo'));
    }

    //guardar datos
    //Información Personal
    public function saveInfoPer(Request $request){
        $ver = DocenteInfoPerModel::where('numIdentificacion','=',$request->cedula)->count();
        var_dump($ver);
        if ($ver > 0){
            $doce = DB::table('acad_doce_infpersonal')->where('numIdentificacion',$request->cedula)->get();
            $datos = DocenteInfoPerModel::find($doce[0]->id);
        }else{
            $datos = new DocenteInfoPerModel();
            $datos->numIdentificacion = $request->cedula;
        }
        $datos->sexo = $request->sexo;
        $datos->genero = $request->genero;
        $datos->primerApellido = $request->primerApellido;
        $datos->segundoApellido = $request->segundoApellido;
        $datos->primerNombre = $request->primerNombre;
        $datos->segundoNombre = $request->segundoNombre;
        $datos->correo = $request->correo;
        $datos->numCelular = $request->numCelular;
        $datos->numDomicilio = $request->numDomicilio;
        $datos->dirDomiciliaria = $request->dirDomiciliaria;
        $datos->codPostal = $request->codPostal;
        $datos->contEmer = $request->contEmer;
        $datos->parent = $request->parent;
        $datos->nroCont = $request->nroCont;
        $datos->etnia = $request->etnia;
        $datos->nomIdi = $request->nomIdi;
        $datos->fec_nac = $request->fec_nac;
        $datos->tipoSangre = $request->tipoSangre;
        $datos->pais = $request->pais;
        $datos->provincias = $request->provincias;
        $datos->canton = $request->canton;
        $datos->catMigratoria = $request->catMigratoria;
        $datos->paisResi = $request->paisResi;
        $datos->provResi = $request->provResi;
        $datos->cantResi = $request->cantResi;
        $datos->estCivil = $request->estCivil;
        $datos->porDis = $request->porDis;
        $datos->nroCona =  $request->nroCona;
        $datos->tipoDiscapacidad = $request->tipoDiscapacidad;
        $datos->tipoEnfeCatas = $request->tipoEnfeCatas;
        $datos->save();
        return redirect('/docentes/main')->with('status', 'Registro Exitoso');
    }

    //Información Academica y Laboral
    public function saveInfAcada (Request $request){
        $ver = DocenteInfoAcadModelo::where('numDocumento','=',$request->cedula)->count();
        //var_dump($ver); exit();
        if ($request->realizoPub === 'SELECCIONE')
            $request->realizoPub = '';
        if($ver > 0) {
            $doce = DB::table('acad_doce_infacademica')->where('numDocumento',$request->cedula)->get();
            $data = DocenteInfoAcadModelo::find($doce[0]->id);
        }else{
            $data = new DocenteInfoAcadModelo();
            $data->numDocumento = $request->cedula;
        }
        $data->nivelForm = $request->nivelForm;
        $data->fecha_ing = $request->fecha_ing;
        $data->fecha_sal = $request->fecha_sal;
        $data->relacionLab = $request->relacionLab;
        $data->ingresoIns = $request->ingresoIns;
        $data->escaDocen = $request->escaDocen;
        $data->cargoDirectivo = $request->cargoDirectivo;
        $data->tiempoDedi = $request->tiempoDedi;
        $data->numAsignaturas = $request->numAsignaturas;
        $data->docSuperior = $request->docSuperior;
        $data->cursaEstSup = $request->cursaEstSup;
        $data->nombreInst = $request->nombreInst;
        $data->save();
        return redirect('/docentes/main');
    }

    //Información Beca
    public function saveInfoBeca(Request $request){
        $ver = DocenteInfoBecaModel::where('cedula','=',$request->cedula)->count();
        //var_dump($ver); exit();
        if ($request->realizoPub === 'SELECCIONE')
            $request->realizoPub = '';
        if($ver > 0) {
            $doce = DB::table('acad_docente_inf_beca')->where('cedula',$request->cedula)->get();
            $datos = DocenteInfoBecaModel::find($doce[0]->id);
            //echo $doce[0]->id; exit();
        }else{
            $datos = new DocenteInfoBecaModel();
            $datos->cedula = $request->cedula;
            $this->verificarBeca($request,$datos);
            //var_dump($ver); exit();
        }
            $datos->poseeBeca = $request->poseeBeca;
            $datos->tipoBeca = $request->tipoBeca;
            $datos->valorBeca = $request->valorBeca;
            $datos->tipoFina = $request->tipoFina;
            $datos->realizoPub = $request->realizoPub;
            $datos->nroPub = $request->nroPub;
            $datos->save();
        return redirect('/docentes/main')->with('status', 'Registro Exitoso');
    }

    public function verificarBeca(Request $request, DocenteInfoBecaModel $datos){
        if($request->poseeBeca === 'NO'){
            $datos->tipoBeca = '';
            $datos->valorBeca = '';
            $datos->tipoFina = '';
            $datos->realizoPub = '';
            $datos->nroPub = '';
        }
    }


    public function getProvincias(Request $request){
        $data = Provincias::where('id_pais',$request->all())->get();
        // return $data->toJson(JSON_PRETTY_PRINT);
        return response()->json($data);
    }

    public function getCantones(Request $request){
        $data = DB::table('sene_cantones')
            ->join('sene_provincias_has_sene_cantones','sene_provincias_has_sene_cantones.sene_cantones_id','=', 'sene_cantones.id')
            ->join('sene_provincias','sene_provincias.id','=','sene_provincias_has_sene_cantones.sene_provincias_id')
            ->select('sene_cantones.*')
            ->where('sene_provincias.id','=',$request->id)
            //->where(strtoupper('sene_provincias.etiqueta'),'=',strtoupper($request->input('id')))
            ->get();
        return response()->json($data);
    }
}
