	
	<div>
		<a href='/' ><img src= "www.todoinmuebles.com.mx/images/logo.jpg" alt="TodoInmuebles Logo"/></a>
	</div>

	<div>

	<h2 style="text-align:center"> El cliente {{$email}} esta interesado en la siguiente propiedad </h2>

	</div>
	
	<h3> {{ucfirst($tipo)}} en {{$compra}} </h3> 

	<div >

			</br>
			<dl>
				<dt> Ubicación </dt>
		    	<dd> {{ $casa->calle}} {{ $casa->numero}} </dd>
		    	<dd> {{ $casa->colonia}}, {{ $casa->municipio}} </dd>
		    	<dd> {{ $casa->ciudad}}, {{ $casa->estado}}, {{ $casa->cp}} </dd>
			<dl>
				@if (@$casa->tipo == 'T')
					<p> Precio por m2: ${{ $english_format_number = number_format(@$casa->precio)}} USD</p>
				@else
					<p>Precio: ${{ $english_format_number = number_format(@$casa->precio)}} </p>
				@endif
			</dl>
			</br>
			<dl>
				@if (@$casa->tipo == 'T')
					<p>Metros Fondo: {{ @$casa->bano}}  </p>
				@else
					<p>Baños: {{ @$casa->bano}}  </p>
				@endif
			</dl>
			</br>
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
	</div>


		<div >
			</br>
			<dl>
				@if (@$casa->tipo != 'T')
					<p>Superficie: {{ @$casa->supconst}} m2 </p>
				@else
					<p>Superficie Construcción: {{ @$casa->supconst}} m2 </p>
				@endif
			</dl>
			</br>
			<dl>
				@if (@$casa->tipo == 'T')
					<p>Metros Frente: {{ @$casa->recamara}} </p>
				@else
					<p>Antiguedad: {{ @$casa->antiguedad}} </p>
				@endif
			</dl>
			</br>
			@if (@$casa->tipo != 'T')
				<dl>
					<p>Medio baño: {{ @$casa->mediobano}} </p>
				</dl>
			@endif
		</div>
		
		<div >
			</br>
			<dl>
				<dt>Superficie Terreno: </dt>
					@if(@$casa->supterr != '0')
						<p> {{ @$casa->supterr}} m2 </p>
					@else
						<p> N/A </p>
					@endif
			</dl>
			</br>
			<dl>
				@if (@$casa->tipo == 'T')
					<p>Antiguedad: {{ @$casa->antiguedad}} </p>
				@else
					<p>Recamaras: {{ @$casa->recamara}} </p>
				@endif
			</dl>
			</br>
			@if (@$casa->tipo != 'T')
				<dl>
					<p>Estacionamiento: {{ @$casa->estacionamiento}}  </p>
				</dl>
			@endif
		</div>

		<div >
			</br>
			</br>
			<dl>
				<d>Descripción: </dt>
				<dd> {{ @$casa->descripcion}}</dd>
			</dl>
		</div>
		
	
	


			
		   
