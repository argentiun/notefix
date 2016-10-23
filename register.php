<?php
    require_once("soporte.php");
    require_once("clases/validadorUsuario.php");

    $repoUsuarios = $repo->getRepositorioUsuarios();

    $erroresRegister = [];
    $valueName = "";
    $valueLastname = "";
    $valueTel = "";
    $valueEmail = "";


    if (!empty($_POST) && $_POST["submit"] == "Registrarse"){
        $validador = new ValidadorUsuario();
        //Se envió información
        $erroresRegister = $validador->validar($_POST, $repo);

        if (empty($erroresRegister)){
            $usuario = new Usuario(
                null,
                $_POST["name"],
                $_POST["lastname"],
                $_POST["tel"],
                $_POST["email"],
                $_POST["pass1"]
            );
            $usuario->setPassword($_POST["pass1"]);
            $usuario->guardar($repoUsuarios);
            $usuario->setAvatar($_FILES["avatar"]);

            header("Location:exito2.php");die();
        }

        if (!isset($erroresRegister["name"])){
            $valueName = $_POST["name"];
        }
        if (!isset($erroresRegister["lastname"])){
            $valueLastname = $_POST["lastname"];
        }
        if (!isset($erroresRegister["tel"])){
            $valueTel = $_POST["tel"];
        }
        if (!isset($erroresRegister["email"]))
        {
            $valueEmail = $_POST["email"];
        }
    }

    if ($auth->estaLogueado()){
      require_once("headerLogueado.php");
    }else{
      require_once("header.php");
    }
?>

    <div class="container">
      <div class="row">
          <div class="col-md-8">
              <h3>Registrate</h3>
              <form id='register' class="log" action='' method='post' accept-charset='UTF-8' enctype="multipart/form-data" autocomplete="off">
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Nombre:</label>
                          <input name="name" type="text" class="form-control" id="name"  data-validation-required-message="Ingresa tu nombre" value="<?=$valueName?>">
                          <!-- error -->
                          <p id="err1" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese su nombre</p>
                            <?php
                              if (isset($erroresRegister["name"])) {
                                echo "<p style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>";
                                echo $erroresRegister["name"];
                                echo "</p>";
                              }
                            ?>
                          <p class="help-block"></p>
                      </div>
                  </div>
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Apellido:</label>
                          <input name="lastname" type="text" class="form-control" id="lastname"  data-validation-required-message="Ingresa tu apellido" value="<?=$valueLastname?>">
                          <!-- error -->
                                <p id="err2" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese su apellido</p>
                          <p>
                            <?php
                              if (isset($erroresRegister["lastname"])) {
                                echo "<p style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>";
                                echo $erroresRegister["lastname"];
                                echo "</p>";
                              }
                              ?>
                          </p>
                          <p class="help-block"></p>
                      </div>
                  </div>
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Telefono:</label>
                          <input name="tel" type="tel" class="form-control" id="tel"  data-validation-required-message="(011)-15-xxxxxxxx" value="<?=$valueTel?>">
                          <!-- error -->
                                <p id="err3" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>El campo Telefono es obligatorio</p>
                          <p>
                            <?php
                              if (isset($erroresRegister["tel"])) {
                                echo "<p style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>";
                                echo $erroresRegister["tel"];
                                echo "</p>";
                              }
                              ?>
                          </p>

                      </div>
                  </div>
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Email:</label>
                          <input name="email" type="email" class="form-control" id="email"  data-validation-required-message="Ingresa tu email, tambien sera tu usuario" value="<?=$valueEmail?>">
                          <!-- error -->
                            <p id="err4" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese su email</p>
                          <p>
                            <?php
                              if (isset($erroresRegister["email"])) {
                                echo "<p style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>";
                                echo $erroresRegister["email"];
                                echo "</p>";
                              }
                              ?>
                          </p>
                      </div>
                  </div>
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Contraseña:</label>
                          <input name="pass1" type="password" class="form-control" id="pass1"  data-validation-required-message="Ingresa Password">
                          <!-- error -->
                            <p id="err5" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese una contraseña</p>
                          <p>
                            <?php
                              if (isset($erroresRegister["pass"])) {
                                echo "<p style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>";
                                echo $erroresRegister["pass"];
                                echo "</p>";
                              }
                              ?>
                          </p>
                      </div>
                  </div>
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Repetir contraseña:</label>
                          <input name="pass2" type="password" class="form-control" id="pass2" data-validation-required-message="Repite Password">
                          <!-- error -->
                          <p id="err6" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese una contraseña</p>
                          <p>
                            <?php
                              if (isset($erroresRegister["pass"])) {
                                echo "<p style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>";
                                echo $erroresRegister["pass"];
                                echo "</p>";

                              }
                              ?>
                          </p>
                      </div>
                  </div>
                  <div class="control-group form-group">
                      <div class="controls">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" id="avatar"/>
                          </p>
                      </div>
                  </div>

                  <p class="field">¿Desea suscribirse a nuestro boletín de novedades?</p>
                    <p><input id="radio1" type="radio" name="boletin" value="si" checked> SI, quiero suscribirme.
                    <input id="radio2" type="radio" name="boletin" value="no"> No, gracias.</p>
                    <br>
                    <a href="login.php">  ¿Ya tiene una cuenta? Haga click aquí para ingresar.</a>
                    <br>
                    <br>
                  <div id="success"></div>
                  <!-- For success/fail messages -->
                  <input type="submit" name="submit" value="Registrarse" class="btn btn-primary"/>
              </form>
          </div>

      </div>
      <!-- /.row -->

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

    <!-- Contact Form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script src="js/js.js"></script>

</body>

</html>
