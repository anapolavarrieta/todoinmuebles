<!DOCTYPE html>
<html lang="en">

@extends('_master')

	@section ('content')
  <div class="container">
    <!-- Start WOWSlider.com BODY section -->
    <div id="wowslider-container1">
      <div class="ws_images">
        <ul>
          @foreach ($casas as $casa)
            @if($casa->id==61)
              {{$i= $i+1}}
            @else
              <li><a href='/casa/{{$casa->id}}' target="_blank"><img src="data2/images/casa{{$casa->id}}/imagen1.jpg" alt="Imagen{{$i}}" title="Zona: {{$casa->colonia}}" id="wows1_0"/></a></li>
              {{$i= $i+1}}
            @endif
          @endforeach
        </ul>
      </div>
    <div class="ws_bullets">
      <div>
        @foreach ($casas as $casa)
          @if($casa->id==61)
            {{$i2=$i2+1}}
          @else
            <a href="#" title="Imagen{{$i2}}"><span><img src="data2/tooltips/casa{{$casa->id}}/imagen1.jpg" alt="Imagen{{$i2}}"/>{{$i2}}</span></a>
            {{$i2=$i2+1}}
          @endif
        @endforeach
      </div>
    </div>
    <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com/vi">jquery image gallery</a> by WOWSlider.com v7.7</div>
    <div class="ws_shadow"></div>
   </div>  


    <script type="text/javascript" src="engine1/wowslider.js"></script>
    <script type="text/javascript" src="engine1/script.js"></script>
    <!-- End WOWSlider.com BODY section -->
  
  </div>


</body>
@stop
@stop

