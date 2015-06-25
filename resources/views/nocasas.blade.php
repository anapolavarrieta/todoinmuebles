@extends('_master')

	@section ('title')
		No hay casas
	@stop

	@section ('content')
		</br>
		@if ($id== 'zona')
			<h3 id="nocasas"> No tenemos {{$tipo}} en esta zona, <a href='/{{$compra}}/{{$tipo}}'> buscar otras zonas</a></h3>
		@elseif($id=='ficha')
			<h3 id="nocasas"> No encontramos lo que buscas 
			</br>
			<a href='/'> Buscar nuevamente</a></h3>
		@endif
	@stop

@stop 