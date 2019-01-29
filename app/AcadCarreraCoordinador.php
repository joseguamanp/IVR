<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcadCarreraCoordinador extends Model
{
    use SoftDeletes;

	protected $table = 'acad_carrera_coordinador';
	protected $primaryKey = 'id';

	protected $dates = ['delete_at'];

	protected $fillable = [

		
		'id_carrera',
		'id_docente',
		'id_usu_cre',
		'id_usu_mod',
	];


}
