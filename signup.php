<?php require_once("funcionesnotefix.php"); ?>
<?php
  // if (estaLogueado()) {
  //     header("Location:index.php");exit;
  // }

  $errores = [];
  $valueName = "";
  $valueLastname = "";
  $valueTel = "";
  $valueEmail = "";

      if (!empty($_POST)){
          //Se envió información
          $errores = validarRegistracion();

          if (empty($errores)){
              //No hay Errores
              //Primero: Lo registro
              registrarUsuario();
              //Segundo: Lo envio al exito
              // realizar pagina de felicitaciones por registro
              header("Location:exito2.php");exit;
          }

          if (!isset($errores["name"]))
          {
              $valueName = $_POST["name"];
          }
          if (!isset($errores["lastname"]))
          {
              $valueLastname = $_POST["lastname"];
          }
          if (!isset($errores["tel"]))
          {
              $valueTel = $_POST["tel"];
          }
          if (!isset($errores["email"]))
          {
              $valueEmail = $_POST["email"];
          }
      }
?>

  <?php require_once("header.php"); ?>

      <section class="derecha">
        <section class="login">
          <div class="box">
                  <div class="box">
                    <p>

                    </p>
                  </div>
                  <p id="err1" style="color:red; font-size:0.95em;">
                    Por favor, complete el formulario de forma correcta.
                  </p>

                  <form id="register" class="log" method="post" autocomplete="off">
                      <p class="field"><label >Nombre:</label></p>
                        <p><input id="name" name="name" type="text" placeholder="Ingresa tu nombre" autofocus="" value="<?=$valueName?>"></p>
                        <!-- error -->
                        <p id="err2" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese su nombre</p>
                          <?php
                            if (isset($errores["name"])) {
                              echo "<p style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>";
                              echo $errores["name"];
                              echo "</p>";
                            }
                          ?>


                      <p class="field"><label >Apellido:</label></p>
                          <p><input id="lastname" name="lastname" type="text" placeholder="Ingresa tu apellido" autofocus="" value="<?=$valueLastname?>"></p>
                          <!-- error -->
                                <p id="err3" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese su apellido</p>
                          <p>
                            <?php
                              if (isset($errores["lastname"])) {
                                echo "<p style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>";
                                echo $errores["lastname"];
                                echo "</p>";
                              }
                              ?>
                          </p>

                      <p class="field"><label >Telefono:</label></p>
                          <p><input id="tel" type="tel" name="tel" placeholder="(011)-15-xxxxxxxx" value="<?=$valueTel?>"></p>
                          <!-- error -->
                                <p id="err4" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>El campo Telefono es obligatorio</p>
                          <p>
                            <?php
                              if (isset($errores["tel"])) {
                                echo "<p style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>";
                                echo $errores["tel"];
                                echo "</p>";
                              }
                              ?>
                          </p>

                      <p class="field"><label>Email:</label></p>
                          <p><input id="email" name="email" type="email" placeholder="Ingresa email, tambien sera tu usuario" value="<?=$valueEmail?>"></p>
                          <!-- error -->
                            <p id="err5" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese su email</p>
                          <p>
                            <?php
                              if (isset($errores["email"])) {
                                echo "<p style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>";
                                echo $errores["email"];
                                echo "</p>";
                              }
                              ?>
                          </p>

                      <p class="field"><label>Contraseña:</label></p>
                          <p><input id="pass1" name="pass1" type="password" placeholder="Ingresa Password" ></p>
                          <!-- error -->
                            <p id="err6" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese una contraseña</p>
                          <p>
                            <?php
                              if (isset($errores["pass"])) {
                                echo "<p style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>";
                                echo $errores["pass"];
                                echo "</p>";
                              }
                              ?>
                          </p>

                      <p class="field"><label>Repetir contraseña:</label></p>
                          <p><input id="pass2" name="pass2" type="password" placeholder="Repite Password" ></p>
                          <!-- error -->
                          <p id="err7" style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>Por favor, ingrese una contraseña</p>
                          <p>
                            <?php
                              if (isset($errores["pass"])) {
                                echo "<p style=' font-size: 0.82em; background-color: white; color: red; padding: 5px;'>";
                                echo $errores["pass"];
                                echo "</p>";
                              }
                              ?>
                          </p>

                      <p class="field">¿Desea suscribirse a nuestro boletín de novedades?</p>
                        <p><input id="radio1" type="radio" name="boletin" value="si" checked> SI, quiero suscribirme.
                        <input id="radio2" type="radio" name="boletin" value="no"> No, gracias.</p>
                      <br><br>
                        <a href="login.php">  ¿Ya tiene una cuenta? Haga click aquí para ingresar.</a>


                      <p class="registrarse"><input id="submit" type="submit" name="submit" value="Registrarse" class="boton"></p>
                  </form>
              </div>
        </section>
      </section>


    </div>

<script src="js/js.js"></script>
<?php require_once("footer.php"); ?>
