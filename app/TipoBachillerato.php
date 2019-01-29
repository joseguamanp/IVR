<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TipoBachillerato extends Model
{
	use SoftDeletes; //Implementamos 

    protected $dates = ['deleted_at'];
    protected $table='sene_tipobachillerato';
    protected $fillable = [
        'id', 'etiqueta','fecha_cre','fecha_mod'
    ];
}
