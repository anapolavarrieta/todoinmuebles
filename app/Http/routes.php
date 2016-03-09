<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/


/*PAGINAS GENERALES */

Route::get('/', function()
{
	$casas= App\Casa::where('estatus', '=', '1')
                    ->get();
    $i='1';
    $i2='1';
    return View::make('index')->with ('i', $i)
                                  ->with ('casas', $casas)
                                  ->with ('i2', $i2);
});

Route::get('/nosotros', function()
{
	return View::make('nosotros');
});

Route::get('/contacto', function()
{
	return View::make('contacto');
});

Route::post('/contacto', function()
{
   
   $rules = array(
    'client'=>'required',
    'email'=> 'required',
    'phone'=>'required',
    'message'=>'required'
   );

    $messages = array(
        'required' => 'Es necesario ingresar los datos'
    );

   $validator = Validator::make(Input::all(), $rules,$messages);

   if ($validator->fails()) {
        $messages = $validator->messages();
        return Redirect::back()
            ->withErrors($validator)
            ->withInput(Input::get());
    } else {
   $client = Input::get('client');
   $email = Input::get('email');
   $phone = Input::get('phone');
   $inmueble = Input::get('inmueble');
   $bodymessage = Input::get('message');
   Mail::send('emails.contacto', ['client'=> $client, 'email'=>$email, 'phone'=>$phone, 'inmueble'=>$inmueble, 'bodymessage'=>$bodymessage], function($message) {
    $message->to('info@todoinmuebles.com.mx')
            ->subject('Contacto interesado');
        });
    
    return  View::make('gracias'); 
}
});

Route::get('/aviso', function()
{
    return View::make('aviso');
});


/*VENTA/RENTA/PRE-VENTA */
Route::get('/{compra}', function($compra)
{
	return View::make('venta')->with('compra', $compra);
})
->where (['compra' => '[a-z]+']);


    /*VT/RE/PV CASA/DEPA/TERRENO */
    Route::get('/{compra}/{tipo}', function($compra, $tipo)
    {
    $zonas= App\Zona::orderby('zona','asc')->get();
    $i=1;
    $d=0;
    $j=0;
    $delegaciones= DB::table('zonas')
                 ->select('delegacion')
                 ->groupBy('delegacion')
                 ->lists('delegacion');
    if($tipo== 'casa'){
            $tip= 'C';
          }
          elseif($tipo== 'depa'){
            $tip='D';
          }
          else{
            $tip='T';
          }

          if($compra== 'venta'){
            $comp= 'V';
          }
          elseif($compra== 'renta'){
            $comp='R';
          }
          else{
            $comp='PV';
          }          

          $casas= App\Casa::where('tipo', '=', $tip)
                                ->where('estado_compra', '=', $comp)
                                ->where ('estatus', '=', '1')
                                ->get();
             return View::make('ventacasa')->with ('zonas', $zonas)
                                  ->with('delegaciones', $delegaciones)
                                  ->with ('tipo', $tipo)
                                  ->with('i',$i)
                                  ->with('compra', $compra)
                                  ->with('casas',$casas)
                                  ->with('d',$d)
                                  ->with('j',$j);
    })
    ->where (['compra' => '[a-z]+', 'tipo' => '[a-z]+' ]);


        Route::get('/{compra}/{tipo}/{id}', function($compra, $tipo, $id)
        {
	      if($tipo== 'casa'){
            $tip= 'C';
          }
          elseif($tipo== 'depa'){
            $tip='D';
          }
          else{
            $tip='T';
          }

          if($compra== 'venta'){
            $comp= 'V';
          }
          elseif($compra== 'renta'){
            $comp='R';
          }
          else{
            $comp='PV';
          }          

          if($id=='0'){
		      try{
                $casas= App\Casa::where('tipo', '=', $tip)
                                ->where('estado_compra', '=', $comp)
                                ->where ('estatus', '=', '1')
                                ->get();
		        return View::make('ventacasazona')->with ('casas', $casas)
			          						  	  ->with ('id', $id)
                                                  ->with ('tipo', $tipo)
                                                  ->with('compra',$compra);	
              }
              catch(exception $e){
                return View::make('nocasas')->with('id', 'zona')
                                            ->with('tipo', $tipo)
                                            ->with('compra',$compra);
              }
	      }
	      else{
		      try{
			     $casas= App\Casa::where('zona_id', '=', $id)
                                 ->where ('tipo', '=', $tip)
                                 ->where('estado_compra', '=', $comp)
                                 ->where ('estatus', '=', '1')
                                 ->firstOrFail();
			     $casas= App\Casa::where('zona_id', '=', $id)
                                 ->where ('tipo', '=', $tip)
                                 ->where('estado_compra', '=', $comp)
                                 ->where ('estatus', '=', '1')
                                 ->get();
                 $zona = App\Zona::findOrFail($id);
			     return View::make('ventacasazona')->with ('casas', $casas)
				        				  		   ->with ('id', $id)
									  		       ->with ('zona', $zona->zona)
                                                   ->with ('tipo', $tipo)
                                                   ->with('compra', $compra);

		      }
		      catch(exception $e){
			     return View::make('nocasas')->with('id', 'zona')
                                             ->with('tipo', $tipo)
                                             ->with('compra',$compra);
		      }
		
	      }
        })
        ->where (['compra' => '[a-z]+', 'tipo' => '[a-z]+', 'id' => '[0-9]+']);;




