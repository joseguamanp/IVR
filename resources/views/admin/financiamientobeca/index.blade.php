@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">        		
				<div class="col-md-4">
					{!! Form::open(['url' => 'admin/financiamientobeca', 'method' => 'POST']) !!}
        				<div class="card mb-3">
				            <div class="card-header">
				              <i class="fas fa-table"></i>
				              Tipo de financiamiento de la beca</div>
				            <div class="card-body">
				              	<label>Etiqueta</label>
					    		<input class="form-control" type="text" name="etiqueta">	    		
					    		<button class="btn btn-success btn-block mt-3">Aceptar</button>
								{!! Form::close() !!}
								@include('mensaje.mensajeerror')			           
				            </div>
		          		</div>  <!--fin del card-3 -->		          	
        		</div>	 
        		<div class="col-md-8">
        				<div class="card mb-3">
				            <div class="card-header">
				              <i class="fas fa-table"></i>
				              Opciones</div>
				            <div class="card-body">
				              <div class="table-responsive">
				                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				                  <thead>
				                    <tr>
										<th>Etiqueta</th>
										<th>Creado</th>
										<th>Modificado</th>
										<th>Editar</th>
										<th>Estado</th>
									</tr>
				                  </thead>
				                  <tbody>
				                	@foreach($finanBeca as $datas)
									<tr>
										<td>{{$datas->etiqueta}}</td>
										<td>{{$datas->fecha_cre}}</td>
										<td>{{$datas->fecha_mod}}</td>								
										<td>											
											@if($datas->deleted_at!='')										
												<input type="button" value="Editar" disabled="yes" class="btn btn-default" />
											@else
												{!!link_to_route('financiamientobeca.edit', $title = 'Editar', $parameters = $datas->id, $attributes = ['class'=>'btn btn-warning']);!!}
											@endif
										</td>
										<td>
											@if($datas->deleted_at!='')
												<a class="btn btn-primary btn-block" href="/admin/financiamientobeca/{{$datas->id}}/restaurar">Restaurar</a>
											@else
													{!! Form::open(['route' => ['financiamientobeca.destroy',$datas->id],'method'=>'DELETE']) !!}
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