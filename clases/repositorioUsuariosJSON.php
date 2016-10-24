<?php
	require_once("repositorioUsuarios.php");

	class RepositorioUsuariosJSON extends RepositorioUsuarios {

		public function traerTodosLosUsuarios() {

	        $usuarios = [];

	        $archivoUsuarios = file_get_contents("usuarios.json");

	        $usuariosJSON = explode("\n", $archivoUsuarios);

	        $cantidadUsuarios = count($usuariosJSON);
	        $elUltimo = $cantidadUsuarios - 1;

	        unset($usuariosJSON[$elUltimo]);

	        foreach ($usuariosJSON as $usuarioJSON) {
	        	$usuarioArray = json_decode($usuarioJSON, true);

	        	$usuario = new Usuario(
							$usuarioArray["id"],
							$usuarioArray["name"],
							$usuarioArray["lastname"],
							$usuarioArray["tel"],
							$usuarioArray["email"],
							$usuarioArray["password"]
	        	);

	            $usuarios[] = $usuario;
	        }

	        return $usuarios;
	    }

	    public function traerProximoId() {
	        $archivoUsuarios = file_get_contents("usuarios.json");
	        $usuariosJSON = explode("\n", $archivoUsuarios);
	        $cantidadUsuarios = count($usuariosJSON);
	        $elUltimo = $cantidadUsuarios - 2;

	        if ($elUltimo < 0) {
	            return 1;
	        }

	        $ultimoUsuario = $usuariosJSON[$elUltimo];

	        $ultimoUsuario = json_decode($ultimoUsuario, true);

	        return $ultimoUsuario["id"] + 1;
	    }

	    public function guardar(Usuario $usuario) {
	    	if ($usuario->getId() == null) {
	    		$usuario->setId($this->traerProximoId());
	    	}

	    	$usuarioJSON = json_encode($usuario->toArray());

	    	file_put_contents("usuarios.json", $usuarioJSON . "\n", FILE_APPEND);
	    }

			public function modificar(){
				$archivoUsuarios = file_get_contents("usuarios.json");
				$usuariosJSON = explode("\n", $archivoUsuarios);
				print_r($usuariosJSON);die();
		}
	}
