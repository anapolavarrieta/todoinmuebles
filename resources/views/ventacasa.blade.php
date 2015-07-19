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
						@foreach ($casas as $casa)
							@if($casa->municipio == $delegacion and $d== '0')
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
												@foreach ($casas as $casazona)
													@if ($zona->delegacion == $delegacion and $casazona->colonia == $zona->zona and $j== '0')
														<li class= "list-group-item"> <a href='/{{$compra}}/{{$tipo}}/{{$zona->id}}'> {{$zona->zona}} </a></li>
														<?php $d = $d+1 ?>
														<?php $j = $j+1 ?>
													@endif
												@endforeach
												<?php $j = 0?>
											@endforeach
										</div> <!--class="panel-body"-->
									</div> <!--id="collapse{{$i}}" class="panel-collapse collapse"-->
								</div> <!--class="panel panel-default"-->

								<?php $i = $i+1 ?>
							@endif
						@endforeach
						<?php $d = 0?>					
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
							<a href='/{{$compra}}/{{$tipo}}/0'> Mostrar todas </a>
						</div>
					</div> <!--id="collapsetodo" class="panel-collapse collapse"-->
				</div> <!--	class="panel panel-default"-->
			</div>
		</div>
				
	@stop

@stop  

			