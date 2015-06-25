 
<h2> Crear Casa </h2>
        {!! Form::open(array('url'=>'/crear_casa'))!!}
            {!!Form::label('zona','Zona:')!!}
            {!!Form::select('zona', $zonas , Input::old('zona')) !!}
            <br><br>
            {!!Form::label('calle','Calle:')!!}
            {!!Form::text('calle', null, ['class' => 'form-control'])!!}
            <br><br>
            {!!Form::label('numero','Número:')!!}
            {!!Form::text('numero', null, ['class' => 'form-control'])!!}
            <br><br>
            {!!Form::label('Colonia','Colonia:')!!}
            {!!Form::text('colonia', null, ['class' => 'form-control'])!!}
            <br><br>
            {!!Form::label('municipio','Municipio:')!!}
            {!!Form::text('municipio', null, ['class' => 'form-control'])!!}
            <br><br>
            {!!Form::label('cp','CP:')!!}
            {!!Form::text('cp', null, ['class' => 'form-control'])!!}
            <br><br>
            {!!Form::label('ciudad','Ciudad:')!!}
            {!!Form::text('ciudad', null, ['class' => 'form-control'])!!}
            <br><br>
            {!!Form::label('estado','Estado:')!!}
            {!!Form::text('estado', null, ['class' => 'form-control'])!!}
            <br><br>
            {!!Form::label('precio','Precio:')!!}
            {!!Form::input('number', 'precio', null)!!}
            <br><br>
            {!!Form::label('supconst','Sup. Construccion:')!!}
            {!!Form::input('number', 'supconst', null)!!}
            <br><br>
            {!!Form::label('supterr','Sup. Terreno:')!!}
            {!!Form::input('number', 'supterr', null)!!}
            <br><br>
            {!!Form::label('antiguedad','Antiguedad:')!!}
            {!!Form::text('antiguedad', null, ['class' => 'form-control'])!!}
            <br><br>
            {!!Form::label('recamara','Recamaras:')!!}
            {!!Form::input('number', 'recamara', null)!!}
            <br><br>
            {!!Form::label('bano','Bano:')!!}
            {!!Form::input('number', 'bano', null)!!}
            <br><br>
            {!!Form::label('mediobano','Mediobano:')!!}
            {!!Form::input('number', 'mediobano', null)!!}
            <br><br>
            {!!Form::label('estacionamiento','Estacionamiento:')!!}
            {!!Form::input('number', 'estacionamiento', null)!!}
            <br><br>
            {!!Form::label('descripcion','Descripcion:')!!}
            {!!Form::textarea('descripcion', null)!!}
            <br><br>
            {!!Form::label('ambientes','Ambientes:')!!}
            {!!Form::select('ambientes[]', $ambientes, null, ['class' => 'form-control', 'multiple'])!!}
            <br><br>
            {!!Form::label('generales','Generales:')!!}
            {!!Form::select('generales[]', $generales, null, ['class' => 'form-control', 'multiple'])!!}
            <br><br>
            {!!Form::label('servicios','Servicios:')!!}
            {!!Form::select('servicios[]', $servicios, null, ['class' => 'form-control', 'multiple'])!!}
            <br><br>
            {!!Form::label('estatus','Estatus:')!!}
            {!!Form::select('estatus', array(
                '1'=> 'Activo',
                '0'=> 'Inactivo'))!!}
            <br><br>
            {!!Form::label('tipo','Tipo:')!!}
            {!!Form::select('tipo', array(
                'C'=> 'Casa',
                'D'=> 'Departamento',
                'T'=> 'Terreno'))!!}
            <br><br>
            {!!Form::label('estado_compra','Estado_compra:')!!}
            {!!Form::select('estado_compra', array(
                'V'=> 'Venta',
                'R'=> 'Renta',
                'PV'=> 'Pre_venta'))!!}
            <br><br>
            {!!Form::label('imagenes','Imagenes:')!!}
            {!!Form::input('number', 'imagenes', null)!!}
            <br><br>
            {!!Form::label('lat','Latitud:')!!}
            {!!Form::text('lat', null, ['class' => 'form-control'])!!}
            <br><br>
            {!!Form::label('long','Longitud:')!!}
            {!!Form::text('long', null, ['class' => 'form-control'])!!}
            <br><br>
            
            
            {!!Form::submit('Enviar', ['class'=> 'btn btn-primary form-control'])!!}
