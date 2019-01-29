<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
//administrador
	//admin rol
	Route::Resource('/admin/rol','RolesController');
	Route::get('/admin/rol/{id}/restaurar','RolesController@restaurar');
	//admin usuario
	Route::Resource('/admin/usuario','UsuarioController');
	Route::get('/admin/usuario/{id}/restaurar','UsuarioController@restaurar');
	//Route::post();
	//admin / opciones
	Route::Resource('/admin/opcion','OpcionController');
	Route::get('/admin/opcion/{id}/restaurar','OpcionController@restaurar');

	// admin vinculacion
	Route::Resource('/admin/vinculacion', 'VinculacionSociedadController');
	Route::get('/admin/vinculacion/{id}/restaurar','VinculacionSociedadController@restaurar');

	Route::Resource('admin/alcance','AlcanceProyectoVinculacionController');
	Route::get('/admin/alcance/{id}/restaurar','AlcanceProyectoVinculacionController@restaurar');

	Route::Resource('admin/formacionpadre','NivelFormacionPadreController');
	Route::get('/admin/formacionpadre/{id}/restaurar','NivelFormacionPadreController@restaurar');

	Route::Resource('admin/discapacidad','discapacidadcontroller');
	Route::get('/admin/discapacidad/{id}/restaurar','discapacidadcontroller@restaurar');

	Route::Resource('/admin/datostipodoc','admin\datosidentificacion\tipodocumentoController');  
	Route::get('/admin/datostipodoc/{id}/restaurar','admin\datosidentificacion\tipodocumentoController@restaurar');
	Route::get('/admin/datosetnia/{id}/restaurar','admin\datosidentificacion\etniaController@restaurar');
	Route::Resource('/admin/datosetnia','admin\datosidentificacion\etniaController');

	  Route::Resource('admin/tipoDiscapacidad','tipoDiscapacidadController');
	Route::get('/admin/tipoDiscapacidad/{id}/restaurar','tipoDiscapacidadController@restaurar');

        Route::Resource('admin/tipoColegio','tipoColegioController');
	Route::get('/admin/tipoColegio/{id}/restaurar','tipoColegioController@restaurar');


	//Sexo
	Route::Resource('admin/sexo','admin\datosidentificacion\sexoController');
	Route::get('/admin/sexo/{id}/restaurar','admin\datosidentificacion\sexoController@restaurar');

	//genero
	Route::Resource('admin/genero','admin\datosidentificacion\generoController');
	//estadocivil
	Route::Resource('admin/estadocivil','admin\datosidentificacion\estadocivilController');
	//formacion madre
	Route::Resource('admin/formacionmadre','NivelFormacionMadreController');

	// Bayron Mendoza
		//admin_MdalidadCarrear
	    Route::Resource('/admin/modCarrera','ModalidadCarController');
	    //admin_JornadaCarrear
	    Route::Resource('/admin/jornadaCarrera','JornadaCarController');
	    Route::get('/admin/jornadaCarrera/{id}/restaurar','JornadaCarController@restaurar');
	    //admin_TipoMatricula
	    Route::Resource('/admin/tipoMatricula','TipMatriculaController');
	    //admin_nivelAcademico
	    Route::Resource('/admin/nivelAcademico','NivAcademicoController');
	    //admin_Paralelo
	    Route::Resource('/admin/paralelo','ParaleloController');
	    //admin_EstudianteOcupación
	    //Route::Resource('/admin/estuOcup','EstuOcupController');
	    //Route::get('/admin/estuOcup/{id}/restaurar', 'estuOcup@restaurar');
	//Leyner
	    Route::Resource('/admin/perdidaGra','PerdidaGraController');
	     Route::get('/admin/perdidaGra/{id}/restaurar', 'PerdidaGraController@restaurar');
	    Route::Resource('/admin/popendi','PensionController');
		Route::Resource('/admin/EstudianteIngreso','IngresoEstudianteController');
		Route::get('/admin/EstudianteIngreso/{id}/restaurar', 'IngresoEstudianteController@restaurar');
		 Route::Resource('/admin/PoseePension','PensionController');
        Route::get('/admin/PoseePension/{id}/restaurar', 'PensionController@restaurar');
	// jorcy
        Route::Resource('/admin/financiamientobeca', 'financiamientoBecaController');
	    Route::get('/admin/financiamientobeca/{id}/restaurar','financiamientoBecaController@restaurar');
	    
		Route::Resource('/admin/tipobeca', 'TipoBecaController');
	    Route::get('/admin/tipobeca/{id}/restaurar','TipoBecaController@restaurar');

	    Route::Resource('/admin/razon6', 'RazonBecaController6');
	    Route::get('/admin/razon6/{id}/restaurar','RazonBecaController6@restaurar');

	    Route::Resource('/admin/razon5', 'RazonBecaController5');
	    Route::get('/admin/razon5/{id}/restaurar','RazonBecaController5@restaurar');

	    Route::Resource('/admin/razon4', 'RazonBecaController4');
	    Route::get('/admin/razon4/{id}/restaurar','RazonBecaController4@restaurar');

	    Route::Resource('/admin/razon3', 'RazonBecaController3');
	    Route::get('/admin/razon3/{id}/restaurar','RazonBecaController3@restaurar');

	    Route::Resource('/admin/razon2', 'RazonBecaController2');
	    Route::get('/admin/razon2/{id}/restaurar','RazonBecaController2@restaurar');

	    Route::Resource('/admin/razon1', 'RazonBecaController1');
	    Route::get('/admin/razon1/{id}/restaurar','RazonBecaController1@restaurar');
	// joel campoverde
	    Route::Resource('/admin/paises','PaisesController');
	    //Route::post('/admin/paises','PaisesController@store')->name('agrePais');

	    //Admin Provincia
	    Route::Resource('/admin/provincias','ProvinciasController');

	    //Admin Cantones
	    Route::Resource('/admin/cantones','CantonesController');

	    //Admin Sector Económico
	    Route::Resource('/admin/sectorEcon','SecEcoController');
	    //--------------------------fin de mantenimiento snna-------------------------
	    
		//usuario todos
		Route::Resource('/roles','ListarRolesController');

		Route::Resource('admin/tipoSangre','tipoSangreController');
		Route::get('/admin/tipoSangre/{id}/restaurar','tipoSangreController@restaurar');
