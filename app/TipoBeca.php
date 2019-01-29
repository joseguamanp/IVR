<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoBeca extends Model
{
    protected $table = 'sene_tipobecaid';
    use SoftDeletes;
    protected $dates = [ 'deleted_at'];

    protected $fillable = [
      'id',
      'etiqueta',
      'id_usu_cre',
      'fecha_cre',
      'id_usu_mod',
      'fecha_mod'

    ];
}
