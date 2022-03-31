<?php 

class   Seciones{

 private $usuario = '';
 private $pwd='';

 public function Iniciar($usuario, $pwd){

    $BD  = new Conexion;
    $db  = new PDO('mysql:dbname=' . $BD->BD() . ';host=' . $BD->Host(), $BD->Usuario(), $BD->Pwd());
    $sql="SELECT
	tipo_usuario.rol, 
	usuario.id, 
	usuario.nombre, 
	usuario.apellidos, 
	usuario.usuario, 
	usuario.pwd, 
	usuario.tipo_usuario, 
	usuario.tel
FROM
	usuario,
	tipo_usuario 
WHERE usuario.tipo_usuario=tipo_usuario.id AND usuario.usuario=:usuario AND usuario.pwd=:pwd LIMIT 1";
    $smt = $db->prepare($sql);
        $smt->bindParam(':usuario', $usuario);
        $smt->bindParam(':pwd', $pwd);
        $smt->execute();
        $fila = $smt->rowCount();
        $smt->setFetchMode(PDO::FETCH_ASSOC);
        $arreglo = $smt->fetch();

        if ($fila == 1) {
            session_start();         
            $_SESSION['nombre'] = $arreglo['nombre'];
            $_SESSION['apellidos'] = $arreglo['apellidos'];
            $_SESSION['rol'] = $arreglo['rol'];
            $_SESSION['id'] = $arreglo['id'];
            $_SESSION['tel'] = $arreglo['tel'];
            echo $fila; //$arreglo['id'];
        } else {
            echo $fila;
        }
 }
 
 
public function Salir(){
    session_start();
    session_destroy();
    return 1;
}


}

?>