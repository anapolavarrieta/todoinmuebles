@extends('_master')

	@section ('title')
		Venta {{$tipo}}- Zona
	@stop

	@section ('content')
		<div class="col-md-2">
			<div class="icono"> 
				<h3 class='tituloicono'>{{$compra}}</h3>
				<a href='/venta/{{$tipo}}' ><img src= "{{URL::asset('/images/').'/'.$tipo.'.png'}}" class="img-responsive" alt="Casa"/></a>
			</div> <!-- class="icono" -->
		</div> <!-- class="col-md-2" -->
		
		<div class="col-md-10">
			<div>
				<h3> Selecciona un municipio y una zona: </h3>
			</div>
			
			<div>
				<div class="panel-group" id="accordion">
			
					@foreach ($delegaciones as $delegacion)
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}} ">
										{{$delegacion}} 
									</a>
								</h4>
							</div> <!--class="panel-heading" -->
					
							<div id="collapse{{$i}}" class="panel-collapse collapse">
								<div class="panel-body">
									@foreach ($zonas as $zona)
										@if ($zona->delegacion == $delegacion)
											<li class= "list-group-item"> <a href='/{{$compra}}/{{$tipo}}/{{$zona->id}}'> {{$zona->zona}} </a></li>
										@endif
									@endforeach
								</div> <!--class="panel-body"-->
							</div> <!--id="collapse{{$i}}" class="panel-collapse collapse"-->
						</div> <!--class="panel panel-default"-->

						<?php $i = $i+1 ?>
					@endforeach
				

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapsetodo ">
								Todas
							</a>
						</h4>
					</div> <!--class="panel-heading"-->
					<div id="collapsetodo" class="panel-collapse collapse">
						<div class="panel-body">
							<a href='/{{$compra}}/{{$tipo}}/todas'> Mostrar todas </a>
						</div>
					</div> <!--id="collapsetodo" class="panel-collapse collapse"-->
				</div> <!--	class="panel panel-default"-->
			</div>
		</div>
				
	@stop

@stop  

			