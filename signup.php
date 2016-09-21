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
                  <form id="register" class="log" method="post" autocomplete="off">
                      <p class="field"><label >Nombre:</label></p>
                        <p><input id="name" name="name" type="text" placeholder="Ingresa tu nombre" autofocus="" value="<?=$valueName?>"></p>
                        <!-- error -->

                          <?php
                            if (isset($errores["name"])) {
                              echo "<p style='background-color: red; color: white; padding:10px;'>";
                              echo $errores["name"];
                              echo "</p>";
                            }
                          ?>


                      <p class="field"><label >Apellido:</label></p>
                          <p><input id="lastname" name="lastname" type="text" placeholder="Ingresa tu apellido" autofocus="" value="<?=$valueLastname?>"></p>
                          <!-- error -->
                          <p>
                            <?php
                              if (isset($errores["lastname"])) {
                                echo $errores["lastname"];
                              }
                              ?>
                          </p>

                      <p class="field"><label >Telefono:</label></p>
                          <p><input id="tel" type="tel" name="tel" placeholder="(011)-15-xxxxxxxx" value="<?=$valueTel?>"></p>
                          <!-- error -->
                          <p>
                            <?php
                              if (isset($errores["tel"])) {
                                echo $errores["tel"];
                              }
                              ?>
                          </p>

                      <p class="field"><label>Email:</label></p>
                          <p><input id="email" name="email" type="email" placeholder="Ingresa email, tambien sera tu usuario" value="<?=$valueEmail?>"></p>
                          <!-- error -->
                          <p>
                            <?php
                              if (isset($errores["email"])) {
                                echo $errores["email"];
                              }
                              ?>
                          </p>

                      <p class="field"><label>Contraseña:</label></p>
                          <p><input id="pass1" name="pass1" type="password" placeholder="Ingresa Password" ></p>
                          <!-- error -->
                          <p>
                            <?php
                              if (isset($errores["pass"])) {
                                echo $errores["pass"];
                              }
                              ?>
                          </p>

                      <p class="field"><label>Repetir contraseña:</label></p>
                          <p><input id="pass2" name="pass2" type="password" placeholder="Repite Password" ></p>
                          <!-- error -->
                          <p>
                            <?php
                              if (isset($errores["pass"])) {
                                echo $errores["pass"];
                              }
                              ?>
                          </p>

                      <p class="field">¿Desea suscribirse a nuestro boletín de novedades?</p>
                        <p><input id="radio1" type="radio" name="boletin" value="si" checked> SI, quiero suscribirme.
                        <input id="radio2" type="radio" name="boletin" value="no"> No, gracias.</p>
                      <br><br>
                        <a href="login.html">  ¿Ya tiene una cuenta? Haga click aquí para ingresar.</a>


                      <p class="registrarse"><input id="submit" type="submit" name="submit" value="Registrarse" class="boton"></p>
                  </form>
              </div>
        </section>
      </section>


    </div>

<script src="js/js.js"></script>
<?php require_once("footer.php"); ?>
