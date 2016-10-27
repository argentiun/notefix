<?php

require_once("clases/repositorioUsuarios.php");
require_once("clases/repositorioUsuariosJSON.php");
require_once("clases/repositorioUsuariosSQL.php");
require_once("clases/repositorioSQL.php");

$conn = new PDO('mysql:host=localhost;dbname=notefix;charset=utf8mb4', "root", "");

$repojson = new repositorioUsuariosJSON;
$usuarios = $repojson->traerTodosLosUsuarios();
var_dump($usuarios);
echo "<br>";
echo "<br>";
echo "<br>";
$reposql = new RepositorioUsuariosSQL($conn);
foreach ($usuarios as $usuario) {

  $usuario = new Usuario(
    $usuario["id"],
    $usuario["name"],
    $usuario["lastname"],
    $usuario["tel"],
    $usuario["email"],
    $usuario["password"]
  );

    $reposql->guardar($usuario);
}



 ?>