Route::get('/casa/{id}', function($id)
{
	try{
		$casa = App\Casa::findOrFail($id);
        $zona = App\Zona::findOrFail($casa->zona_id);
       
        if($casa->estatus == 0)
            return View::make('nocasas')->with('id','ficha');

        else{

        $tip= $casa->tipo;
        $comp= $casa->estado_compra;

        if($tip== 'C'){
            $tipo= 'casa';
          }
          elseif($tip== 'D'){
            $tipo='depa';
          }
          else{
            $tipo='terreno';
          }

          if($comp== 'V'){
            $compra= 'venta';
          }
          elseif($comp== 'R'){
            $compra='renta';
          }
          else{
            $compra='preventa';
          }          

        return View::make('mostrarficha')->with('casa', $casa)
                                        -> with('zona', $zona->zona)
                                        ->with('tipo', $tipo)
                                        ->with('compra', $compra);
        }

	}
		catch(exception $e){
			return View::make('nocasas')->with('id','ficha');
	}

});

Route::post('/pdf', function()
{
   $id = Input::get('id');   
   $casa = App\Casa::findOrFail($id);
   $zona = Input::get('zona');
   $tipo = Input::get('tipo');
   $compra = Input::get('compra');


   $pdf= PDF::loadview('pdf', ['casa'=> $casa, 'zona'=>$zona, 'tipo'=>$tipo, 'compra'=>$compra]);
       
    return  $pdf->stream(); 
    
});

Route::post('/meinteresa', function()
{
   $id = Input::get('id');  
   $rules = array(
    'email'=> 'required',
    'phone'=>'required'
   );

    $messages = array(
        'required' => 'Es necesario ingresar los datos'
    );

   $validator = Validator::make(Input::all(), $rules,$messages);

   if ($validator->fails()) {
        $messages = $validator->messages();
        return Redirect::back()
            ->withErrors($validator)
            ->withInput(Input::get());
    } else {

   
   $casa = App\Casa::findOrFail($id);
   $promoemail= $casa->servicios->lists('email');
   $zona = Input::get('zona');
   $tipo = Input::get('tipo');
   $compra = Input::get('compra');
   $phone= Input::get('phone');
   $email= Input::get('email');

   $pdf= PDF::loadview('emails.ficha', ['casa'=> $casa, 'zona'=>$zona, 'tipo'=>$tipo, 'compra'=>$compra]);
   Mail::send('emails.ficha', ['casa'=> $casa, 'zona'=>$zona, 'tipo'=>$tipo, 'compra'=>$compra, 'pdf'=>$pdf], function($message) use ($email, $pdf) {
            $message->to($email)
            ->subject('Gracias por tu interes');
    });

   Mail::send('emails.promotor', ['casa'=> $casa, 'zona'=>$zona, 'tipo'=>$tipo, 'compra'=>$compra, 'email'=>$email, 'phone'=>$phone], function($message) use ($promoemail) {
            $message->to($promoemail)->cc('info@todoinmuebles.com.mx')
            ->subject('Contacto interesado en propiedad');
    });
    
    return  View::make('gracias'); 
    }
});


Route::get('/crear_casa', function()
{
	$zonas= DB::table('zonas')->orderby('zona', 'asc')->lists('zona', 'id');
	$ambientes= DB::table('ambientes')->orderby('name', 'asc')->lists('name', 'id');
	$generales= DB::table('generales')->orderby('name', 'asc')->lists('name', 'id');
	$servicios= DB::table('servicios')->orderby('name', 'asc')->lists('name', 'id');
	return View::make('crearcasa')->with ('zonas', $zonas)
								  ->with ('ambientes', $ambientes)
								  ->with ('generales', $generales)
								  ->with ('servicios', $servicios);
});

