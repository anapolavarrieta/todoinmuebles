@extends('_master')

	@section ('title')
		Contacto
	@stop

	@section ('content')
		<h2 id="contacto"> Contactanos </h2>
		{!! Form::open(array('url'=>'/contacto'))!!}
			{!!Form::label('client','Nombre:')!!}
			{!!Form::text('client', null, ['class' => 'form-control'])!!}
			<br><br>
			{!!Form::label('email','E-mail:')!!}
			{!!Form::email('email', null, ['class' => 'form-control'])!!}
			<br><br>
			{!!Form::label('phone','Teléfono/Celular:')!!}
			{!!Form::input('number', 'phone', null, ['class' => 'form-control'])!!}
			<br><br>
			{!!Form::label('inmueble','Inmueble:')!!}
			{!!Form::text('inmueble', null, ['class' => 'form-control'])!!}
			<br><br>
			{!!Form::label('message','Mensaje:')!!}
			{!!Form::textarea('message', '', array('placeholder'=>'Dejanos tu mensaje', 'class' => 'form-control'))!!}
			<br>
			{!!Form::submit('Enviar', ['class'=> 'btn btn-primary form-control'])!!}
			
	@stop

@stop 