///////////////////////MANTENIMIENTO ACADEMICO////////////////////////////////////
//Admin Carreras

    Route::Resource('/admin/carreras','admin\mant_academico\CarrerasController');
    Route::get('/admin/carreras/{id}/restaurar','admin\mant_academico\CarrerasController@restaurar');
   
//admin areas institucion
	Route::Resource('/admin/areasInstituto','admin\mant_academico\AreasInstitutoController');
	Route::get('/admin/areasInstituto/{id}/restaurar', 'admin\mant_academico\AreasInstitutoController@restaurar');

// admin ciclos
	Route::Resource('/admin/ciclos','admin\mant_academico\CiclosController');
	Route::get('/admin/ciclos/{id}/restaurar', 'admin\mant_academico\CiclosController@restaurar');

// admin categoria migratoria
        Route::Resource('/admin/categoriaMigratoria','CategoriaMigratoriaController');
        Route::get('/admin/categoriaMigratoria/{id}/restaurar', 'CategoriaMigratoriaController@restaurar');

// admin nivel de formacion
	Route::Resource('/admin/nivelFormacion','admin\mant_academico\nivelFormacionController');
	Route::get('/admin/nivelFormacion/{id}/restaurar', 'admin\mant_academico\nivelFormacionController@restaurar');

// admin academico malla
//ACADEMICO MALLA
    Route::Resource('/admin/malla','admin\mant_academico\AcademicoMallaController');
    Route::get('/admin/malla/{id}/restaurar', 'admin\mant_academico\AcademicoMallaController@restaurar');
// academico Periodo
    Route::Resource('/admin/periodo','admin\mant_academico\Acad_PeriodoController');

    Route::get('/admin/periodo/{id}/restaurar', 'admin\mant_academico\Acad_PeriodoController@restaurar');

Route::get('/crud/vista', 'MantenimientoController@vista')->name('man');

////////////////////////////////restauracion e ingreso de nuevos mantenimientos////////77
	//tipo bachillerato
	Route::Resource('/admin/tipobachillerato','admin\infoacademico\TipoBachilleratoController');
	Route::get('/admin/tipobachillerato/{id}/restaurar','admin\infoacademico\TipoBachilleratoController@restaurar');
	//tipo carrera
	Route::Resource('/admin/tipocarrera','admin\infoacademico\TipoCarreraController');
	Route::get('/admin/tipocarrera/{id}/restaurar','admin\infoacademico\TipoCarreraController@restaurar');
	// titulo carrera
	Route::Resource('/admin/titulocarrera','admin\infoacademico\TituloCarreraController');
	Route::get('/admin/titulocarrera/{id}/restaurar','admin\infoacademico\TituloCarreraController@restaurar');

	 //Henry
		Route::Resource('/admin/valorAyudaEconomica', 'ValorMontoAyudaEconomicaController');
	    Route::get('/admin/valorAyudaEconomica/{id}/restaurar','ValorMontoAyudaEconomicaController@restaurar');	

	    Route::Resource('/admin/valorMontoCredito', 'ValorMontoCreditoController');
	    Route::get('/admin/valorMontoCredito/{id}/restaurar','ValorMontoCreditoController@restaurar');


	//cruz
	   //ADMIN	VALOR DEL MONTO DE LA BECA
	Route::Resource('/admin/valormontobeca','ValorMontoBecaController');
	Route::get('/admin/valormontobeca/{id}/restaurar', 'ValorMontoBecaController@restaurar');

	//ADMIN	PORCENTAJE DE LA BECA QUE CUBRE EL VALOR DEL ARANCEL
	Route::Resource('/admin/porcentajebecaarancel','PorcentajeBecaArancelController');
	Route::get('/admin/porcentajebecaarancel/{id}/restaurar', 'PorcentajeBecaArancelController@restaurar');

	// ADMIN JORNADA CARRERA
	
