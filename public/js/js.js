window.onload = function (){
  var err1 = document.getElementById("err1");
  var err2 = document.getElementById("err2");
  var err3 = document.getElementById("err3");
  var err4 = document.getElementById("err4");
  var err5 = document.getElementById("err5");
  var err6 = document.getElementById("err6");

    var name = document.getElementById("name");
    var lastname = document.getElementById("lastname");
    var tel =  document.getElementById("tel");
    var email = document.getElementById("email");
    var pass1 = document.getElementById("pass1");
    var pass2 = document.getElementById("pass2");
    var fullname = [];
    fullname.push(name+lastname);

    var form = document.getElementById("register");

    err1.style.display = "none";
    err2.style.display = "none";
    err3.style.display = "none";
    err4.style.display = "none";
    err5.style.display = "none";
    err6.style.display = "none";

    function isValid(){
      if (name.value.length === 0 ){
        alert("Por favor, ingrese su nombre");
        err1.style.display = "block";
          err2.style.display = "block";
        return false;
      }else {
        err2.style.display = "none";
      }
      if ( !/^[a-zA-Z()]*$/.test(name.value) ) {
      alert("Error: El nombre no es válido: " + name.value);
      err1.style.display = "block";
      err2.style.display = "block";
        return false;
      }
      else {
        err2.style.display = "none";
      }

      if (lastname.value.length === 0 ){
        alert("Por favor, ingrese su apellido");
        err1.style.display = "block";
        err3.style.display = "block";
        return false;
      }
      else {
        err3.style.display = "none";
      }
      if ( !/^[a-zA-Z() ]+$/.test(lastname.value) ) {
        alert("Error: El apellido no es válido: " + lastname.value);
        err1.style.display = "block";
        err3.style.display = "block";
        return false;
      }
      else {
        err3.style.display = "none";
      }
      if (tel.value.length === 0 ){
        alert("El campo Telefono es obligatorio");
        err1.style.display = "block";
        err4.style.display = "block";
      }
      else {
        err4.style.display = "none";
      }

      if (email.value.length === 0 ){
        alert("El campo Email es obligatorio");
        err1.style.display = "block";
        err5.style.display = "block";
        return false;
      }
      else {
        err5.style.display = "none";
      }

      onlyemail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if ( onlyemail.test(email) ){
        alert("Error: La dirección de correo " + email + " es incorrecta.");
        err1.style.display = "block";
        err5.style.display = "block";
        return false;
      }

      if (pass1.value.length === 0){
        alert("El campo contraseña es obligatorio");
        err1.style.display = "block";
        err6.style.display = "block";
        return false;
      }
      else {
        err6.style.display = "none";
      }

      if ( pass2.value.length === 0 ) {
        alert("El campo repetir contraseña es obligatorio");
        err1.style.display = "block";
        return false;
      }

      if (pass1.value.length != pass2.value.length){
          alert("Las contraseñas no coinciden");
          return false;
      }
      return true;
    }

    form.addEventListener("submit", function(e){

      if(!isValid()){
        e.preventDefault();
      }


      });

};
