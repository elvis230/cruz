<?php 

session_start();

?>

<style>
    .pp{
        float: left;
        background: rgba(50, 150, 25, 0);
        width: 100%;
        height: 100%;
    }
    .pp>.encabezado{
        background: rgba(150, 150, 125, 0);
        width: 100%;
        height: 15%;
    }
    .pp>.encabezado>img{
        float: left;
        width: 70%;
        height: 100%;
    }
    .pp>.encabezado>#dat{
        font-family: 'Times New Roman', Times, serif;
       float: right;
       text-align: center;
       width: 30%;
       height: 100%;
       background: rgba(255, 255, 255, 0);
    }
    .pp>.encabezado>#dat>p{
        text-align: right;
        font-style:italic;
        
    }
    .pp>.encabezado>#dat>p>span{
        color: black;
        font-weight: bold;
    }
    .pp>.encabezado>#dat>#salir{
        width: 50%;
        background:rgba(0, 0, 0, 1.5);
        color: rgba(255, 255, 255, 1);
        font-weight: bold;
        cursor: pointer;
        text-decoration:aqua;
        text-align: center;
        float: right;
    }

    .pp>.pizq{
        float: left;
        background: rgba(120, 130, 255, 0.5);
        width: 20%;
        height: 85%;
        border-right: 0px;
        border-style: solid;        
        border-color: rgba(10, 10, 215, 1);
    }
    .pp>.pizq>p{
        margin-top: 3%;
        background: rgba(0, 0, 0, 1);
        color: rgb(255, 255, 255);
        cursor: pointer;
        text-align: center;
    }
    .pp>.pizq>p:hover{
        background: rgba(252, 2, 4, 0.5);
        border-bottom: 4px;
        border-style: solid;
        border-color: rgba(50, 50, 225, 1);
    }
    .pp>.pder{
        float: right;
        width: 80%;
        height: 85%;
        background: rgba(50, 50, 255, 0.50);
        
    }
</style>
<div class="pp">
    <div class="encabezado"> 
        <img src="Imagen1.png" /> 
        <div id="dat">
            <p>Bienvenido: <span> <?php echo $_SESSION['nombre'].' '.$_SESSION['apellidos'] ?> </span> </p> 
            <p> Nivel de Usuario:<span>  <?php  echo $_SESSION['rol']   ?> </span> </p>
            <p> Telefono:<span>  <?php  echo $_SESSION['tel']   ?> </span> </p>
            <p id="salir"> Cerrar Sesion </p>
        </div> 
    </div>
    
    <div class="pizq">
        <p>Inicio </p>
        <p>Usuarios </p>
        <p id="producto">Productos</p>
        <p>Proveedores</p>
        <p>Clientes</p>
        <p>Inventario</p>
     </div>
     <div class="pder"> </div>
</div>

<script>   
$(function(){
   $('#salir').on('click',salir);
   $('#producto').on('click', function(){ 
        
     $('.pder').load('bin/productos/index.php'); 
     console.log('aqui voy-xx');
    });

});
function salir(){
    if(confirm('Desea Salir del Sistema ? \n')){
        $.ajax({
        async: true,
        type: 'POST',
        dataType:'html',
        contentType: 'application/x-www-form-urlencoded',
        url: 'bin/login/salir.php',
        beforeSend: Inicia_solicitud,
        success: Fin,
        timeout: 4000,
        error: Error
    })
    return false;
    }
}
function Inicia_solicitud(){
 console.log('iniciando');
}
function Error(){
    console.log('Error en el servidor');
}
function Fin(resp){
    console.log(resp);
  if(resp==1){
    sessionStorage.clear();
    $("#contenedor").load('bin/login/index.php');

  }
}
</script>