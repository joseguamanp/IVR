<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AcadParaleloPeriodo extends Model
{
    use SoftDeletes;

	protected $dates = ['deleted_at'];
    protected $table = 'sene_estadocivilid';

    protected $fillable = [
        'id',
        'id_para_sede_jor_car',
        'id_periodo',
    ];
}
