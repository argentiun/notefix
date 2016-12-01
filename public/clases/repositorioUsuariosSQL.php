<?php
	require_once("repositorioUsuarios.php");

	class RepositorioUsuariosSQL extends RepositorioUsuarios {

		public $conn;
		public $lastId;
		public function __construct(PDO $conn) {
			$this->conn = $conn;
		}
		public function setLastId(){
			$this->lastid =  $this->conn->lastInsertId();
		}
		public function getLastId(){
			return $this->lastId;
		}
		public function traerTodosLosUsuarios() {

			$usuarios = [];

			$sql = "Select * from user";

			$query = $this->conn->prepare($sql);
			$query->execute();

			$usuariosArrays = $query->fetchAll(PDO::FETCH_ASSOC);
	        foreach ($usuariosArrays as $usuarioArray) {

	        	$usuario = new Usuario(
	        		$usuarioArray["id"],
	        		$usuarioArray["name"],
							$usuarioArray["lastname"],
							$usuarioArray["tel"],
	        		$usuarioArray["email"],
	        		$usuarioArray["pass"]
	        	);

	            $usuarios[] = $usuario;
	        }

	        return $usuarios;
	    }


	    public function guardar(Usuario $usuario) {
	    	if ($usuario->getId() == null) {
	    		$sql = "INSERT into user(id,name,lastname,tel,email,pass,creationdate) values (DEFAULT, :name, :lastname, :tel, :email, :pass, DEFAULT)";
	    	}
	    	else {
	    		$sql = "UPDATE user set
	    			name = :name,
						lastname = :lastname,
						tel = :tel,
	    			email = :email,
	    			pass = :pass
	    			where id = :id";
	    	}

	    	$query = $this->conn->prepare($sql);

	    	$query->bindValue(":name", $usuario->getName(), PDO::PARAM_STR);
				$query->bindValue(":lastname", $usuario->getLastname(), PDO::PARAM_STR);
				$query->bindValue(":tel", $usuario->getTel(), PDO::PARAM_STR);
	    	$query->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
	    	$query->bindValue(":pass", $usuario->getPassword(), PDO::PARAM_STR);

	    	if ($usuario->getId() != null) {
	    		$query->bindValue(":id", $usuario->getId(), PDO::PARAM_INT);
	    	}


	    	if ($usuario->getId() == null) {
	    		$usuario->setId($this->conn->lastInsertId());
	    	}

				$query->execute();
	    }

	    public function traerUsuarioPorEmail($email) {
	        $sql = "SELECT * FROM user WHERE email = :email";

	        $query = $this->conn->prepare($sql);

	        $query->bindValue(":email", $email, PDO::PARAM_STR);

	        $query->execute();

	        $usuarioArray = $query->fetch();

	        if ($usuarioArray) {
	        	$usuario = new Usuario(
	        		$usuarioArray["id"],
	        		$usuarioArray["name"],
							$usuarioArray["lastname"],
							$usuarioArray["tel"],
	        		$usuarioArray["email"],
	        		$usuarioArray["pass"]
	        	);

	        	return $usuario;
	        }

	        return false;
	    }
	}
