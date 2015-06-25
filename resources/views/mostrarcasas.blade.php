@extends('_master')

	@section ('title')
		Mostrar Casas
	@stop

	@section ('content')
		<h1> Casas </h1> 

		@foreach($casas as $casa)

			<p> <a href= " {{url( '/casa', $casa->id)}}"> {{ $casa->id}} </a> </p>
			<p> {{ $casa->zona}} </p>
		    <p> {{ $casa->calle}} </p>
		    <p> {{ $casa->numero}} </p>
		    <p> {{ $casa->colonia}} </p>
		    <p> {{ $casa->municipio}} </p>
		    <p> {{ $casa->cp}} </p>
		    <p> {{ $casa->ciudad}} </p>
		    <p> {{ $casa->estado}} </p>
		    <p> {{ $casa->precio}} </p>
		    <p> {{ $casa->supconst}} </p>
		    <p> {{ $casa->supterr}} </p> 
		    <p> {{ $casa->antiguedad}} </p> 
		    <p> {{ $casa->recamara}} </p> 
		    <p> {{ $casa->bano}} </p> 
		    <p> {{ $casa->mediobano}} </p>
		    <p> {{ $casa->estacionamiento}} </p>
		    <p> {{ $casa->descripcion}} </p>
		    <p> {{ $casa->estatus}} </p>


		@endforeach
	@stop

@stop 