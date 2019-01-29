@php
        $nom = \Illuminate\Support\Facades\Auth::user()->nombre;
        $ape = \Illuminate\Support\Facades\Auth::user()->apellido;
        $nombresSep = explode(" ",$nom);
        $apellidosSep = explode(" ",$ape);

        if(!isset($_SESSION))
            session_start();
        $_SESSION['cedula'] = \Illuminate\Support\Facades\Auth::user()->cedula;
        $_SESSION['segNombre'] = $nombresSep[1];
        $_SESSION['priNombre'] = $nombresSep[0];
        $_SESSION['priApellido'] = $apellidosSep[0];
        $_SESSION['segApellido'] = $apellidosSep[1];


@endphp

<div class="container">
    {!! Form::open(['url' => 'docentes/personal', 'method' => 'post']) !!}

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">
                <label for="infopersonal">{{ __('Tipo de Identificación:') }}</label>
            </div>
            <div class="form-group col-md-3">
                <select name="tipoDocumento" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    @foreach($tipDoc as $tipoDocumento)
                        <option value="{{$tipoDocumento->etiqueta}}">{{$tipoDocumento->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Número de Identificación') !!}</div>
            <div class="form-group col-md-3">
                <input type="text" name="cedula" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->cedula}}" readonly >
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3"><label for="infopersonal">{{ __('Sexo:') }}</label></div>
            <div class="form-group col-md-3">
                <select name="sexo" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    @foreach($sexo as $sexos)
                                    <option value="{{$sexos->etiqueta}}">{{$sexos->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3"><label for="infopersonal">{{ __('Género:') }}</label></div>
            <div class="form-group col-md-3">
                <select name="genero" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    @foreach($gen as $genero)
                        <option value="{{$genero->etiqueta}}">{{$genero->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Primer Apellido') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="primerApellido" placeholder="Primer Apellido" class="form-control" readonly value="{{$_SESSION['priApellido']}}" >
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Segundo Apellido') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="segundoApellido" placeholder="Segundo Apellido" class="form-control" readonly value="{{$_SESSION['segApellido']}}"/>
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Primer Nombre') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="primerNombre" placeholder="Primer Nombre" class="form-control" readonly value="{{$_SESSION['priNombre']}}">
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Segundo Nombre') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="segundoNombre" placeholder="Segundo Nombre" class="form-control" readonly value="{{$_SESSION['segNombre']}}">
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Correo Electronico') !!}</div>
            <div class="form-group col-md-4">
                <input type="email" name="correo" class="form-control" required placeholder="example@itsvr.edu.ec">
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Numero Celular:') !!}</div>
            <div class="form-group col-md-2">
                <input type="number" name="numCelular" placeholder="Nro. Celular" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group col-md-5"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('full_name', 'Numero Convencional:') !!}</div>
            <div class="form-group col-md-2">
                <input type="text" name="numDomicilio" placeholder="Nro. Docimicilio" class="form-control" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('dirDom', 'Dirección Domiciliaria:') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="dirDomiciliaria" placeholder="Dirección" class="form-control" required>
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('codPostal', 'Código Postal:') !!}</div>
            <div class="form-group col-md-4">
                <input type="number" name="codPostal" placeholder="Codigo Postal" class="form-control" required>
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('contacEmer', 'En caso de emergencia contactar a:') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="contEmer" placeholder="Nombre Contacto" class="form-control" required>
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('parentezco', 'Parentezco:') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="parent" placeholder="Parentesco" class="form-control" required>
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('nroContacto', 'Número de Contacto:') !!}</div>
            <div class="form-group col-md-2">
                <input type="number" name="nroCont" placeholder="Numero Telefono" class="form-control" required>
            </div>
            <div class="form-group col-md-5"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('etnia', 'Etnia:') !!}</div>
            <div class="form-group col-md-3">
                <select name="etnia" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    @foreach($etni as $etnia)
                        <option value="{{$etnia->etiqueta}}">{{$etnia->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('idiAnce', 'Habla algún idioma ancestral:') !!}</div>
            <div class="form-group col-md-2">
                <select name="hab_idi" id="hab_idi" class="form-control" onclick="hablaIdiomaAncestral()" required>
                    <option value="">--Seleccione--</option>
                    <option value="1">SI</option>
                    <option value="2">NO</option>
                </select>
            </div>
            <div class="form-group col-md-5"> </div>
        </div>

        <div class="form-row" id="idiAnce">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('idioAnce', 'Idioma ancestral:') !!}</div>
            <div class="form-group col-md-4">
                <input type="text" name="nomIdi" placeholder="Idioma Ancestral" class="form-control">
            </div>
            <div class="form-group col-md-3"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('fecNac', 'Fecha de nacimiento:') !!}</div>
            <div class="form-group col-md-3">
                <input class="form-control" name="fec_nac" id="datepicker1" width="276" onchange="getFecha()"/>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('edad', 'Edad:') !!}</div>
            <div class="form-group col-md-2"><input type="text" id="edad" class="form-control" readonly></div>
            <div class="form-group col-md-5"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('tipSangre', 'Tipo de Sangre:') !!}</div>
            <div class="form-group col-md-3">
                <select name="tipoSangre" id="" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    @foreach($tipSan as $tipoSangre)
                        <option value="{{$tipoSangre->etiqueta}}">{{$tipoSangre->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('pais', 'Pais Nacionalidad:') !!}</div>
            <div class="form-group col-md-3">
                <select name="pais" id="pais" class="form-control" onchange="paises(this)" required>
                    <option value="">--Seleccione--</option>
                    @foreach($naci as $nacionalidad)
                        <option value="{{$nacionalidad->etiqueta}}" data="{{$nacionalidad->id}}">{{$nacionalidad->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('provincia', 'Provincia de Nacimiento:') !!}</div>
            <div class="form-group col-md-3">
                <select name="provincias" id="provincias" class="form-control" onchange="cantones(this)" required>
                    <option value="" data="0">--Seleccione--</option>
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('canton', 'Cantón de Nacimiento:') !!}</div>
            <div class="form-group col-md-3">
                <select name="canton" id="canton" class="form-control" required>
                    <option value="">--Seleccione--</option>
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('catMigra', 'Categoria Migratoria:') !!}</div>
            <div class="form-group col-md-3">
                <select name="catMigratoria" id="catMigratoria" class="form-control" onchange="cateMigratoria(this);" required>
                    <option value="" data="0">--Seleccione--</option>
                    <option value="NO APLICA" data="1">No Aplica</option>
                    <option value="RESIDENTE PERMANENTE">Residente Permanente</option>
                    <option value="RESIDENTE TRANSITORIO O NO RESIDENTE">Residente transitorio o no residente</option>
                    <option value="RESIDENTE TEMPORAL">Residente temporal</option>
                    <option value="REFUGIADO">Refugiado</option>
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div id="contenedorMigratorio" style="padding-left: 5%;">
            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">{!! Form::label('paisRes', 'Pais de residencia:') !!}</div>
                <div class="form-group col-md-3">
                    <select name="paisResi" id="paisResi" class="form-control" onclick="paisRes()">
                        <option value="0">--Seleccione--</option>
                        @foreach($naci as $nacionalidad)
                            <option value="{{$nacionalidad->etiqueta}}">{{$nacionalidad->etiqueta}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4"></div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">{!! Form::label('provRes', 'Provincia de residencia:') !!}</div>
                <div class="form-group col-md-3">
                    <select name="provResi" id="provResi" class="form-control" onclick="cantonResi()">
                        <option value="0">--Seleccione--</option>
                    </select>
                </div>
                <div class="form-group col-md-4"></div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">{!! Form::label('canvRes', 'Cantón de residencia:') !!}</div>
                <div class="form-group col-md-3">
                    <select name="cantResi" id="cantResi" class="form-control">
                        <option value="0">--Seleccione--</option>
                    </select>
                </div>
                <div class="form-group col-md-4"></div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('estCiv', 'Estado Civil:') !!}</div>
            <div class="form-group col-md-3">
                <select name="estCivil" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    @foreach($estCiv as $estadoCiv)
                        <option value="{{$estadoCiv->etiqueta}}">{{$estadoCiv->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('tieDisca', 'Tiene discapacidad:') !!}</div>
            <div class="form-group col-md-2">
                <select name="tDisc" id="tDisc" class="form-control" onclick="discapacidad();" required>
                    <option value="">--Seleccione--</option>
                    <option value="1">SI</option>
                    <option value="2">NO</option>
                </select>
            </div>
            <div class="form-group col-md-5"></div>
        </div>

        <div class="discapacidad" style="padding-left: 5%;">
            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">{!! Form::label('porDisc', 'Porcentaje de Discapacidad:') !!}</div>
                <div class="form-group col-md-2">
                    <input type="text" name="porDis" placeholder="Porcentaje" class="form-control">
                </div>
                <div class="form-group col-md-5"></div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">{!! Form::label('nroConadis', 'No. Carnet del CONADIS:') !!}</div>
                <div class="form-group col-md-2">
                    <input type="text" name="nroCona" placeholder="Numero" class="form-control">
                </div>
                <div class="form-group col-md-5"></div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-3">{!! Form::label('tipDisc', 'Tipo de Discapacidad:') !!}</div>
                <div class="form-group col-md-3">
                    <select name="tipoDiscapacidad" class="form-control">
                        <option value="">No Aplica</option>
                        @foreach($tipoDis as $tipoDiscapacidad)
                            <option value="{{$tipoDiscapacidad->etiqueta}}">{{$tipoDiscapacidad->etiqueta}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4"></div>
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-3">{!! Form::label('tipEnfCat', 'Tipo de enfermedad catastrofica:') !!}</div>
            <div class="form-group col-md-3">
                <select name="tipoEnfeCatas" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    @foreach($tipoEnfCat as $tipoEnfermedadCast)
                        <option value="{{$tipoEnfermedadCast->etiqueta}}">{{$tipoEnfermedadCast->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4"></div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                {!! Form::submit('Enviar', ['class' => 'btn btn-primary ' ] ) !!}
            </div>
        </div>
    {!! Form::close() !!}
</div>

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] { -moz-appearance:textfield; }
</style>
