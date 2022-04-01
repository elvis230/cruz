<?php 
include('../conexion.php');
include('class.php');

$bascar = '';

$objeto = new Categorias;
echo $objeto->Buscar($bascar);

?>