<?php
	require_once("clases/auth.php");
	require_once("clases/repositorioJSON.php");

	$tipoRepositorio = "json";

	switch($tipoRepositorio){
		case "json":
			$repo = new RepositorioJSON();
			break;
	}

	$auth = Auth::getInstancia($repo->getRepositorioUsuarios());


	if ($_SERVER['QUERY_STRING'] == "logout"){
	  $auth->logout();
	}

	if ($_SERVER['QUERY_STRING'] == "registerok"){
		echo '<script language="JavaScript">
						alert("Has sido registrado con exito,inicia secion para validar tu usuario!")
          </script>';
	}




?>
