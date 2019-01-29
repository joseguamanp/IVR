@extends('layouts.principal')
@section('content')
<div id="content-wrapper" style="padding-left: 10%; padding-top: 2%;">
	@if (session('status'))
		<div class="alert alert-success col-md-4" role="alert">
			{{ session('status') }}
		</div>
	@endif
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Información Personal</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Información Académica y Laboral Económica</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Información de Beca</a>
			</li>
		</ul>

		<div class="tab-content" style="padding-top: 2%;">

			<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
				@include('docentes.infPersonal.index',compact('tipDoc','sexo','gen','etni','tipSan','estCiv','naci','prov','canton','tipoDis','tipoEnfCat'))
			</div>

			<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				@include('docentes.infAcademica.index',compact('nivFor','reLab','escDoc','cargo'))
			</div>

			<div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
				@include('docentes.infBeca.index')<!--,compact('tipBec','raz1','raz2','raz3','raz4','raz5','raz6','tipFina'))-->
			</div>
		</div>
	</div>
</div>
@endsection