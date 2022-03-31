<?php

class Categorias
{
    private $id='';
    private $nombre='';
    private $buscar='';
    
    public function Insertar($id, $nombrre)
    {
        $BD  = new Conexion;
        $db  = new PDO('mysql:dbname=' . $BD->BD() . ';host=' . $BD->Host(), $BD->Usuario(), $BD->Pwd());
        $sql='';
        $smt = $db->prepare($sql);
        $smt->bindParam(':id', $id);
        $smt->bindParam(':nombre', $nombre;
        $smt->execute();

    }
    public function Editar($id,$nombre)
    {
        $BD  = new Conexion;
        $db  = new PDO('mysql:dbname=' . $BD->BD() . ';host=' . $BD->Host(), $BD->Usuario(), $BD->Pwd());
        $sql='';
        $smt = $db->prepare($sql);
        $smt->bindParam(':id', $id);
        $smt->bindParam(':nombre', $nombre;
        $smt->execute();
       

    }
    public function Eliminar($id)
    {
        $BD  = new Conexion;
        $db  = new PDO('mysql:dbname=' . $BD->BD() . ';host=' . $BD->Host(), $BD->Usuario(), $BD->Pwd());
        $sql='';
        $smt = $db->prepare($sql);
        $smt->bindParam(':id', $id);
        $smt->execute();
        

    }
    public function Buscar($buscar)
    {
        $BD  = new Conexion;
        $db  = new PDO('mysql:dbname=' . $BD->BD() . ';host=' . $BD->Host(), $BD->Usuario(), $BD->Pwd());
        if($buscar==''){
        $sql='SELECT
        categoria.id, 
        categoria.nombre
        FROM
        categoria';
        $smt = $db->prepare($sql);
        $smt->execute();
        $fila = $smt->rowCount();
        $smt->setFetchMode(PDO::FETCH_ASSOC);
        $arreglo = $smt->fetch();
      }else{
        $sql='SELECT
        categoria.id, 
        categoria.nombre
        FROM
        categoria';
        $smt = $db->prepare($sql);
        $smt->bindParam(':buscar', $buscar);
        $smt->execute();
        $fila = $smt->rowCount();
        $smt->setFetchMode(PDO::FETCH_ASSOC);
        $arreglo = $smt->fetch();
          
      }

    }


}

?>