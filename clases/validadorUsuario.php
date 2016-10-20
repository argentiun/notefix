<?php
	require_once("validador.php");
	require_once("repositorio.php");

	class ValidadorUsuario extends Validador {
		public function validar(Array $datos, Repositorio $repo) {

			$repoUsuarios = $repo->getRepositorioUsuarios();

			$errores = [];
				if (empty(trim($datos["name"])))
				{
						$errores["name"] = "Completar nombre!";
				}


				if (empty(trim($datos["lastname"])))
				{
						$errores["lastname"] = "Completar apellido!";
				}

				if (empty(trim($datos["tel"])))
				{
						$errores["tel"] = "Completa tu telefono!";
				}


				if (empty(trim($datos["email"])))
				{
						$errores["email"] = "Por favor ingrese mail";
				}
				elseif (!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)) {
						$errores["email"] = "Por favor ingrese un mail correcto";
				}
				elseif ($repoUsuarios->existeElMail($datos["email"]))
				{
						$errores["email"] = "El email ya esta registrado";
				}


				if (empty(trim($datos["pass1"])))
				{
						$errores["pass"] = "El password es obligatorio!";
				}
				if (empty(trim($datos["pass2"])))
				{
						$errores["pass"] = "El password es obligatorio!";
				}
				if ($datos["pass1"] !== $datos["pass2"])
				{
						$errores["pass"] = "Las contraseñas no coinciden";
				}
				return $errores;

		}
	}
