
<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield ('title', 'TodoInmuebles')</title>
	<meta charset="utf-8">
	<link href="{{URL::asset('/css/Bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{URL::asset('/css/style.css')}}" type="text/css"> 
	<link href="http://fonts.googleapis.com/css?family=Nobile" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
	<script src="{{URL::asset('/css/Bootstrap/js/bootstrap.min.js')}}"></script>


	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/engine1/style.css')}}" />
	<script type="text/javascript" src="{{URL::asset('/engine1/jquery.js')}}"></script>
	<!-- End WOWSlider.com HEAD section -->

<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="{{URL::asset('/engine2/style.css')}}" />
<script type="text/javascript" src="{{URL::asset('/engine2/jquery.js')}}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- End WOWSlider.com HEAD section -->
</head>

<body>
	<div class="container">
		</br>
		<div class="row">
			<div class= "col-md-10 col-xs-7 col-sm-9" >
		<a href='/' ><img src= "{{URL::asset('/images/logo.jpg')}}" alt="TodoInmuebles Logo"/></a>
		</div>
		<div class= "col-md-2 col-xs-6 col-sm-3">
				</br></br>
				<a href='https://www.facebook.com/todoinmuebles1'target="_blank" ><img src= "{{URL::asset('/images/facebook.png')}}" alt="TodoInmuebles Logo"/></a>
				<a href='https://twitter.com/TodoInmuebles1'target="_blank" ><img src= "{{URL::asset('/images/twitter.png')}}" alt="TodoInmuebles Logo"/></a>
			</div>

		</div>
		
		</br>
		
		<div class="navbar navbar-default" role="navigation">
	        <div class="navbar-header">
    		     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        			<span class="sr-only">Toggle navigation</span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
          		</button>
          	</div>
        	<div class="collapse navbar-collapse">
        		<ul class="nav navbar-nav">
					<li id="navpart1"><a href='/'>Inicio </a></li>
					<li id="navpart2"><a href='/nosotros'>Nosotros</a></li>
            		<li id="navpart3"><a href='/venta'>Ventas</a></li>
            		<li id="navpart4"><a href='/renta'>Renta</a></li>
					<li id="navpart5"><a href='/preventa'>Pre-venta</a></li>
					<li id="navpart5"><a href='/contacto'>Contacto</a></li>
					<li id="navpart5"><a href='/aviso'>Aviso Privacidad</a></li>

				</ul>
		  	</div>
      
  
  
</div>
      	
      	@yield('content')
      	
	</div>

	
	@yield('body')
	@yield ('footer')

</body>