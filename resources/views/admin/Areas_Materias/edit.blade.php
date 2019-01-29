@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::model($data,['route' => ['Areas_Materias.update',$data->id],'method'=>'PUT']) !!}
					 
        				<div class="form-group">
        					<label>Areas Materias</label>
					    	 {!!Form::text('etiqueta',null,['class'=>'form-control'])!!}
        				</div>
                                        <div class="form-group">
        					<label>Descripción</label>
					    	 {!!Form::text('descripción',null,['class'=>'form-control'])!!}
        				</div>
        				<div class="form-group">
        					<button class="btn btn-sucess btn-block">Aceptar</button>
        				</div>
        				
					{!! Form::close() !!}
					@include('mensaje.mensajeerror')
        		</div>
        	</div>
	</div>
</div>
@endsection