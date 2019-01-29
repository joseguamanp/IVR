@extends('layouts.principal')
@section('content')
	<div id="content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					{!! Form::open(['url' => 'admin/mallasCarrera', 'method' => 'POST']) !!}
					<div class="form-group">
						<label>Seleccionar 	Malla</label>
						<select class="form-control" name="id_malla">
							@foreach($getdato['mall'] as $getdata)
								<option value="{{$getdata->id}}">{{$getdata->nombre_malla}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Seleccionar 	Carrera</label>
						<select class="form-control" name="id_carrera">
							@foreach($getdato['carrera'] as $getdata)
								<option value="{{$getdata->id}}">{{$getdata->nombreCarrera}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<button class="btn btn-sucess btn-block">Aceptar</button>
					</div>

					{!! Form::close() !!}
					@include('mensaje.mensajeerror')
				</div>
				<div class="col-md-9">
					<div class="card mb-3">
						<div class="card-header">
							<i class="fas fa-table"></i>
							Mallas Carrera</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
									<tr>
										<th>Mallas</th>
										<th>Carrera</th>
										<th>Creado</th>
										<th>Modificado</th>
										<th>Editar</th>
										<th>Estado</th>
									</tr>
									</thead>
									<tbody>
									@foreach($data as $datas)
										<tr>
											<td>{{$datas->nombre_malla}}</td>
											<td>{{$datas->nombreCarrera}}</td>
											<td>{{$datas->fecha_cre}}</td>
											<td>{{$datas->fecha_mod}}</td>
											<td>
												@if($datas->deleted_at!='')
													{!!link_to_route('mallasCarrera.edit', $title = 'Editar', $parameters = $datas->id, $attributes = ['class'=>'btn disabled']);!!}
												@else
													{!!link_to_route('mallasCarrera.edit', $title = 'Editar', $parameters = $datas->id, $attributes = ['class'=>'btn btn-warning']);!!}
												@endif
											</td>
											<td>
												@if($datas->deleted_at!='')
													<a class="btn btn-primary btn-block" href="mallasCarrera/{{$datas->id}}/restaurar">Restaurar</a>
												@else
													{!! Form::open(['route' => ['mallasCarrera.destroy',$datas->id],'method'=>'DELETE']) !!}
													<div class="form-group">
														{!!Form::submit('Desactivar',['class'=>'btn btn-danger btn-block'])!!}
													</div>
													{!! Form::close() !!}
												@endif
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>  <!--fin del card-3 -->
				</div>
			</div>
		</div>
	</div>
@endsection