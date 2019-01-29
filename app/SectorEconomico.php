<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectorEconomico extends Model
{
    protected $table = 'sene_sec_eco';

    protected $fillable = [
        'id',
        'etiqueta',
        'id_usu_cre',
        'fecha_cre',
        'id_usu_mod',
        'fecha_mod',
    ];
}
