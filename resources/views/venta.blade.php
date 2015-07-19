@extends('_master')

	@section ('title')
		{{$compra}}
	@stop

	@section ('content')
		<div class="row">
			<div class="col-md-9">
				<h3> Selecciona la opción que buscas: </h3>
			</div>
			<div class="col-md-3">
				<h2 class='tituloicono'>{{$compra}}</h2>
			</div>
			</br>
			<div class="row">
				<div class="col-md-4">
					<div class="tituloicono">
						<h3 class="icono"> Casas </h3>
					</div>
					<div class="icono"> 
						<a href='/{{$compra}}/casa' ><img src= "{{URL::asset('/images/casa.png')}}" class="img-responsive" alt="Casa"/></a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="tituloicono">
						<h3 class="icono"> Departamentos </h3>
					</div>
					<div class="icono">
						<a href='/{{$compra}}/depa' ><img src= "{{URL::asset('/images/depa.png')}}" class="img-responsive" alt="Departamento"/></a>
					</div>
				</div>
				@if ($compra == 'venta')
				<div class="col-md-4">
					<div class="tituloicono">
						<h3 class="icono"> Terrenos </h3>
					</div>
					<div class="icono">
						<a href='/{{$compra}}/terreno' ><img src= "{{URL::asset('/images/terreno.png')}}" class="img-responsive" alt="Terreno"/></a>
					</div>
				</div>
				@endif
			</div>
	@stop

@stop  