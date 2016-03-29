@extends('cresolido.index')
@section('maincontent')
<div class="container-fluid content-top">
<div class="container">
  <div class="row">
         @if($Services!=null)
         @foreach($Services as $Ser) 
            <div class="col-sm-4">    
              @if($Ser->main_picture!="")
            <img class="img-center" src='<?php echo $Ser->main_picture; ?>' alt="">
              @endif  
            <h3> <?php echo $Ser->title;  ?></h3>
            <?php echo $Ser->resumen;  ?>              
            <a class="button" href="">Leer más</a>              
            </div>
          @endforeach
        @endif
        <div class="clear"> </div>  
  </div>
</div>
</div>
<div class="container-fluid content-middle">
<div class="container">
    <div class="row">
        @if($Categories!=null)
         @foreach($Categories as $Cat) 
            <div class="col-sm-6">
              @if($Cat->main_picture!="")
              <img class="img-center" src='<?php echo $Cat->main_picture; ?>' alt="">
              @endif  
              <h3> <?php echo $Cat->title;  ?></h3>
              <p>    
                  <?php echo $Cat->resumen;  ?>
              </p>              
          </div>
          @endforeach
        @endif       
        <div class="clear"> </div>  
  </div>
  </div>
</div>

<div id="wrap">
<div class="content-bottom">
      <div class="map">
      <iframe width="100%" height="300" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3820.662324682381!2d-93.12475138457738!3d16.74369218846735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ecd85ed3ba7b1f%3A0x68cae440f6bdb040!2s13A.+Sur+Pte+640%2C+San+Francisco%2C+29000+Tuxtla+Guti%C3%A9rrez%2C+Chis.!5e0!3m2!1ses-419!2smx!4v1458274272743"  frameborder="0" style="border:0" allowfullscreen></iframe>       
       </div>
    </div>
</div>
@stop