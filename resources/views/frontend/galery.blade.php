@extends('frontend.index')
@section('content')






 <div class="container">
 <br>
 <hr>
 <?php $cont=0;  $aux=0;?>
 @foreach($media as $med)
 
 				@if($cont==3)
				    <?php echo "&nbsp<br>" ?>
 				@endif
 		
 @if($media!=null)
 	  @if($med->pic==null)
              <div></div>
  		                   <div class="col-md-4">
                            <div class="panel panel-primary" style="width:270px;">
                           <div class="panel-heading">                                  
                                    <?php echo $med->title?>
                                </div> 
                      <img class=" img-center" width="100px"; height="150px" src="../../../store/CAT/		nodisponible.png ?>">
                       <div class="panel-footer">
                                <?php echo $med->description?> 
                               </div>
                      </div>
                      </div>
    @else
       @if($med->id==$med->idal && $aux!=$med->id && $med->pic!=null)
            <div class="col-md-4">
						    <div class="panel panel-primary" style="width:270px;">
                     	         <div class="panel-heading">                                  
                      	            <?php echo $med->title?>
                      	        </div>                             
                     		 <img class=" img-center" width="280px" height="150px" src="<?php echo $med->pic?>" alt="">                              
                            	 <div class="panel-footer">
                            	  <?php echo $med->description?> 
                        	     </div>
     		          	</div>
            </div>
                    <?php $cont++; ?>                    
                    <?php $aux=$med->id; ?>

        @endif

    @endif

 @else  
 	     <br> 
       <h2>No existe contenido en esta sección</h2>
@endif
@endforeach
 </div>
@stop









<!--
@foreach($items as $pics)
 				@if($cont==3)
				    <?php echo "&nbsp<br>" ?>
 				@endif
 		<div class="col-md-4">

 			 @if($items!=null)
 			 	 @if($pics->path==null)
              <!--<div></div>
  		                   <div class="col-md-12">
                      <img class=" img-center" width="100px"; height="200px" src="../../../store/CAT/		nodisponible.png ?>">
                      </div>-->
    		     <!--@else
      
						<div class="panel panel-primary" style="width:270px;">
                     	         <div class="panel-heading">                                  
                      	            <?php echo $pics->album?>
                      	        </div>                             
                     		<img class=" img-center" width="280px" height="150px" src="<?php echo $pics->path?>" alt="">                              
                            	 <div class="panel-footer">
                            	  <?php echo $pics->descripcion?> 
                        	     </div>
     		          	</div> 
    		<?php $cont++; ?>
    		    @endif
</div>
 @else  
 	 <br> 
     <h2>No existe contenido en esta sección</h2>

     @endif
     @endforeach -->