<?php
	$errores = [];
	$valueName = "";
	$valueLastname = "";
	$valueTel = "";
	$valueEmail = "";
	function validarRegistracion()
    {
        $errores = [];
        if (empty(trim($_POST["name"])))
        {
            $errores["name"] = "Completar nombre!";
        }


        if (empty(trim($_POST["lastname"])))
        {
            $errores["lastname"] = "Completar apellido!";
        }

        if (empty(trim($_POST["tel"])))
        {
            $errores["tel"] = "Completa tu telefono!";
        }


        if (empty(trim($_POST["email"])))
        {
            $errores["email"] = "Por favor ingrese mail";
        }
        elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errores["email"] = "Por favor ingrese un mail correcto";
        }
        elseif (existeElMail($_POST["email"]))
        {
            $errores["email"] = "El email ya esta registrado";
        }


        if (empty(trim($_POST["pass1"])))
        {
            $errores["pass"] = "El password es obligatorio!";
        }
        if (empty(trim($_POST["pass2"])))
        {
            $errores["pass"] = "El password es obligatorio!";
        }
        if ($_POST["pass1"] !== $_POST["pass2"])
        {
            $errores["pass"] = "Las contraseñas no coinciden";
        }
				return $errores;
		}


		function traerTodosLosUsuarios() {

				$usuarios = [];

				$archivoUsuarios = file_get_contents("usuarios.json");

				$usuariosJSON = explode("\n", $archivoUsuarios);

				$cantidadUsuarios = count($usuariosJSON);
				$elUltimo = $cantidadUsuarios - 1;

				unset($usuariosJSON[$elUltimo]);

				foreach ($usuariosJSON as $usuarioJSON) {
						$usuarios[] = json_decode($usuarioJSON, true);
				}

				return $usuarios;
		}

		function traerUsuarioPorEmail($email) {
        $usuarios = traerTodosLosUsuarios();

        foreach($usuarios as $usuario)
        {
            if ($usuario["email"] == $email)
            {
                return $usuario;
            }
        }

        return false;
    }

		function existeElMail($email) {
        $usuario = traerUsuarioPorEmail($email);

        if ($usuario) {
            return true;
        }

        return false;
    }

		function traerUltimoId(){
			if (count(traerTodosLosUsuarios()) < 0) {
				return 1;
			}else {
				return ultimoUsuario()["id"] + 1;
			}
		}

		function ultimoUsuario(){
			$todos = traerTodosLosUsuarios();
			return end($todos);
		}

		function registrarUsuario(){
        $arrayUsuario = [
            "name" => $_POST["name"],
						"lastname" => $_POST["lastname"],
						"tel" => $_POST["tel"],
            "email" => $_POST["email"],
            "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
						"id" => traerUltimoId(),
        ];

        $jsonUsuario = json_encode($arrayUsuario);

        file_put_contents("usuarios.json", $jsonUsuario . "\n", FILE_APPEND);
    }
