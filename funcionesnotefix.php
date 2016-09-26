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

				//1: Me traigo todo el archivo
				$archivoUsuarios = file_get_contents("usuarios.json");

				//2: Lo divido por lineas
				$usuariosJSON = explode("\n", $archivoUsuarios);

				//3: Borro la linea vacía del final
				$cantidadUsuarios = count($usuariosJSON);
				$elUltimo = $cantidadUsuarios - 1;

				unset($usuariosJSON[$elUltimo]);

				//4: Recorro mis lineas y las paso a arrays
				foreach ($usuariosJSON as $usuarioJSON) {
						$usuarios[] = json_decode($usuarioJSON, true);
				}

				return $usuarios;
		}

		function traerUsuarioPorEmail($email) {
        //1: Me traigo todos los usuarios y ya opero con arrays
        $usuarios = traerTodosLosUsuarios();

        //2: Los recorro y si alguno es el que busco, devuelvo
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
        //1: Armar array correcto
        $arrayUsuario = [
            "name" => $_POST["name"],
						"lastname" => $_POST["lastname"],
						"tel" => $_POST["tel"],
            "email" => $_POST["email"],
            "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
						"id" => traerUltimoId(),
        ];

        //2: Pasarlo a JSON
        $jsonUsuario = json_encode($arrayUsuario);

        //3: Lo guardo en archivo
        file_put_contents("usuarios.json", $jsonUsuario . "\n", FILE_APPEND);
    }
