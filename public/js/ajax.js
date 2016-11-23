window.addEventListener("load",function(){
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
