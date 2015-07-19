@extends('_master')

	@section ('title')
		Contacto
	@stop

	@section ('content')
		<h2 id="contacto"> Contactanos </h2>
		@if ($errors->has())
					<div class="alert alert-success"> Es necesario introducir la información correcta </div>
		@endif
		{!! Form::open(array('url'=>'/contacto'))!!}
			{!!Form::label('client','Nombre:')!!}
			{!!Form::text('client', null, ['class' => 'form-control'])!!}
			</br>
			@if ($errors->has('client')) 
				<div class="alert alert-danger" role="alert">{{ $errors->first('client') }}</div>
			 @endif
			<br>
			{!!Form::label('email','E-mail:')!!}
			{!!Form::email('email', null, ['class' => 'form-control'])!!}
			</br>
			@if ($errors->has('email')) 
				<div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
			 @endif
			<br>
			{!!Form::label('phone','Teléfono/Celular:')!!}
			{!!Form::input('number', 'phone', null, ['class' => 'form-control'])!!}
			</br>
			@if ($errors->has('phone')) 
				<div class="alert alert-danger" role="alert">{{ $errors->first('phone') }}</div>
			 @endif
			<br>
			{!!Form::label('inmueble','Inmueble:')!!}
			{!!Form::text('inmueble', null, ['class' => 'form-control'])!!}
			<br>
			{!!Form::label('message','Mensaje:')!!}
			{!!Form::textarea('message', '', array('placeholder'=>'Dejanos tu mensaje', 'class' => 'form-control'))!!}
			</br>
			@if ($errors->has('message')) 
				<div class="alert alert-danger" role="alert">{{ $errors->first('message') }}</div>
			 @endif
			<br>
			{!!Form::submit('Enviar', ['class'=> 'btn btn-primary form-control'])!!}

	@stop

@stop 