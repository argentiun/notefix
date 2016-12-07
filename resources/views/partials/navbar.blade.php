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
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="/">Inicio</a>
                </li>
                <li class="dropdown">
                    <a href="article/index" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{url('/products')}}">Todos</a>
                        </li>
                        <li>
                            <a href="{{url('/categories/1')}}">Notebooks</a>
                        </li>
                        <li>
                            <a href="{{url('/categories/2')}}">Netbooks</a>
                        </li>
                        <li>
                            <a href="{{url('/categories/3')}}">Tablets</a>
                        </li>
                        <li>
                            <a href="{{url('/categories/4')}}">Celulares</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="/reparacion" >Reparaciones</a>
                </li>

                <li>
                  <a href="/faq">FAQ</a>
                </li>

              </ul>
              <ul class="nav navbar-nav navbar-right">
                  @if (!Auth::check())
                    <li class="dropdown ">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
                          <ul class="dropdown-menu" style="text-align:center;">
                                <li>
                                  <!--<p class="user"><label >Email:</label></p>-->
                                  <form method="POST" action="{{ url('/login') }}">
                                    {{ csrf_field() }}
                                    <input class="navinp" name="email" type="text" placeholder="Ingresa Email" autofocus="" value="" >
                                </li>
                              <li>
                                <!--<p class="pass"><label>Contraseña:</label></p>-->
                                    <input class="navinp" name="password" type="password" placeholder="Ingresa Password">
                              </li>
                              <li>
                                <p class="ingresar"><input class="navinp" type="submit" name="submit" value="Ingresar" class="boton" style="background-color:#555555; border-radius:5px; color:white;"></p>
                              </li>
                              <li>
                                <p class="field"><input type="checkbox" name="remember">Recordarme</p>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                              </li>
                              <li>
                                  <a href="{{ url('/register') }}">¿No tiene cuenta?</a>
                              </li>
                              <li>
                                  <a href="password/reset">¿Olvidó su contraseña?</a>
                              </li>
                          </ul>
                        </li>
                    <li>
                        <a href="{{url('/register')}}">Registro</a>
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
                              {{ Auth::user()->name }}
                              <img class="img-circle" height="25px" width="25px" style="display: inline-block;"src="/{{ Auth::user()->src}}"/>
                              <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/profile">Mi cuenta</a>
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