////////////////////////////////informacion global//////////////////////////////
Route::get('informacionGlobal','InformacionGlobalController@index');

//*****************  STUDIANTE INFORMACION PERSONAL **************************
Route::post('informacionGlobal/create','InformacionGlobalController@AcaEstuInfoPer');

Route::post('informacionGlobal/ifacademica','InformacionGlobalController@infacademica');

Route::post('informacionGlobal','InformacionGlobalController@infoBecas');


Route::Resource('admin/MallasMaterias','AcadMallasMateriasController');
Route::get('/admin/MallasMaterias/{id}/restaurar', 'AcadMallasMateriasController@restaurar');
//Informacion docente
            //Principal
            Route::Resource('/docentes/main','DocentesController');

            Route::post('/docentes/personal','DocentesController@saveInfoPer');

            Route::post('/docentes/infAcademica','DocentesController@saveInfAcada');

            Route::post('/docentes/beca','DocentesController@saveInfoBeca');

            Route::post('/docentes/provincias','DocentesController@getProvincias');
            Route::post('/docentes/cantones','DocentesControllerf@getCantones');


//Admin Docentes Nivel
        Route::Resource('/admin/docentes/nivel','NivForDoceController');
        Route::get('/admin/docentes/nivel/{id}/restaurar','NivForDoceController@restaurar');

        //Admin Docentes Relacion Laboral
        Route::Resource('/admin/docentes/relacionLab','RelacionLabController');
        Route::get('/admin/docentes/relacionLab/{id}/restaurar','RelacionLabController@restaurar');

        //Admin Docentes Escalafón
        Route::Resource('/admin/docentes/escalafon','EscalafonDoceController');
        Route::get('/admin/docentes/escalafon/{id}/restaurar','EscalafonDoceController@restaurar');

        //Admin Docentes Cargo Directivo
        Route::Resource('/admin/docentes/cargoDir','CargoDireController');
        Route::get('/admin/docentes/cargoDir/{id}/restaurar','CargoDireController@restaurar');

        //Admin Docentes Tiempo Dedicación
        Route::Resource('/admin/docentes/tiempoDed','TiempoDoceController');
        Route::get('/admin/docentes/tiempoDed/{id}/restaurar','TiempoDoceController@restaurar');

        //MallasCarrera
        Route::Resource('/admin/mallasCarrera','MallasCarreraController');
        Route::get('/admin/mallasCarrera/{id}/restaurar', 'MallasCarreraController@restaurar');

        //MANTENIMIENTO NESTOR-ORTIZ ACAD CARRERA CARRERA_COORDINADOR
		Route::Resource('admin/academicoCarreraCoordinador','admin\mant_academico\AcadCarreraCoordinadorController');
		Route::get('admin/academicoCarreraCoordinador/{id}/restaurar','admin\mant_academico\AcadCarreraCoordinadorController@restaurar');

		Route::post('informacionGlobal/createEstuLaboral','InformacionGlobalController@AcaEstuLabEco');

		Route::Resource('admin/Areas_Materias','AreasMateriasController');
	Route::get('/admin/Areas_Materias/{id}/restaurar','AreasMateriasController@restaurar');

	//************************* MANTENIMIENTO ACAD SEDES **************************
	Route::Resource('admin/academicoSedes','admin\mant_academico\AcadSedesController');
	Route::get('/admin/academicoSedes/{id}/restaurar','admin\mant_academico\AcadSedesController@restaurar');
//*****************************************************************************

	Route::Resource('/admin/materias', 'MateriasController');
Route::get('/admin/materias/{id}/restaurar','MateriasController@restaurar');


	Route::Resource('/admin/asignacion', 'ParaleloSeneJornadaCarreraController');
	Route::get('/admin/datos', 'ParaleloSeneJornadaCarreraController@vistatabla');
	Route::get('/admin/asignacion/{id}/restaurar','ParaleloSeneJornadaCarreraController@restaurar');


	//Paralelo Academico
    Route::Resource('/admin/paraleloAcad','ParaleloAcadController');
    Route::get('/admin/paraleloAcad/{id}/restaurar', 'ParaleloAcadController@restaurar');


    Route::Resource('admin/AcadPeriodos','AcadPeriodosController');
	Route::get('/admin/AcadPeriodos/{id}/restaurar','AcadPeriodosController@restaurar');


	//joel campoverde y guaman
	Route::Resource('admin/materiaparalelo','MateriaXPeriodoController');
	Route::post('admin/materiaparalelosede','MateriaXPeriodoController@sedes');
	Route::post('admin/materiaparalelomalla','MateriaXPeriodoController@mallas');
	//Route::get('admin/materiaparalelomostrar','MateriaXPeriodoController@mostrar');
	Route::post('admin/materiaparalelomostrarfiltrar','MateriaXPeriodoController@mostrarfiltro');


	