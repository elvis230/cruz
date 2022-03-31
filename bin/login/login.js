
$(function(){
   $('#btn').on('click',Enviar);
});


Enviar = function(e){
    e.preventDefault();
    
    var usuario= $('#usuario').val();
    var pwd = $('#pwd').val();

    if(usuario!=''&&pwd!=''){
        Iniciar(usuario,pwd);

    }else{
        alert("Llena el formulario");
    }
}

Iniciar = function(usuario, pwd){
    $.ajax({
        async: true,
        type: 'POST',
        dataType: 'html',
        contentType: 'application/x-www-form-urlencoded',
        url: 'bin/Login/inicio.php',
        data: 'usuario='+usuario+'&pwd=' + pwd,
        beforeSend: Inicia_solicitud,
        success: Fin,
        timeout: 4000,
        error: Error
    })
    return false;
}

function Inicia_solicitud(){
    $('.msj').css({'color':'rgb(10,15,20)'});
    $('.msj').html('<spam>Cargando..</spam>');
    
}
function Fin(respuesta){      
    console.log(respuesta);
    if(respuesta==1){
        sessionStorage.setItem('seg', respuesta);
        $('#contenedor').load('bin/user/admin.php');
    }else{
        $('.msj').css({'color':'rgb(255,15,20)'});
        $('.msj').html('<spam> Usuario y/o Contraseña  no existen</spam>');
    }
}
function Error(){
    $('.msj').html('Error en el Servidor..</spam>');
}