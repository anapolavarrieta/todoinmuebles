<div>
	<a href='www.todoinmuebles.com.mx' ><img src= "http://www.todoinmuebles.com.mx/images/logo.jpg" alt="TodoInmuebles Logo"/></a>
</div>

		
																
<h2 style="text-align:center"> {{ucfirst($tipo)}} en {{$compra}} </h2> 
<div>
	<center>
		<a  href='www.todoinmuebles.com.mx/casa/{{@$casa->id}}' >
			<img   src= "http://www.todoinmuebles.com.mx/images/collage/collage{{$casa->id}}.jpg" alt="TodoInmuebles Collage"/>
		</a>
	</center>
</div>

<div></div>
<div>

	<dt> Ubicación </dt>
		<dd> {{ $casa->calle}} {{ $casa->numero}} </dd>
		<dd> {{ $casa->colonia}}, {{ $casa->municipio}} </dd>
		<dd> {{ $casa->ciudad}}, {{ $casa->estado}}, {{ $casa->cp}} </dd>
		
	@if (@$casa->tipo == 'T')
		<p> Precio por m2: ${{ $english_format_number = number_format(@$casa->precio)}} USD</p>
	@else
		@if ($casa->id == '60' or $casa->id == '61')
			<p> Precio: ${{ $english_format_number = number_format($casa->precio)}} USD </p>
		@else
			<p>Precio: ${{ $english_format_number = number_format($casa->precio)}} </p>
		@endif
	@endif
	
	@if (@$casa->tipo == 'T')
		<p>Metros Fondo: {{ @$casa->bano}}  </p>
	@else
		<p>Baños: {{ @$casa->bano}}  </p>
	@endif
	
	@if (@$casa->tipo != 'T')
		<p>Superficie: {{ @$casa->supconst}} m2 </p>
	@else
		<p>Superficie Construcción: {{ @$casa->supconst}} m2 </p>
	@endif

	@if (@$casa->tipo == 'T')
		<p>Metros Frente: {{ @$casa->recamara}} </p>
	@else
		<p>Antiguedad: {{ @$casa->antiguedad}} </p>
	@endif
																			
	@if (@$casa->tipo != 'T')
		<p>Medio baño: {{ @$casa->mediobano}} </p>
	@endif

	<p>Superficie Terreno: 
		@if(@$casa->supterr != '0')
			{{ @$casa->supterr}} m2 
		@else
			N/A
		@endif
	</p>
	
	@if (@$casa->tipo == 'T')
		<p>Antiguedad: {{ @$casa->antiguedad}} </p>
	@else
		<p>Recamaras: {{ @$casa->recamara}} </p>
	@endif
																		
	@if (@$casa->tipo != 'T')
		<p>Estacionamiento: {{ @$casa->estacionamiento}}  </p>
	@endif

	<dt>Asesor: </dt>
		@foreach ($casa->servicios as $asesor)	
						<dd> {{ $asesor->phone }}</dd>
						<dd>	{{ $asesor->email }} </dd>	
		@endforeach </dd>
</div>
																
<div></br></br>
	<dl>
		<dt>Descripción: </dt>
		<dd> {{ @$casa->descripcion}}</dd>
	</dl>
</div>
												
<div></br></br>
	<h2 style="text-align:center"> Revisa la propiedad en nuestra <a href='www.todoinmuebles.com.mx/casa/{{$casa->id}}'>página </a></h2>
</div>
											

		
		
			
			

	
	


			
		{{-- 	@if (@$casa->tipo != 'T') --}}
		{{--		<dl>--}}
		{{--			<dt>Ambientes </dt>--}}
		{{--		--}}
		{{--			@foreach ($casa->ambientes as $ambiente)--}}
		{{--				@if($ambiente->name != 'Ninguno')--}}
		{{--					<li> {{$ambiente->name}}</li>--}}
		{{--				@endif--}}
		{{--			@endforeach--}}
		{{--		</dl>--}}
		{{--	@endif--}}
	


		