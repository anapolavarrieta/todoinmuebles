@extends('_master')

	@section ('title')
		Mostrar {{$tipo}}
	@stop

	@section ('content')
		
		<div class="col-md-2">
			<div class="icono"> 
				<h3 class='tituloicono'>{{$compra}}</h3>
				<a href='/{{$compra}}/{{$tipo}}' ><img src= "{{URL::asset('/images/').'/'.$tipo.'.png'}}" class="img-responsive" alt="Casa"/></a>
			</div>
		</div>
		<div class="col-md-10">
			@if ($id != '0')
				<h1> Zona: {{$zona}} </h1> 
			@endif
			<table class='table'>
				@foreach($casas as $casa)

						<tbody>
							<tr>
								<p>
								<td><img id='casascollage' src= "{{URL::asset('/images/').'/collage/collage'.$casa->id. '.jpg'}}" class="img-responsive" alt="Casa"/></td>
							</p>
								<td>
								<div>
									@if ($compra == 'preventa')
										<p> Desarrollo {{ $casa->calle}} </p>
									@else					
		    							<p> {{ $casa->calle}} {{ $casa->numero}}</p>
		    						@endif
		    						<p> {{ $casa->colonia}}, {{ $casa->municipio}} </p>
		    						<p> {{ $casa->ciudad}}, {{ $casa->estado}} </p>
		    						<p> ${{ $english_format_number = number_format($casa->precio)}} </p>
		    						<p> {{ $casa->recamara}} cuarto(s), {{ $casa->bano}} baño(s), {{ $casa->mediobano}} medio baño(s), {{ $casa->estacionamiento}} estacionamiento(s) </p>
		    						<p> <a href= " {{url( '/casa', $casa->id)}}"> Mostrar Ficha Técnica </a> </p>
		    						<br/>
		    					</div>
		    					</td>
		    			</tbody>

				@endforeach
			</table>

		
		</div>


		
	@stop

@stop 