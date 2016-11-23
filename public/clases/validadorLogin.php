<?php
	require_once("validador.php");
	require_once("repositorio.php");

	class ValidadorLogin extends Validador {
		public function validar(Array $datos, Repositorio $repo) {

			$repoUsuarios = $repo->getRepositorioUsuarios();

			$errores = [];

	        if (empty(trim($datos["email"])) )
	        {
	            $errores["email"] = "Por favor complete su email.";
	        }
	        if (empty(trim($datos["password"])))
	        {
	            $errores["password"] = "Por favor ingrese su contraseña";
	        }
	        if (!isset($errores["email"]) && !$repoUsuarios->existeElMail($datos["email"]))
	        {
	            $errores["email"] = "El usuario no existe";
	        }
	        else if (!isset($errores["password"])) {
	            $usuario = $repoUsuarios->traerUsuarioPorEmail($datos["email"]);

	            if (!password_verify($datos["password"], $usuario->getPassword())) {
	                $errores["password"] ="La contraseña es incorrecta";
	            }
	        }

	        return $errores;
		}
	}
