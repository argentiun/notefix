<?php
  require_once("clases/validadorLogin.php");
  require_once("clases/usuario.php");

  $errores = [];

  if ($_POST &&  $_POST["submit"] == "Ingresar"){
    $validador = new ValidadorLogin();

    $errores = $validador->validar($_POST, $repo);

    if (empty($errores)){
      $usuario = $repo->getRepositorioUsuarios()->traerUsuarioPorEmail($_POST["email"]);
      $auth->loguear($usuario);
      if ($validador->estaEnFormulario("recordame")){
        $recordar = $_POST["recordame"] == "si" ? true : false;
        $auth->guardarCookie($usuario, $recordar);
      }
      header("Location:index.php");exit;
    }
  }

  $emailLogin = "";
  if ($_POST) {
    if ($_POST["submit"] == "Ingresar" && $_POST["email"]) {
      $emailLogin = $_POST["email"];
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>noteFix</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/estilostemplate.css">
</head>

<body>
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
                <a class="navbar-brand" href="index.html"> <img class="icon" src="img/icon.png"alt="icon"/></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">Notebooks</a>
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
                    <li class="dropdown">

                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Logueate! <b class="caret"></b></a>
                          <ul class="dropdown-menu" style="text-align:center;">
                            <?php include("errores.php"); ?>
                              <li>
                                <p class="user"><label >Email:</label></p>
                                <form method="POST">
                                  <input name="email" type="text" placeholder="Ingresa Email" autofocus="" value="<?= $emailLogin?>" >
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
                                  <a href="signup.html">¿No tiene cuenta?</a>
                              </li>
                              <li>
                                  <a href="#">¿Olvidó su contraseña?</a>
                              </li>
                          </ul>
                        </li>
                    <li>
                        <a href="register.php">Registrate!</a>
                    </li>
                    <li>
                        <a href="faq.php">FAQ</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
