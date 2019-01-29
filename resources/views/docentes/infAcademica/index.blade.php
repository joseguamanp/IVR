@php
    if(!isset($_SESSION))
        session_start();
@endphp

<div class="container">
    {!! Form::open(['url' => 'docentes/infAcademica', 'method' => 'post']) !!}
        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">Número de Identificación</label>
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="cedula" value="{{$_SESSION['cedula']}}" readonly>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblNivFor">{{ __('Nivel de Formación:') }}</label>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="nivelForm">
                    <option value="">--Seleccione--</option>
                    @foreach($nivFor as $data)
                        <option value="{{$data->etiqueta}}">{{$data->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">Fecha de Ingreso a la Institución (IES)</label>
            </div>
            <div class="form-group col-md-4">
                <input class="form-control" id="datepicker2" name="fecha_ing" width="276"/>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">Fecha de salida de la institución (IES)</label>
            </div>
            <div class="form-group col-md-4">
                <input class="form-control" id="datepicker3" name="fecha_sal" width="276"/>
            </div>
            <div class="form-group col-md-2"></div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">{{ __('Relación laboral con la Institución:') }}</label>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" id="relLab" name="relacionLab">
                    <option value="">---Seleccionar--</option>
                    @foreach($reLab as $data)
                        <option value="{{$data->etiqueta}}">{{$data->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">{{ __('Ingreso a la Institución por concurso de méritos y oposición:') }}</label>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="ingresoIns">
                    <option value="NO">--Seleccione--</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">{{ __('Escalafón del docente:') }}</label>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="escaDocen">
                    <option value="">--Seleccione--</option>
                    @foreach($escDoc as $data)
                        <option value="{{$data->etiqueta}}">{{$data->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">{{ __('Cargo directivo:') }}</label>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="cargoDirectivo">
                    <option value="0">--Seleccione--</option>
                    @foreach($cargo as $data)
                        <option value="{{$data->etiqueta}}">{{$data->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">{{ __('Tiempo de dedicación:') }}</label>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="tiempoDedi">
                    <option value="0">--Seleccione--</option>
                    @foreach($tiempo as $data)
                        <option value="{{$data->etiqueta}}">{{$data->etiqueta}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">{{ __('Número de asignaturas:') }}</label>
            </div>
            <div class="form-group col-md-4">
                <input type="text" name="numAsignaturas" class="form-control" placeholder="Asignaturas">
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">Es docente de Técnico Superior  </label>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="docSuperior">
                    <option value="NO">--Seleccione--</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">Está cursando estudios superiores</label>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="cursaEstSup" id="curEstSup" onclick="cursaEstSupe();">
                    <option value="NO">--Seleccione--</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div id="instCursa" class="form-row" >
            <div class="form-group col-md-2"></div>
            <div class="form-group col-md-4">
                <label for="lblTipIde">Institución donde cursa estudios superiores</label>
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="nombreInst" placeholder="Nombre de Institución"/>
            </div>
            <div class="form-group col-md-2"></div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                {!! Form::submit('Enviar', ['class' => 'btn btn-primary ' ] ) !!}
            </div>
        </div>
    {!! Form::close() !!}
</div>