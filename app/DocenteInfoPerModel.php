<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocenteInfoPerModel extends Model
{
    protected $table = 'acad_doce_infpersonal';

    protected $fillable = ['
        id',
        'tipoDocumento',
        'numIdentificacion',
        'sexo',
        'genero',
        'primerApellido',
        'segundoApellido',
        'primerNombre',
        'segundoNombre',
        'correo',
        'numCelular',
        'numDomicilio',
        'dirDomiciliaria',
        'codPostal',
        'contEmer',
        'parent',
        'nroCont',
        'etnia',
        'nomIdi',
        'fec_nac',
        'tipoSangre',
        'pais',
        'provincias',
        'canton',
        'catMigratoria',
        'paisResi',
        'provResi',
        'cantResi',
        'estCivil',
        'porDis',
        'nroCona',
        'tipoDiscapacidad',
        'tipoEnfeCatas',
        ];
}
