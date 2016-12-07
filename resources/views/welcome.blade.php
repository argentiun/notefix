@extends('layouts.app')

@section('titulo')
  Inicio
@endsection

@section('contenido')
  <!--- ACA TERMINA LO QUE VA EN HEADER.PHP  SOLO TOOGLE NAV -->
   <!-- Header Carousel -->
   <header id="myCarousel" class="carousel slide">
       <!-- Indicators -->
       <ol class="carousel-indicators">
           <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
           <li data-target="#myCarousel" data-slide-to="1"></li>
           <li data-target="#myCarousel" data-slide-to="2"></li>
       </ol>

       <!-- Wrapper for slides -->
       <div class="carousel-inner">
           <div class="item active">
               <div class="fill" style="background-image:url('/img/note-1.png');"></div>
               <div class="carousel-caption">
                   <h2>NoteBooks</h2>
               </div>
           </div>
           <div class="item">
               <div class="fill" style="background-image:url('/img/note-2.png');"></div>
               <div class="carousel-caption">
                   <h2>Netbooks</h2>
               </div>
           </div>
           <div class="item">
               <div class="fill" style="background-image:url('/img/tab-1.png');"></div>
               <div class="carousel-caption">
                   <h2>Tablets</h2>
               </div>
           </div>
       </div>

       <!-- Controls -->
       <a class="left carousel-control" href="#myCarousel" data-slide="prev">
           <span class="icon-prev"></span>
       </a>
       <a class="right carousel-control" href="#myCarousel" data-slide="next">
           <span class="icon-next"></span>
       </a>
   </header>

   <!-- Page Content -->
   <div class="container">
<!--
       <!-- Bienvenida -->
       <div class="row ">
           <div class="col-lg-12">
               <h1 class="page-header text-center">
                   Bienvenido a NoteFix
               </h1>
                <p class="lead text-center">
                 En noteFix contamos con mas de 10 años de experiencia. Nos importa que nuestros clientes sean tanto particulares como comerciales. Todos merecen precios convenientes y servicio de calidad. Nos enorgullecemos de nuestra atención  y de nuestra rápida respuesta a sus necesidades.
               </p>
           </div>
       <!-- Productos -->
       <div class="row">
         <article class="product">
           <a href="{{url('/categories/1')}}">
               <img src="/img/notebook.jpg" alt="notebook">
             <div class="txt-img">
               <h2>NoteBooks</h2>
             </div>
           </a>
         </article>
         <article class="product">
           <a href="{{url('/categories/2')}}">
             <img src="/img/netbook.jpg" alt="netbooks">
             <div class="txt-img">
               <h2>NetBooks</h2>
             </div>
           </a>
         </article>
         <article class="product">
           <a href="{{url('/categories/3')}}">
             <img src="/img/tablet.jpg" alt="tablet">
             <div class="txt-img">
               <h2>Tablets</h2>
             </div>
           </a>
         </article>
         <article class="product">
           <a href="{{url('/categories/4')}}">
             <img src="/img/cell-phone.jpg" alt="celular">
             <div class="txt-img">
               <h2>Celulares</h2>
             </div>
           </a>
         </article>
       </div>
       <!-- Reparaciones -->
       <div class="row lead">
           <div class="col-lg-12">
               <h2 class="page-header">Reparaciones noteFix</h2>
           </div>
           <div class="col-md-6">
             <br>
               <ul>
                   <li>Garantia propia</li>
                   <li>Envios y retiros a domicilio en todo CABA</li>
                   <li>Repuestos originales</li>
                   <li>Mano de obra de nuestros propios tecnicos</li>
                   <li>Presupuestos sin cargo</li>
               </ul>
               <br>
               <p>Somos usuarios como nuestros clientes y sabemos lo que hacemos. Brindamos atencion personalizada a cada uno de nuestros clientes, tanto particulares como a comerciales ofreciendo un servicio de primera gracias a la formacion de nuestros profesionales encargados.  </p>
           </div>
           <div class="col-md-6">
               <img class="img-responsive" src="https://dsutech.co.uk/file/computer-repairs.png" alt="">
           </div>
       </div>
       <!-- /.row -->

       <hr>

       <!-- Transporte  -->
       <div class="well">
           <div class="row">
               <div class="col-md-8">
                   <p>Pide un presupuesto o un retiro de tu producto a reparar, tambien puedes comprar lo que sea y te brindaremos envio ratuito en todo CABA !</p>
               </div>
               <div class="col-md-4">
                   <a class="btn btn-lg btn-default btn-block" href="#">Solicitar transporte</a>
               </div>
           </div>
       </div>

       <hr>

       <!-- Footer -->
       <footer>
           <div class="row">
               <div class="col-lg-12">
                   <p>Copyright &copy; Notefix 2016</p>
               </div>
           </div>
       </footer>

   </div>
   <!-- /.container -->
  </div>
  <!-- /.container -->

  <!-- jQuery -->
  {{-- <script src="js/jquery.js"></script>
--}}
  <!-- Bootstrap Core JavaScript -->
  {{-- <script src="js/bootstrap.min.js"></script> --}}

  <!-- Script to Activate the Carousel -->
  <script>
  $('.carousel').carousel({
      interval: 5000 //changes the speed
  })
  </script>

</body>

</html>
@endsection
