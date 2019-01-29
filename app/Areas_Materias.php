<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Areas_Materias extends Model
{
    
    protected $table = 'acad_areas_materias';
    use SoftDeletes; //Implementamos 

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id','nombre_area','descripción','estado','id_usu_cre', 'id_usu_mod', 'fecha_usu_mod', 'fecha_usu_cre', 'deleted_at'
    ];
}

 
     

    