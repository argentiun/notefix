<?php require_once("header.php"); ?>

      <section class="derecha">
        <section class="login">
          <div class="box">
                  <form class="log" action="" method="post" autocomplete="off">
                      <p class="user"><label >Usuario:</label></p>
                          <input name="usuario" type="text" placeholder="Ingresa Usuario" autofocus="" required=""></p>

                      <p class="pass"><label>Contraseña:</label></p>
                          <input name="contrasenia" type="password" placeholder="Ingresa Password" required=""></p>
                      <a href="#">¿Olvidó su contraseña?</a> </br>
                        <a href="signup.html">¿No tiene cuenta? Haga click aquí para registrarse.</a>


                      <p class="ingresar"><input type="submit" name="submit" value="Ingresar" class="boton"></p>
                  </form>
              </div>
        </section>
      </section>


    </div>

<?php require_once("footer.php"); ?>
