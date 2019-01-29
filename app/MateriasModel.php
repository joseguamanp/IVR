<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MateriasModel extends Model
{
     //
    use SoftDeletes;
    protected $table = 'acad_materias';

    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'id',
    	'nombre_materia',
    	'id_area_materia',
    	'descripcion',
    ];
}
