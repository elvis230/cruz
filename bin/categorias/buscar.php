<?php 
include('../conexion.php');
include('class.php');

$bascar = '';

$objeto = new Categorias;
$objeto->Buscar($bascar);

?>