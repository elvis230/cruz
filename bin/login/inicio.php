<?php
include('../conexion.php');
include('class.php');
$usuario = $_POST['usuario'];
$pwd = $_POST['pwd'];
$objeto = new Seciones();

echo $objeto->Iniciar($usuario,$pwd);
?>