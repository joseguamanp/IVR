<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModalidadCar extends Model
{
    protected $table='sene_modalidadcarrera';
    protected $fillable = [
        'id', 'etiqueta', 'id_usu_cre', 'fecha_cre', 'id_usu_mod', 'fecha_mod'
    ];
}
