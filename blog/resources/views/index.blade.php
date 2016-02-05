@extends('layouts.principal')

@section('content')

<!--  slider    -->
<section  id="miSlide" class="carousel slide row">
                <ol class="carousel-indicators">
                    <li data-target="#miSlide" data-slide-to="0" class="active"></li>
                    <li data-target="#miSlide" data-slide-to="1"></li>
                    <li data-target="#miSlide" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img src="imagenes/img1.jpg" class="adaptar">
                    </div>
                    <div class="item">
                        <img src="imagenes/img2.jpg" class="adaptar">
                    </div>
                    <div class="item">
                        <img src="imagenes/img3.jpg" class="adaptar">
                    </div>
                </div>

                <a href="#miSlide" class="left carousel-control" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a href="#miSlide" class="right carousel-control" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </section>
     
       
  
<!--termina slider-->

<!--  Section Ofrecemos    -->
    <div>
    <img class="imgOfrecemos" src="imagenes/Ofrecemos.png" class="img-reponsive" width="220" height="120">
    </div>
<!-- fin   -->


 
<div class="separadorHeder"></div>

<!--  Section Texto   -->

      <div class="col-md-6 colorTexto">
       <p>This page is about the human-like machine; for Bot accounts on Wikipedia, see Wikipedia:Bots The Honda ASIMO robotA robot is an artificial agent, meaning it acts as a substitute for a person, doing things it is designed for.Robots are usually machines controlled by a computer program or electronic circuitry. They may be directly controlled by humans. They may be designed to look like humans, in which case their behaviour may suggest intelligence or thought. Most robots do a specific job, and they do not look like humans. They can come in many forms.[1] In fiction, however, robots usually look like people, and seem to have a life of their own.[2] There are many books, movies, and video games with robots in them. Isaac Asimov's I, Robot is perhaps the most famous.</p>
       </div>
  
  <!--  Formulario     -->
 <form class="formSolicitud" action="" methos="POST">
       
      
      
        <div class="col-xs-3  well positionForm">
              <div class="LabelForm textSpam" > !SOLICITA UNA COTIZACIÓN AQUÍ!</div>
              <label class="LabelForm"  form="nombre separacion">Nombre:</label>
              <input type="text" class="form-control separacion" id="nombre" name="txtNombre" required autofocus>
              <label class="LabelForm" form="email">Email:</label>
              <input type="email" class="form-control separacion" id="email"  name="txtEmail" >
              <label class="LabelForm" form="nombre">Monto aproximado a Solicitar:</label>
              <input type="text" class="form-control separacion" id="monto" name="txtMonto" >
              <label class="LabelForm" form="nombre">Ventas Mensuales Aproximadas:</label>
              <input type="text" class="form-control separacion" id="xxxx" name="xxx" >
              <label class="LabelForm" form="nombre">Oficio o Profesión:</label>
              <input type="text" class="form-control separacion" id="profesion" name="txtProfesion" >
              <label class="LabelForm" form="nombre">Destino del crédito:</label>
              <input type="text" class="form-control separacion" id="destino" name="txtDestino" >
              <label class="LabelForm" form="nombre">Información adicional:</label>
              <textarea class="form-control  separacion" id="informacion" name="txtInformacion"></textarea>
              <div class="col-xs-12">
                <buttom class="btn btn-lg btn-primary btn-block btnSolicitar separacion" type="submit">Solicitar</buttom>
              </div>
           </div>
  
      </form>
  
<!--Fin Formulario   -->
@endsection