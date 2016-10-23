<?php
	require_once("validador.php");
	require_once("repositorio.php");

	class ValidadorUsuario extends Validador {
		public function validar(Array $datos, Repositorio $repo) {

			$repoUsuarios = $repo->getRepositorioUsuarios();

			$erroresRegister = [];
				if (empty(trim($datos["name"]))){
						$erroresRegister["name"] = "Completar nombre!";
				}

				if (empty(trim($datos["lastname"]))){
						$erroresRegister["lastname"] = "Completar apellido!";
				}

				if (empty(trim($datos["tel"]))){
						$erroresRegister["tel"] = "Completa tu telefono!";
				}


				if (empty(trim($datos["email"]))){
						$erroresRegister["email"] = "Por favor ingrese mail";
				}elseif (!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)){
						$erroresRegister["email"] = "Por favor ingrese un mail correcto";
				}elseif ($repoUsuarios->existeElMail($datos["email"])){
						$erroresRegister["email"] = "El email ya esta registrado";
				}


				if (empty(trim($datos["pass1"]))){
						$erroresRegister["pass"] = "El password es obligatorio!";
				}
				if (empty(trim($datos["pass2"]))){
						$erroresRegister["pass"] = "El password es obligatorio!";
				}
				if ($datos["pass1"] !== $datos["pass2"]){
						$erroresRegister["pass"] = "Las contraseñas no coinciden";
				}
				return $erroresRegister;

		}
	}
