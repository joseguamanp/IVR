<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TituloCarrera extends Model
{
    use SoftDeletes; //Implementamos 

    protected $dates = ['deleted_at'];
    protected $table='sene_titulocarrera';
    protected $fillable = [
        'id', 'etiqueta','fecha_cre','fecha_mod'
    ];
}
