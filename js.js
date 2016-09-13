window.onload = function (){

    var nombre = document.getElementById("register")[0]
    var apellido = document.getElementById("register")[1]
    var tel =  document.getElementById("register")[2]
    var email = document.getElementById("register")[3]
    var pass1 = document.getElementById("register")[4]
    var pass2 = document.getElementById("register")[5]
    var nombreapellido = []
    nombreapellido.push(nombre+apellido)

    var form = document.getElementById("register")

    form.addEventListener("submit", function(e){
      e.preventDefault(e);

      if (nombre.value.length === 0 ){
        alert("El campo Nombre Es obligatorio");
      };

      console.log(nombre.value);

      if (apellido.value.length === 0 ){
        alert("El campo Apellido Es obligatorio");
      };

      console.log(apellido.value);

      if (tel.value.length === 0 ){
        alert("El campo Telefono Es obligatorio");
      };

      console.log(tel.value);


      if (email.value.length === 0 ){
        alert("El campo Email Es obligatorio");
      };

      console.log(email.value);

      if (pass1.value.length === 0 ){
        alert("El campo contraseña Es obligatorio");
      };

      console.log(pass1.value);

      if (pass2.value.length === 0 ){
        alert("El campo repetir contraseña Es obligatorio");
      };

      console.log(pass2.value);

      if (pass1.value.length != pass2.value.length){
          alert("Las contraseñas no coinciden");
      }




    });



















}
