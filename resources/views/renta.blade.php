@extends('_master')

	@section ('title')
		Rentas
	@stop

	@section ('content')
		<h3> Selecciona la opción que buscas: </h3>
			</br>
			<div class="col-md-4">
					<div class="tituloicono">
						<h3 class="icono"> Casas </h3>
					</div>
					<div class="icono"> 
						<a href='/renta/casa' ><img src= "{{URL::asset('/images/casa.png')}}" class="img-responsive" alt="Casa"/></a>
					</div>
			</div>
			<div class="col-md-4">
					<div class="tituloicono">
						<h3 class="icono"> Departamentos </h3>
					</div>
					<div class="icono">
						<a href='/renta/depa' ><img src= "{{URL::asset('/images/depa.png')}}" class="img-responsive" alt="Departamento"/></a>
					</div>
			</div>
			<div class="col-md-4">
					<div class="tituloicono">
						<h3 class="icono"> Terrenos </h3>
					</div>
					<div class="icono">
						<a href='/renta/terreno' ><img src= "{{URL::asset('/images/terreno.png')}}" class="img-responsive" alt="Terreno"/></a>
					</div>
			</div>
	@stop

@stop  