Route::post('/crear_casa',function()
{

	$casa=new App\Casa();
	$casa->zona_id=Input::get('zona');
	$casa->calle=Input::get('calle');
	$casa->numero=Input::get('numero');
	$casa->colonia=Input::get('colonia');
	$casa->municipio=Input::get('municipio');
	$casa->cp=Input::get('cp');
	$casa->ciudad=Input::get('ciudad');
	$casa->estado=Input::get('estado');
	$casa->precio=Input::get('precio');
	$casa->supconst=Input::get('supconst');
	$casa->supterr=Input::get('supterr');
	$casa->antiguedad=Input::get('antiguedad');
	$casa->recamara=Input::get('recamara');
	$casa->bano=Input::get('bano');
	$casa->mediobano=Input::get('mediobano');
	$casa->estacionamiento=Input::get('estacionamiento');
	$casa->descripcion=Input::get('descripcion');
	$casa->estatus=Input::get('estatus');
	$casa->tipo=Input::get('tipo');
	$casa->estado_compra=Input::get('estado_compra');
    $casa->imagenes=Input::get('imagenes');
    $casa->lat=Input::get('lat');
    $casa->long=Input::get('long');
	
	$casa->save(); 
	

	$casa->ambientes()->attach(Input::get('ambientes'));
	$casa->servicios()->attach(Input::get('servicios'));
  /*$casa->generales()->attach(Input::get('generales'));*/
 	return 'Se ha creado la casa';
});

Route::get('/editar_casas', function()
{
 
  $casa=App\Casa::find('118');
  $casa->estatus= '0';
  $casa->save();

  $casa=App\Casa::find('119');
  $casa->estatus= '0';
  $casa->save();

  $casa=App\Casa::find('120');
  $casa->estatus= '0';
  $casa->save();

  $casa=App\Casa::find('121');
  $casa->estatus= '0';
  $casa->save();

  $casa=App\Casa::find('115');
  $casa->zona_id='9';
  $casa->calle= 'Av Vasco dee Quiroga';
  $casa->colonia='Santa Fe';
  $casa->municipio='Alvaro Obregón';
  $casa->ciudad='Cd de Mexico';
  $casa->estado='DF';
  $casa->lat='19.375667';
  $casa->long='-99.255745';
  $casa->save();

  $casa=App\Casa::find('13');
  $casa->precio='3850000';
  $casa->save();

  $casa=App\Casa::find('2');
  $casa->precio='8500000';
  $casa->save();

/*
  
  $casa=new App\Casa();
  $casa->zona_id='44';
  $casa->calle='Av de las Torres';
  $casa->colonia='Col Torres del Potrero';
  $casa->municipio='Alvaro Obregón';
  $casa->ciudad='Cd de Mexico';
  $casa->estado='DF';
  $casa->precio='4550000';
  $casa->supconst='140';
  $casa->supterr='';
  $casa->antiguedad='2 años';
  $casa->recamara='2';
  $casa->bano='2';
  $casa->mediobano='1';
  $casa->estacionamiento='2';
  $casa->descripcion='Excelente departamento con vista espectacular. Opción a tercera recamara, sala de TV, cocina integral y área de lavado. Casa club con alberca,
  salón de fiestas, sala para niños, sala jóvenes y sala adultos, jardín y 3 terrazas. Ubicado junto a Universidad Anahuac Sur y supervia poniente';
  $casa->estatus='1';
  $casa->tipo='D';
  $casa->estado_compra='V';
  $casa->imagenes='18';
  $casa->lat='19.330885';
  $casa->long='-99.248423';
  $casa->save(); 
  $casa->ambientes()->attach([2,6,8,14,15,19]);
  $casa->servicios()->attach('15');



  */





   
    return 'Se edito';
});

Route::get('/ver_zona', function()
{
  
  $zona=App\Zona::all();

  return $zona;

});

Route::get('/crear_zona', function()
{
	return View::make('crearzona');
});

Route::post('/crear_zona',function()
{
	$zona=new App\Zona();
  $zona->zona=Input::get('zona');
  $zona->delegacion=Input::get('delegacion');
  $zona->save(); 
 

 	return 'Se ha creado la zona';
});


Route::get('/editar_servicios', function()
{
    $servicio= App\Servicio::find(1);
    $servicio->phone= '5510685454';
    $servicio->save();

    $servicio= App\Servicio::find(2);
    $servicio->phone= '5516555831';
    $servicio->save();

    $servicio= App\Servicio::find(3);
    $servicio->phone= '5521097196';
    $servicio->save();

    $servicio= App\Servicio::find(4);
    $servicio->phone= '5518340035';
    $servicio->save();

    $servicio= App\Servicio::find(5);
    $servicio->phone= '5526903667';
    $servicio->save();

    $servicio= App\Servicio::find(6);
    $servicio->phone= '5541354854';
    $servicio->save();
    return 'Se edito';
});

Route::get('/editar_zona', function()
{

    $zona=App\Zona::find('32');
    $zona->zona= 'Error4';
    $zona->save();

   

    

   
    return 'Se edito';
});


Route::get('/crear_ambiente', function()
{
	return View::make('crearambiente');
});

Route::post('/crear_ambiente',function()
{
	$ambiente=new App\Ambiente();
	$ambiente->name=Input::get('ambiente');
	$ambiente->save(); 
 	return 'Se ha creado el ambiente';
});


