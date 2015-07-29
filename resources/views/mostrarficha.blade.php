@extends('_master')

	@section ('title')
		Mostrar Ficha
	@stop

	
	@section ('content')
	
		
     	

		<div class="row">
			<div class="col-md-6">
				@if ($errors->has())
					<div class="alert alert-success"> Es necesario introducir la información correcta </div>
				@else	
					<h1> Información General </h1>
				@endif
			</div>

			<div class="col-md-6 ">
				<h3 class='tituloficha'> {{$tipo}} en {{$compra}} </h3>
			</div>

			

				
			</div>

	</br>
		<div class="row">
		<div class="col-md-6">
			<!-- Start WOWSlider.com BODY section -->
			<div id="wowslider-container2">
				<div class="ws_images">
					<ul>
						@for ($i=1; $i<= $casa->imagenes; $i++)
							<li><img src="../data2/images/casa{{$casa->id}}/imagen{{$i}}.jpg" alt="imagen{{$i}}" title="imagen{{$i}}" id="wows2_0"/></li>
						@endfor		
					</ul>
				</div>
				<div class="ws_bullets">
					<div>
						@for ($i=1; $i<=$casa->imagenes; $i++)
							<a href="#" title="imagen{{$i}}"><span><img src="../data2/tooltips/casa{{$casa->id}}/imagen{{$i}}.jpg" alt="imagen{{$i}}"/>1</span></a>
						@endfor	
					</div>
				</div>
				<div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com/vi">jquery image gallery</a> by WOWSlider.com v7.7</div>
				<div class="ws_shadow"></div>
			</div>	
			<script type="text/javascript" src="{{URL::asset('/engine2/wowslider.js')}}"></script>
			<script type="text/javascript" src="{{URL::asset('/engine2/script.js')}}"></script>
			<!-- End WOWSlider.com BODY section -->

				<div class="row">
					<div class="col-md-5">
					</div>
					<div class="col-md-1">
						</br>
						<h5> Regresar </h5>
						<a href="/{{$compra}}/{{$tipo}}/{{$casa->zona_id}}"><img src= "{{URL::asset('/images/flecha.png')}}" alt="Regresar"/></a>
					</div>
				</div>	

			
		</div>

		
		<div class="col-md-2 ">

			</br>
			<dl>
				@if ($casa->tipo == 'T')
					<dt>Precio por m2 </dt>
					<dd> ${{ $english_format_number = number_format($casa->precio)}} USD</dd>
				@else
					<dt>Precio </dt>
					@if ($compra == 'preventa')
						<dd> Desde ${{ $english_format_number = number_format($casa->precio)}} </dd>
						<dd> <a href= '../../images/PV{{$casa->id}}.pdf') target="_blank"> Mostrar opciones </dt></a> </dd>
					@else
						<dd> ${{ $english_format_number = number_format($casa->precio)}} </dd>
					@endif
				@endif
			</dl>
			</br>
			<dl>
				@if ($casa->tipo == 'T')
					<dt>Metros Fondo </dt>
					<dd> {{ $casa->bano}}  </dd>
				@else
					<dt>Baños </dt>
					<dd> {{ $casa->bano}}  </dd>
				@endif
			</dl>
			</br>
			@if ($casa->tipo != 'T')
				<dl>
					<dt>Ambientes </dt>
				
					@foreach ($casa->ambientes as $ambiente)
						@if($ambiente->name != 'Ninguno')
							<li> {{$ambiente->name}}</li>
						@endif
					@endforeach
				</dl>
			@endif
		</div>


		<div class="col-md-2">
			</br>
			<dl>
				@if ($casa->tipo != 'T')
					<dt>Superficie </dt>
					@if ($compra == 'preventa')
						<dd> Desde {{ $casa->supconst}} m&sup2 </dd>
					@else
						<dd> {{ $casa->supconst}} m&sup2 </dd>
					@endif
				@else
					<dt>Superficie Construcción </dt>
					<dd> {{ $casa->supconst}} m&sup2 </dd>
				@endif
			</dl>
			</br>
			<dl>
				@if ($casa->tipo == 'T')
					<dt>Metros Frente </dt>
					<dd> {{ $casa->recamara}} </dd>
				@else
					<dt>Antiguedad </dt>
					<dd> {{ $casa->antiguedad}} </dd>
				@endif
			</dl>
			</br>
			@if ($casa->tipo != 'T')
				<dl>
					<dt>Medio baño </dt>
					<dd> {{ $casa->mediobano}} </dd>
				</dl>
			@endif

				
		</div>
		
		<div class="col-md-2">
			</br>
			<dl>
				<dt>Superficie Terreno </dt>
					@if($casa->supterr != '0')
						<dd> {{ $casa->supterr}} m&sup2 </dd>
					@else
						<dd> N/A </dd>
					@endif
			</dl>
			</br>
			<dl>
				@if ($casa->tipo == 'T')
					<dt>Antiguedad </dt>
					<dd> {{ $casa->antiguedad}} </dd>
				@else
					<dt>Recamaras </dt>
					<dd> {{ $casa->recamara}} </dd>
				@endif
			</dl>
			</br>
			@if ($casa->tipo != 'T')
				<dl>
					<dt>Estacionamiento </dt>
					<dd> {{ $casa->estacionamiento}}  </dd>
				</dl>
			@endif

			<dl>
				<dt>Asesor </dt>
				<dd> 
					@foreach ($casa->servicios as $asesor)
						
						{{ $asesor->phone }}
						</br>
						{{ $asesor->email }}	
					@endforeach </dd>
		</div>

		@if ($compra == 'preventa')
			<div class="col-md-6">
				</br>
				</br>
				<dl>
					
				</dl>
			</div>
		@endif

		<div class="col-md-6">
			</br>
			</br>
			<dl>
				<dt>Descripción </dt>
				<dd> {{ $casa->descripcion}}</dd>
			</dl>
		</div>

		<div class="col-md-6">
			</dl>
				{!!Form::open(array('url'=>'/pdf'))!!}
				{!!Form::hidden('id', $casa->id)!!}
				{!!Form::hidden('zona', $zona)!!}
				{!!Form::hidden('tipo', $tipo)!!}
				{!!Form::hidden('compra', $compra)!!}
				{!!Form::submit('Crear PDF', ['class'=> 'btn btn-info form-control'])!!}
				{!!Form::close()!!}
			<dl>
		</div>

		<div class="col-md-6">
			</br>
			{!!Form::open(array('url'=>'/meinteresa'))!!}
			{!!Form::hidden('id', $casa->id)!!}
			{!!Form::hidden('zona', $zona)!!}
			{!!Form::hidden('tipo', $tipo)!!}
			{!!Form::hidden('compra', $compra)!!}
			{!!Form::label('email','Ingresa tu correo:')!!}
			{!!Form::email('email', null, ['class' => 'form-control'])!!}
			</br>
			@if ($errors->has('email')) 
				<div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
			 @endif
		</br>
			{!!Form::label('phone','Ingresa tu teléfono:')!!}
			{!!Form::input('number', 'phone', null, ['class' => 'form-control'])!!}
			</br>
			@if ($errors->has('phone')) 
				<div class="alert alert-danger" role="alert">{{ $errors->first('phone') }}</div>
			 @endif
			</br>
			{!!Form::submit('Me interesa', ['class'=> 'btn btn-primary form-control'])!!}
		</div>	
	</div>

	</br>
	</br>
	<div class="row">
		<div class="col-md-4 col-md-offset-5">
			<dl>
				<dt> Ubicación </dt>
				<dd> Zona: {{ $zona}} </dd>
		    	<dd> {{ $casa->calle}} {{ $casa->numero}} </dd>
		    	<dd> {{ $casa->colonia}}, {{ $casa->municipio}} </dd>
		    	<dd> {{ $casa->ciudad}}, {{ $casa->estado}}, {{ $casa->cp}} </dd>
		    </dl>
		 </div>

	</div>

		  <div id="map-container" ></div>		  
		  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		  <script>	
 
     		function init_map() {
				var var_location = new google.maps.LatLng({{$casa->lat}}, {{$casa->long}});
 
        		var var_mapoptions = {
          			center: var_location,
          			zoom: 14
        		};
 
				var var_marker = new google.maps.Marker({
					position: var_location,
        		    map: var_map,
					title:"Casa"});
 	
    		    var var_map = new google.maps.Map(document.getElementById("map-container"),
        	    var_mapoptions);
 
				var_marker.setMap(var_map);	
 
      		}
 
     		google.maps.event.addDomListener(window, 'load', init_map);
 
	    </script>
	<p> Nota: El mapa muestra la dirección aproximada </p>
	</div>

</br>




			
		   
		    
		    

	@stop

@stop 
