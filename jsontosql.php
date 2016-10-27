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
foreach ($usuarios as $usuarioArray) {

  $usuario = new Usuario(
    $usuarioArray["id"],
    $usuarioArray["name"],
    $usuarioArray["lastname"],
    $usuarioArray["tel"],
    $usuarioArray["email"],
    $usuarioArray["password"]
  );

    $reposql->guardar($usuario);
}



 ?>
