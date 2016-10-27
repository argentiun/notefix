<?php
	require_once("clases/repositorioUsuarios.php");

	class Usuario {
		private $id;
		private $name;
		private $lastname;
		private $tel;
		private $email;
		private $password;
		private $avatar;


		public function __construct($id, $name, $lastname, $tel, $email, $password) {
			$this->id = $id;
			$this->name =$name;
			$this->lastname =$lastname;
			$this->tel =$tel;
			$this->email = $email;
			$this->password = $password;
		}

		public function getName()
		{
			return $this->name;
		}
		public function getLastname()
		{
			return $this->lastname;
		}
		public function getTel()
		{
			return $this->tel;
		}
		public function getEmail()
		{
			return $this->email;
		}
		public function getId()
		{
			return $this->id;
		}
		public function getPassword()
		{
			return $this->password;
		}
		public function getAvatar()
		{
			$name = "img/" . $this->getId();
			$matching = glob($name . ".*");

			$info = pathinfo($matching[0]);
			$ext = $info['extension'];

			return $name . "." . $ext;
		}
		public function setName($name) {
			$this->name = $name;
		}
		public function setLastname($name) {
			$this->lastname = $lastname;
		}
		public function setEmail($email) {
			$this->email = $email;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function setPassword($password) {
			$this->password = password_hash($password, PASSWORD_DEFAULT);
		}
		public function setAvatar($avatar) {
			if ($avatar["error"] == UPLOAD_ERR_OK) {

				$path = "img/";

				if (!is_dir($path)) {
					mkdir($path, 0777);
				}

				$ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);

				move_uploaded_file($avatar["tmp_name"], $path . $this->getId() . "." . $ext);
			}
		}

		public function guardar(RepositorioUsuarios $repo) {
			$repo->guardar($this);
		}

		public function toArray() {
			return [
				"id" => $this->getId(),
				"name" => $this->getName(),
				"lastname" => $this->getLastname(),
				"tel"=>$this->getTel(),
				"email" => $this->getEmail(),
				"password" => $this->getPassword(),
			];

		}
	}
