<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class CategoriaMigratoria extends Model
{
    use softDeletes;
    protected $dates = ['deleted_at'];
    protected $table='acad_categoria_migratoria';
    protected $fillable = [
        'id', 'nombre', 'deleted_at', 'id_usu_cre', 'fecha_cre', 'id_usu_mod', 'fecha_mod'
    ];
}
