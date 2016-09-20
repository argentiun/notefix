window.onload = function (){

    var name = document.getElementById("name");
    var lastname = document.getElementById("lastname");
    var tel =  document.getElementById("tel");
    var email = document.getElementById("email");
    var pass1 = document.getElementById("pass1");
    var pass2 = document.getElementById("pass2");
    var fullname = [];
    fullname.push(name+lastname);

    var form = document.getElementById("register");

    form.addEventListener("submit", function(e){
        e.preventDefault(e);

        if (name.value.length === 0 ){
          console.log("Completa el nombre !");
          return false;
        }
        if ( !/^[a-zA-Z()]*$/.test(name.value) ) {
          console.log("Error: El nombre no es válido: " + name.value);
          return false;
        }

        if (lastname.value.length === 0 ){
          console.log("Completa el apellido !");
          return false;
        }
        if ( !/^[a-zA-Z() ]+$/.test(lastname.value) ) {
          console.log("Error: El apellido no es válido: " + lastname.value);
          return false;
        }


        var onlytel = /^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/;
        if (tel.value.length === 0 ){
          alert("El campo Telefono Es obligatorio");
        }
        if (!onlytel.test(tel.value) ) {
          console.log("Error: El telefono no es válido: " + tel.value);
          return false;
        }

        if (email.value.length === 0 ){
          console.log("El campo Email Es obligatorio");
          return false;
        }

        onlyemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if ( onlyemail.test(email) ){
          console.log("Error: La dirección de correo " + email + " es incorrecta.");
          return false;
        }

        if (pass1.value.length === 0){
          console.log("El campo contraseña Es obligatorio");
          return false;
        }

        if ( pass2.value.length === 0 ) {
          console.log("El campo repetir contraseña Es obligatorio");
          return false;
        }

        if (pass1.value.length != pass2.value.length){
            console.log("Las contraseñas no coinciden");
            return false;
        }

        var sumarUsuario = new XMLHttpRequest();

        sumarUsuario.open("GET","https://sprint.digitalhouse.com/nuevoUsuario",true);
        sumarUsuario.send();

        sumarUsuario.onreadystatechange = function(){
          if(sumarUsuario.readyState == 4 && sumarUsuario.status == 200){
            console.log("el envio se envio bien");
          }
        };


        var pedidoUsuarios = new XMLHttpRequest();
        pedidoUsuarios.open("GET","https://sprint.digitalhouse.com/getUsuarios",true);
        pedidoUsuarios.send();

        pedidoUsuarios.onreadystatechange = function(){
          if(pedidoUsuarios.readyState == 4 && pedidoUsuarios.status == 200){
            var responseJSON = pedidoUsuarios.responseText;
            var response = JSON.parse(responseJSON);
            console.log(response.cantidad);
          }
        };


      });

};
