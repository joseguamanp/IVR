<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Paralelo extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    protected $table='sene_paraleloid';
    protected $fillable = [
        'id', 'etiqueta', 'id_usu_cre', 'fecha_cre', 'id_usu_mod', 'fecha_mod'
    ];
}
