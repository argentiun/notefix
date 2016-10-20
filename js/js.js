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

    function validar(){
      if (name.value.length === 0 ){
        alert("Completa el nombre !");
        return false;
      }
      if ( !/^[a-zA-Z()]*$/.test(name.value) ) {
        alert("Error: El nombre no es válido: " + name.value);
        return false;
      }

      if (lastname.value.length === 0 ){
        alert("Completa el apellido !");
        return false;
      }
      if ( !/^[a-zA-Z() ]+$/.test(lastname.value) ) {
        alert("Error: El apellido no es válido: " + lastname.value);
        return false;
      }

      var onlytel = /^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/;
      if (tel.value.length === 0 ){
        alert("El campo Telefono Es obligatorio");
        return false;
      }
      if (!onlytel.test(tel.value) ) {
        alert("Error: El telefono no es válido: " + tel.value);
        return false;
      }

      if (email.value.length === 0 ){
        alert("El campo Email Es obligatorio");
        return false;
      }

      onlyemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if ( onlyemail.test(email) ){
        alert("Error: La dirección de correo " + email + " es incorrecta.");
        return false;
      }

      if (pass1.value.length === 0){
        alert("El campo contraseña Es obligatorio");
        return false;
      }

      if ( pass2.value.length === 0 ) {
        alert("El campo repetir contraseña Es obligatorio");
        return false;
      }

      if (pass1.value.length != pass2.value.length){
          alert("Las contraseñas no coinciden");
          return false;
      }
      return true;
    }

    form.addEventListener("submit", function(e){

      if(!validar()){
        e.preventDefault();
      }


      });

};
