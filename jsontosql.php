<?php

require_once("clases/repositorioUsuarios.php");
require_once("clases/repositorioUsuariosJSON.php");
require_once("clases/repositorioUsuariosSQL.php");
require_once("clases/repositorioSQL.php");

$conn = new PDO('mysql:host=localhost;dbname=notefix;charset=utf8mb4', "root", "");
$repojson = new repositorioUsuariosJSON;
$reposql = new RepositorioUsuariosSQL($conn);
$usuarios = $repojson->traerTodosLosUsuarios();


foreach ($usuarios as $usuario){
    $sql = "INSERT into user(id,name,lastname,tel,email,pass,creationdate) values (:id, :name, :lastname, :tel, :email, :pass, DEFAULT)";
    $query = $reposql->conn->prepare($sql);


    $query->bindValue(":id", $usuario->getId(), PDO::PARAM_INT);
    $query->bindValue(":name", $usuario->getName(), PDO::PARAM_STR);
    $query->bindValue(":lastname", $usuario->getLastname(), PDO::PARAM_STR);
    $query->bindValue(":tel", $usuario->getTel(), PDO::PARAM_STR);
    $query->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
    $query->bindValue(":pass", $usuario->getPassword(), PDO::PARAM_STR);


    $query->execute();
}




 ?>
