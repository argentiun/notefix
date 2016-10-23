<?php require("soporte.php");?>

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
                <div class="fill" style="background-image:url('http://www.kkaskaras.gr/wp-content/uploads/2012/12/notebook-banner-720x240.jpg');"></div>
                <div class="carousel-caption">
                    <h2>NoteBooks</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('https://www.asus.com/websites/global/products/4NCrBoVHxzty7brJ/top_banner.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Netbooks</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://androidspin.com/wp-content/uploads/2013/11/Archos-101-XS-2-banner.png');"></div>
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
        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Bienvenido a NoteFix
                </h1>
                <p>
                  En noteFix contamos con mas de 10 años de experiencia. Nos importa que nuestros clientes sean tanto particulares como comerciales. Todos merecen precios convenientes y servicio de calidad.Nos enorgullecemos de nuestra atención al cliente y de nuestra rápida respuesta a sus necesidades.
                </p>
            </div>
        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Reparaciones noteFix</h2>
            </div>
            <div class="col-md-6">
                <ul>
                    <li><strong>Garantia propia</strong>
                    </li>
                    <li>Envios y retiros a domicilio en todo CABA</li>
                    <li>Repuestos originales</li>
                    <li>Mano de obra de nuestros propios tecnicos</li>
                    <li>Presupuestos sin cargo</li>
                </ul>
                <p>Somos usuarios como nuestros clientes y sabemos lo que hacemos. Brindamos atencion personalizada a cada uno de nuestros clientes, tanto particulares como a comerciales </p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="http://www.cursosrosario.com/wp-content/uploads/2014/03/repararnote.jpg" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
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
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
