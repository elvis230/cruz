<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>..:: SII SHIS::.. </title>
</head>
<style>
*{
    padding: 0;
    border:0;
    margin:0;   

}
#contenedor{
    background: rgba(120, 100, 150, 0);
    height: 100vh;
    width: 100wh;
}
</style>
<script src="lib/jqyery.js"></script>
<script>
    $(function(){
       var seguridad=sessionStorage.getItem('seg');
       console.log(seguridad);
        if(seguridad==null){
            $("#contenedor").load('bin/login/index.php');
          
        }else{
            $('#contenedor').load('bin/user/admin.php');
        }

            
    });  
</script>
<body>
<div id="contenedor">


</div>   
</body>
</html>
