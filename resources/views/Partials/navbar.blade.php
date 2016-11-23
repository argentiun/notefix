<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" style="">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"> <img class="icon" src="/img/icon.png"alt="icon"/></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/">Inicio</a>
                </li>
                <li class="dropdown">
                    <a href="article/index" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{url('products')}}">Notebooks</a>
                        </li>
                        <li>
                            <a href="#">Netbooks</a>
                        </li>
                        <li>
                            <a href="#">Tablets</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reparaciones <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">1 Reparacion</a>
                        </li>
                        <li>
                            <a href="#">2 Reparacion</a>
                        </li>
                        <li>
                            <a href="#">3 Reparacion</a>
                        </li>
                    </ul>
                </li>

                <li>
                  <a href="faq">Dudas?</a>
                </li>
                  @if (!Auth::check())
                    <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Logueate! <b class="caret"></b></a>
                          <ul class="dropdown-menu" style="text-align:center;">
                              <li>
                                <p class="user"><label >Email:</label></p>
                                <form method="POST" action="{{ url('/login') }}">
                                  {{ csrf_field() }}
                                  <input name="email" type="text" placeholder="Ingresa Email" autofocus="" value="" >
                              </li>
                              <li>
                                <p class="pass"><label>Contraseña:</label></p>
                                    <input name="password" type="password" placeholder="Ingresa Password">
                              </li>
                              <li>
                                <p class="ingresar"><input type="submit" name="submit" value="Ingresar" class="boton" style="background-color:#555555; border-radius:5px; color:white;"></p>
                              </li>
                              <li>
                                <p class="field">Recordarme </p>
                                <input id="radio1" type="radio" name="recordame" value="si" checked>Si
                                <input id="radio2" type="radio" name="recordame" value="no">No
                                </form>
                              </li>
                              <li>
                                  <a href="{{ url('/register') }}">¿No tiene cuenta?</a>
                              </li>
                              <li>
                                  <a href="#">¿Olvidó su contraseña?</a>
                              </li>
                          </ul>
                        </li>
                    <li>
                        <a href="{{url('/register')}}">Registrate!</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
          </div>
          <!-- /.container -->
          </nav>
            @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle"data-toggle="dropdown">
                               <!-- alt="" class="img-circle" style="height: 30px; display:inline-block;"  -->
                              <img class="avatar" src=""/>
                              <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">{{ Auth::user()->name }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/products/create') }}">Cargar Producto</a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
              </div>
              <!-- /.container -->
              </nav>
          @endif

<!-- jQuery -->
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>

<!-- Bootstrap Core JavaScript -->
{{-- <script src="js/bootstrap.min.js"></script> --}}

<!-- Script to Activate the Carousel -->
{{-- <script>
$('.carousel').carousel({
    interval: 5000 //changes the speed
})
  </script> --}}
