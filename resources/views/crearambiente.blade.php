@extends('_master')
@section('content')
<h2> Crear Ambiente </h2>
        {!! Form::open(array('url'=>'/crear_ambiente'))!!}
            {!!Form::label('ambiente','Ambiente:')!!}
            {!!Form::text('ambiente', null, ['class' => 'form-control'])!!}
            <br><br>
            {!!Form::submit('Enviar', ['class'=> 'btn btn-primary form-control'])!!}
@stop