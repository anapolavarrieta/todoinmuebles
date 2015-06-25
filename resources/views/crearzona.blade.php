@extends('_master')
@section('content')
<h2> Crear Zona </h2>
        {!! Form::open(array('url'=>'/crear_zona'))!!}
            {!!Form::label('zona','Zona:')!!}
            {!!Form::text('zona', null, ['class' => 'form-control'])!!}
            <br><br>
            {!!Form::label('delegacion','Delegacion:')!!}
            {!!Form::text('delegacion', null, ['class' => 'form-control'])!!}
            <br><br>
            {!!Form::submit('Enviar', ['class'=> 'btn btn-primary form-control'])!!}
@stop