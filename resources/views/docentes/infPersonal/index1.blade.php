<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vista') }} </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('man') }}" aria-label="{{ __('Vista') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="ModaCarr" class="col-sm-4 col-form-label text-md-right">{{ __('Modalidad de la carrera') }}</label>

                                <div class="col-md-6">
                                    <select name="modalidad" class="form-control">
                                        @foreach($carrera as $car)
                                            <option value="">{{$car->etiqueta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="JornCarr" class="col-sm-4 col-form-label text-md-right">{{ __('Jornada de la carrera') }}</label>

                            <div class="col-md-6">
                                <select name="Jornada_Carrera" class="form-control">
                                    @foreach($jornada as $jor)
                                        <option value="">{{$jor->etiqueta}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="TipoMatr" class="col-sm-4 col-form-label text-md-right">{{ __('Tipo de Matricula') }}</label>

                            <div class="col-md-6">
                                <select name="Tipo_Matricula" class="form-control">
                                    @foreach($tipo as $tip)
                                        <option value="">{{$tip->etiqueta}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="NiveAcad" class="col-sm-4 col-form-label text-md-right">{{ __('Nivel académico') }}</label>

                            <div class="col-md-6">
                                <select name="Nivel Academico" class="form-control">
                                    @foreach($nivel as $niv)
                                        <option value="">{{$niv->etiqueta}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="para" class="col-sm-4 col-form-label text-md-right">{{ __('Paralelo') }}</label>

                            <div class="col-md-6">
                                <select name="paralelo" class="form-control">
                                    @foreach($paralelo as $par)
                                        <option value="">{{$par->etiqueta}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
