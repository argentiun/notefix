<?php
	require_once("repositorioUsuarios.php");

	class RepositorioUsuariosJSON extends RepositorioUsuarios {

		public function traerTodosLosUsuarios() {

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
	        	$usuarioArray = json_decode($usuarioJSON, true);
						// var_dump($usuarioJSON);
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

	        //4: Traigo el último usuario
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
				// in_array(,$usuariosJSON)
		}
	}
