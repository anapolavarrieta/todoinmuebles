	
	<style>
	body {
		width: 100% !important;
		-webkit-text-size-adjust: 100%;
		-ms-text-size-adjust: 100%;
		margin: 0;
		padding: 0;
	}

	#background_table {
		margin: 0;
		padding: 0;
		width: 100%!important;
		line-height: 100%!important;
	}

	img {
		outline: none;
		text-decoration: none;
		border: none;
		-ms-interpolation-mode: bicubic;
		max-width:100%;
		height:auto;
		display: block;
	}

	table td {
		border-collapse: collapse;
		vertical-align: middle;
		font-family: Helvetica, arial, sans-serif;
		font-size: 14px;
		text-align:center;
	}

	table {
		border-collapse: collapse;
		mso-table-lspace: 0pt;
		mso-table-rspace: 0pt;
	}

	table[class="body_table"] {
		width: 600px;
	}

	table[class="column_table"] {
		width: 180px;
	}

	table[class="spacer_table"] {
		width: 30px;
		height:30px;
	}

	table[class="spacer_table"] td {
	 	font-size:1px;
	 	line-height:1px;
	 	mso-line-height-rule: exactly;
	}

	@media only screen and (max-width: 480px) {
		table[class="body_table"] {
			width: 80%!important;
		}
		table[class="column_table"] {
			width: 100%!important;
		}
	}
	
	</style>

	<table width="100%" cellpadding="0" cellspacing="0" border="0" id="background_table">
		<tbody>
			<tr>
			<td>
<!-- end of background table start -->
				<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="body_table">	
					<tbody>
						<tr>
							<td width="100%" height="10">&nbsp; </td>
						</tr>
						<tr>
							<td width="100%" height="100">
								<div>
									<a href='www.todoinmuebles.com.mx' ><img src= "http://www.todoinmuebles.com.mx/images/logo.jpg" alt="TodoInmuebles Logo"/></a>
								</div>
								<div>

									<h2 style="text-align:center"> Gracias por tu interés en la propiedad de Todoinmuebles. </h2>
									<h3 style="text-align:center"> En breve nos pondremos en contacto contigo </h3>
								</div>
							</td>
						</tr>
						<tr>
							<td width="100%" height="10">&nbsp;</td>
						</tr>
					</tbody>
				</table>
<!-- 3 columns -->
				<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="body_table">
					<tbody>
						<tr>
							<td width="100%">
									<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="body_table">
										<tbody>
											<tr>
												<td>
<!-- col 1 -->
													<table width="180" height="300" align="left" border="0" cellpadding="0" cellspacing="0" class="column_table">
														<tbody>
															<tr>
																<td>
																	<a href='www.todoinmuebles.com.mx/casa/{{@$casa->id}}' >
																		<img src= "www.todoinmuebles.com.mx/images/collage/collage{{$casa->id}}.jpg" alt="TodoInmuebles Collage"/>
																	</a>
																</td>
															</tr>
														</tbody>
													</table>
<!-- end of col 1 -->
<!-- spacing -->
													<table width="30" align="left" border="0" cellpadding="0" cellspacing="0" class="spacer_table">
														<tbody>
															<tr>
																<td width="100%" height="15">&nbsp;</td>
															</tr>
														</tbody>
													</table>
<!-- end of spacing -->
<!-- col 2 -->
													<table width="180" height="300" align="left" border="0" cellpadding="0" cellspacing="0" class="column_table">
														<tbody>
															<tr>
																<td>
																	<h3> {{ucfirst($tipo)}} en {{$compra}} </h3> 
																	<div></br>
																		<dt> Ubicación </dt>
																			<dd> {{ $casa->calle}} {{ $casa->numero}} </dd>
																			<dd> {{ $casa->colonia}}, {{ $casa->municipio}} </dd>
																			<dd> {{ $casa->ciudad}}, {{ $casa->estado}}, {{ $casa->cp}} </dd>
																			<dl>
																				@if (@$casa->tipo == 'T')
																					<p> Precio por m2: ${{ $english_format_number = number_format(@$casa->precio)}} USD</p>
																				@else
																					@if ($casa->id == '60' or $casa->id == '61')
																						<p> Precio: ${{ $english_format_number = number_format($casa->precio)}} USD </p>
																					@else
																						<p> Precio: ${{ $english_format_number = number_format($casa->precio)}} </p>
																					@endif
																				@endif
																			</dl> </br>
																			<dl>
																				@if (@$casa->tipo == 'T')
																					<p>Metros Fondo: {{ @$casa->bano}}  </p>
																				@else
																					<p>Baños: {{ @$casa->bano}}  </p>
																				@endif
																			</dl></br>
																			<dl>
																				@if (@$casa->tipo != 'T')
																					<p>Superficie: {{ @$casa->supconst}} m2 </p>
																				@else
																					<p>Superficie Construcción: {{ @$casa->supconst}} m2 </p>
																				@endif
																			</dl></br>
																			<dl>
																				@if (@$casa->tipo == 'T')
																					<p>Metros Frente: {{ @$casa->recamara}} </p>
																				@else
																					<p>Antiguedad: {{ @$casa->antiguedad}} </p>
																				@endif
																			</dl></br>
																			@if (@$casa->tipo != 'T')
																				<dl>
																					<p>Medio baño: {{ @$casa->mediobano}} </p>
																				</dl></br>
																			@endif
																			<dl>
																				<p>
																					Superficie Terreno: 
																					@if(@$casa->supterr != '0')
																						{{ @$casa->supterr}} m2 
																					@else
																						N/A
																					@endif
																				</p>
																			</dl></br>
																			<dl>
																				@if (@$casa->tipo == 'T')
																					<p>Antiguedad: {{ @$casa->antiguedad}} </p>
																				@else
																					<p>Recamaras: {{ @$casa->recamara}} </p>
																				@endif
																			</dl></br>
																			@if (@$casa->tipo != 'T')
																				<dl>
																					<p>Estacionamiento: {{ @$casa->estacionamiento}}  </p>
																				</dl>
																			@endif
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
<!-- end of col 2 -->
												</td>
											</tr>
										</tbody>
									</table>
							</td>
						</tr>
					</tbody>
				</table>
<!-- end of 3 columns -->
<!-- footer -->
				<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="body_table">
					<tbody>
						<tr>
							<td width="100%">
								<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="body_table">
									<tbody>
										<tr>
											<td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
										</tr>
										<tr>
											<td width="100%"  height="100">
												<div></br></br>
													<dl>
														<dt>Descripción: </dt>
														<dd> {{ @$casa->descripcion}}</dd>
													</dl>
												</div>
												<div></br></br>
													<h2> Revisa la propiedad en nuestra <a href='www.todoinmuebles.com.mx/casa/{{$casa->id}}'>página </a></h2>
												</div>
											</td>
										</tr>
										<tr>
											<td width="100%" height="10">&nbsp;</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
<!-- end of footer -->
<!-- end of background table-->
			</td>
			</tr>
		</tbody>
	</table>
		
		
			
			

	
	


			
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
	


		