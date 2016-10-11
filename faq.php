<?php require_once("header.php"); ?>

      <section class="derecha">
        <section class="faq">
    			<h2>FAQ</h2>
          <div class="question">
            <a href="#"><p>1.¿Hacen retiros/entregas a domicilio o es necesario presentarse a una de las sucursales?</p></a>
            <p class="answer">
              Actualmente contamos con Servicio a Domicilio para las zonas indicadas en el [Mapa](url/mapa). El mismo tiene un costo de $80 y al solicitarlo el diagnóstico es totalmente gratis.
            </p>
          </div>

          <div class="question">
            <a href="#"><p>2. ¿Cuánto tiempo tarda en ser reparada mi notebook/tablet/pc?</p></a>
            <p class="answer">
              La duración de la reparación dependerá de la complejidad de la misma. Sin tomar en cuenta casos muy específicos (que requieran de un repuesto discontinuado o similares) el tiempo transcurrido entre el retiro del equipo hasta la llegada a la puerta de su casa no debería ser mayor a 5 días.
            </p>
          </div>
          <div class="question">
            <a href="#"><p>3. ¿Por qué necesito crear una cuenta para hacer consultas online y solicitar los servicios a través de este medio?</p></a>
            <p class="answer">
              Al crear una cuenta Ud. contará con una experiencia personalizada según su consulta, ya que tendremos acceso a datos de su equipo brindados por Ud. mediante un formulario. Si no quisiera hacerlo de esta forma puede comunicarse con nosotros al xxxx-xxxx y su consulta será atendida por uno de nuestros representantes.
            </p>
          </div>
          <div  class="question">
            <a href="#"><p>4.¿Es seguro manejar los pagos a través de la página?</p></a>
            <p class="answer">
              Todos los pagos son redirigidos a MercadoPago, líder en Latinoamérica, desde donde podrás realizar tu transacción de forma rápida y segura. Ante cualquier inconveniente, también es posible realizar el pago directamente en cualquiera de nuestras sucursales.
            </p>
          </div>
          <div class="question">
            <a href="#"><p>5.¿Cómo adquirir nuevos productos o accesorios?</p></a>
            <p class="answer">
              Contamos con productos nuevos, con garantia de 12 meses, y servicio tecnico brindado por nostros mismos. Aconsejamos sobre los armados de las pc o los equipos que requieran con las caracteristicas indicadas por los usuarios. Ofreciendo envios a todo el  pais, y envios personalizados en capital federal y gran buenos aires.
            </p>
          </div>
        </section>
      </section>


    </div>

<?php require_once("footer.php"); ?>

  <script src="js/jquery-3.1.0.min.js"></script>
  <script>
$(document).ready(function(){
    $(".question a").click(function(){
        var preg = $(this);
          if ($("+ .answer", this).is(":hidden")) {
          $(".answer").slideUp("slow");
          $("+ .answer", this).slideDown("slow");
        }else {
        $("+ .answer", this).slideUp("slow");
        }
    });
});
</script>
</html>
