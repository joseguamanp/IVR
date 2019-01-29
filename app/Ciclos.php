<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Ciclos extends Model
{
    use softDeletes;
    protected $dates = ['deleted_at'];
    protected $table='acad_ciclos';
    protected $fillable = [
        'id', 'nombre_ciclo', 'nombre_corto','deleted_at', 'id_usu_cre', 'fecha_cre', 'id_usu_mod', 'fecha_mod'
    ];
}
