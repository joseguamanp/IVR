@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-6">
        			{!! Form::open() !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        				<div class="form-group">
        					<label>Seleccionar 	carrera</label>
					    	<select class="form-control" name="id_carrera" id="id_carrera" required="yes">
                                <option>-----------Seleccionar-----------</option>
					    		@foreach($getdatos['carrera'] as $getdata)
					    		<option value="{{$getdata->id}}">{{$getdata->nombreCarrera}}</option>
					    		@endforeach
					    	</select>
        				</div>
        				<div class="form-group">
        					<label>Seleccionar 	sedes</label>
					    	<select class="form-control" name="id_sede" id="id_sede" required="yes">
                                <option>-----------Seleccionar-----------</option>
					    		@foreach($getdatos['sedes'] as $getdata)
                                <option value="{{$getdata->id}}">{{$getdata->nombre_sede}}</option>
                                @endforeach
					    	</select>
        				</div>
        		</div>
                <div class="col-md-6">
                        <div class="form-group">
                            <label>Seleccionar  jornada</label>
                            <select class="form-control" name="id_jornada" id="id_jornada" required="yes">
                                <option>-----------Seleccionar-----------</option>
                                @foreach($getdatos['jornada'] as $getdata)
                                <option value="{{$getdata->id}}">{{$getdata->etiqueta}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Seleccionar paralelo</label>
                            <select class="form-control" name="id_paralelo" id="id_paralelo" required="yes">
                            <option>-----------Seleccionar-----------</option>
                            @foreach($getdatos['paralelo'] as $getdata)
                                <option value="{{$getdata->id}}">{{$getdata->nombre_paralelo}}</option>
                            @endforeach
                            </select>
                        </div>
                </div>
                <div class="row"><div id="mensaje"></div></div>
        </div>		
        		<div class="row">
        			<div class="col-md-12">
                        {!!link_to('#',$title='ingresar',$attributes=['id'=>'ingresar','class'=>'btn btn-success btn-block'], $secure=null)!!} 
        			</div>
        				
        		</div>	
					{!! Form::close() !!}
					@include('mensaje.mensajeerror')
            <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-6">
                    <div class="card-header">
                              <i class="fas fa-table"></i>
                              Mallas Carreras</div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                              <thead>
                                <tr>
                                    <th>Sede</th>
                                     <th>Carrera</th>
                                    <th>Jornada</th>
                                    <th>Paralelo</th>
                                    <th>editar</th>
                                    <th>Estado</th>     
                                </tr>
                              </thead>
                              <tbody id="datos"></tbody>
                                </table>
                              </div>
                            </div>
                        </div>  <!--fin del card-3 -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/ajax/admin_asignacion.js') }}"></script>
@endsection