Route::get('/practice-creating', function() {

    # Instantiate a new Casa model class
    $casa = new App\Casa();

    # Set 
    $casa->zona = 'Santa Fe';
    $casa->calle = 'Patito2';
    $casa->numero = '151';
    $casa->colonia = 'club de golf';
    $casa->municipio = 'tlalpan';
    $casa->cp = '14620';
    $casa->ciudad = 'cd mex';
    $casa->estado = 'df';
    $casa->precio = 8500000;
    $casa->supconst = 334;
    $casa->supterr = 187;
    $casa->antiguedad = 'construccion';
    $casa->recamara = 3;
    $casa->bano = 3;
    $casa->mediobano = 1;
    $casa->estacionamiento = 1;
    $casa->descripcion = 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum
    lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum';
    $casa->ambiente= 'Estudio, cuarto de TV';
    $casa->general= 'Cuarto de servicio, centros comerciales cercanos, escuelas cercanas, niveles construidos (3), cocina integral';
    $casa->servicio = 'Seguridad privada, cisterna, calentador de agua';
    $casa->estatus = 'activa';

    # This is where the Eloquent ORM magic happens
    $casa->save();

    return 'A new house has been added! Check your database to see...';

});

Route::get('/practice-deleating', function() {

    DB::table('casas')->where('id', '=', 28)->delete();

    return 'A new house has been added! Check your database to see...';

});



Route::get('/practice-creating-ambiente', function() {

   
    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Ninguno';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Estudio/Despacho';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Cisterna';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();


    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Vigilancia 24hrs';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Vista Panoramica';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Cocina Integral';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Accesos';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Alberca';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Parques cercanos';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

   # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Chimenea';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Zona arbolada';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Calefacción';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Alacena';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Areas comunes';
    
    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Areas verdes';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Bodega';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Calle cerrada';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Cuarto de juegos';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Cuarto de lavado';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Cuarto de servicio';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Excelente ubicación';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Hidroneumático';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Jardín';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Roof Garden';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Techos doble altura';
    

    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Terraza';


    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Amueblado';

    
    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Balcón';

    
    # This is where the Eloquent ORM magic happens
    $ambiente->save();

    # Instantiate a new Casa model class
    $ambiente = new App\Ambiente();

    # Set 
    $ambiente->name = 'Semi-amueblado';

    
    # This is where the Eloquent ORM magic happens
    $ambiente->save();
    return 'A new house has been added! Check your database to see...';

});

Route::get('/practice-creating-servicios', function() {

    DB::table('servicios')->delete();
    # Instantiate a new Casa model class
    $general = new App\Servicio();

    # Set 
    $general->name = 'Paola Figueroa';
    $general->email= 'paola@todoinmuebles.com.mx';
    

    # This is where the Eloquent ORM magic happens
    $general->save();

    # Instantiate a new Casa model class
    $general = new App\Servicio();

    # Set 
    $general->name = 'Romy Ayala';
    $general->email= 'romy@todoinmuebles.com.mx';
    

    # This is where the Eloquent ORM magic happens
    $general->save();

    # Instantiate a new Casa model class
    $general = new App\Servicio();

    # Set 
    $general->name = 'Marcela Puga';
    $general->email= 'marcelap@todoinmuebles.com.mx';

    # This is where the Eloquent ORM magic happens
    $general->save();

    # Instantiate a new Casa model class
    $general = new App\Servicio();

    # Set 
    $general->name = 'Paloma Martinez';
    $general->email= 'paloma@todoinmuebles.com.mx';

    # This is where the Eloquent ORM magic happens
    $general->save();

    # Instantiate a new Casa model class'
    $general = new App\Servicio();

    # Set 
    $general->name = 'Cristhian Barona';
    $general->email= 'cristhian@todoinmuebles.com.mx';

    # This is where the Eloquent ORM magic happens
    $general->save();

    # Instantiate a new Casa model class
    $general = new App\Servicio();

    # Set 
    $general->name = 'Cristina Staines';
    $general->email= 'cristina@todoinmuebles.com.mx';
    

    # This is where the Eloquent ORM magic happens
    $general->save();

    return 'A new house has been added! Check your database to see...';

});

Route::get('/practice-reading', function() {

    # The all() method will fetch all the rows from a Model/table
    $casas = App\Casa::all();

    # Make sure we have results before trying to print them...
    if($casas->isEmpty() != TRUE) {

        # Typically we'd pass $casas to a View, but for quick and dirty demonstration, let's just output here...
        foreach($casas as $casa) {
            echo $casa->id.'<br>';
            echo $zona->name.'<br>';
        }
    }
    else {
        return 'No houses found';
    }

});

Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    echo Pre::render($results);

});

# /app/routes.php
Route::get('/debug1', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});