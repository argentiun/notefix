<?php
	require_once("clases/auth.php");
	require_once("clases/repositorioJSON.php");

	$tipoRepositorio = "json";

	switch($tipoRepositorio) {
		case "json":
			$repo = new RepositorioJSON();
			break;
	}

	$auth = Auth::getInstancia($repo->getRepositorioUsuarios());


	if ($_SERVER['QUERY_STRING'] == "logout") {
	  $auth->logout();
	}
	if ($auth->estaLogueado()) {
	  require_once("headerLogueado.php");
	} else {
	  require_once("header.php");
	}



?>
