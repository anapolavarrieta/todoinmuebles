
<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield ('title', 'TodoInmuebles')</title>
	<meta charset="utf-8">
	<meta name="google-site-verification" content="DJaAYDMJtsTmxljw21P9Dm1_Y_ATYE8_dDKwEC9EJiQ" />
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
      

      <@yield('content')
      	
	</div>

	
	@yield('body')
	@yield ('footer')
</br></br>

<table class="table table-bordered">
	<thead>
		<tr>
			<th class="text-center">Select</th>
			<th class="text-center">Reservation</th>
			<th class="text-center">Name </th>
			<th class="text-center">Check-in</th>
			<th class="text-center">Check-out</th>
			<th class="text-center">Room #</th>
			<th class="text-center">Room type </th>
			<th class="text-center">#Guests </th>
			<th class="text-center">Comments </th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td class="text-center"><input type="checkbox"></td>
			<td class="text-center"><a>00000001</a></td>
			<td class="text-center">Linda Young</td>
			<td class="text-center">22/12/2015</td>
			<td class="text-center">30/12/2015</td>
			<td class="text-center">102</td>
			<td class="text-center">Estandar</td>
			<td class="text-center">5</td>
			<td class="text-center">Non smoking</td>
		</tr>
		<tr>
			<td class="text-center"><input type="checkbox"></td>
			<td class="text-center"><a>00000010</a></td>
			<td class="text-center">Linda Young</td>
			<td class="text-center">22/12/2015</td>
			<td class="text-center">30/12/2015</td>
			<td class="text-center">202</td>
			<td class="text-center">Big</td>
			<td class="text-center">5</td>
			<td class="text-center">Wants bottle water in room</td>
		</tr>
	</tbdoy>


</table>

</br></br>
<div class="row">
	<div class= "col-md-1">
	</div>
		<div class= "col-md-5">
			<h4> Reservation #  00000011 </h4>
<form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Client's name</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Peter Wilson">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Check-out date</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword3" placeholder="">
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Room number</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword3" placeholder="4">
    </div>
  </div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Status</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Confirmed">
    </div>
  </div>
</div>

<div class= "col-md-5">
</br></br></br></br>
<form class="form-horizontal">
<div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Check-out date</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword3" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Room number</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword3" placeholder="4">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Status</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Confirmed">
    </div>
  </div>
</form>
</div>
</div>
<div class="row">
	<div class= "col-md-1">
	</div>
		<div class= "col-md-10">

	
			<form >
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Additional info</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Wants bottle water in room">
    </div>
  </div>
</form>
</div>
</div>

  
  
</form>
</div>
</div>
</br></br>


	<div class="row">
		<div class= "col-md-1">
		</div>
	<div class= "col-md-3">
	<button type="button" class="btn btn-info btn-lg">Save changes</button>
</div>
<div class= "col-md-3">
	<button type="button" class="btn btn-info btn-lg">Print</button>
</div>
<div class= "col-md-3">
	<button type="button" class="btn btn-info btn-lg">Cancel booking</button>
</div>
</div>
</br></br>
<button type="button" class="btn btn-success btn-block">Search again</button>
</br></br>

</body>