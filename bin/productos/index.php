<style>

#crudp{
        position: relative;
        margin: 0;
        padding: 0;
        border: 0;
        width: 100%;
        height: 100%;
        background: tomato;
    }
    #crudp>.rp{
        
        width: 100%;
        height: 20%;
        background: rgba(50, 50, 0, 0.3);
    
        
    }

#crudp>.rp>fieldset{
            float: left;
            background-color: #f4f1ed ;
            color: firebrick;
            border-color: darkgoldenrod;
            border: 1px groove (internal value);
            border-radius: 0px 0px 0px 0px;
            width: 35%;
            height:98%;
            }
#crudp>.rp>fieldset>legend{
            color: darkblue;
            font-weight: bold;
            text-align: center;
        }    
    
    #crudp>.rp>fieldset>p{        
        margin-top: 1%;
        background: rgba(0, 120, 0, 1);
        width: 100%;
        height: 25%;
        
    }
    #crudp>.rp>fieldset>p>label{
      background: rgba(0, 0, 0, 1);
      color: whitesmoke;
      height: 100%;
      width: 23%;
      float: left;
      text-align: right;
        
    }
    .rp>fieldset>p>input,textarea,select{      
        width: 65%;
        height: 100%;
        border:1px outset rgba(10, 10, 10, 1);

        font-family: 'Times New Roman', Times, serif;
        font-weight: bold;
       
    }
  
</style>


<div id="crudp"> 
    <div class="rp">
        <fieldset> 
            <legend> Modulo de Productos </legend> 
            <p> <label for="Producto">Producto:</label> <select class="cat" >  </select> </p> 
            <p> <label for="Clave">Clave:</label> <input type="text" class="clave" /> </p>          
            <P> <label for="Descripcion">Descripcion:</label><textarea class="descrip"> </textarea> </P>
        </fieldset>
        <fieldset> 
            <legend> Precios </legend> 
            <p> <label for="Precio_venta">Precio Venta:</label> <input type="text" class="pventa" /> </p> 
            <p> <label for="Precio_compra">Precio Compra</label> <input type="text" class="pcompra" /> </p>          
            <P> <label for="Unidad">Unidad:</label><input type="text" class="unidad" /> </P>
        </fieldset>


    </div>

    <div id="datos">
    </div>
  
</div>


<script>
    $(function(){
        Categorias();
    });
    function Categorias(){
        $.ajax({
        async: true,
        type: 'POST',
        dataType:'html',
        contentType: 'application/x-www-form-urlencoded',
        url: 'bin/categorias/buscar.php',
        beforeSend: function(){console.log("iniciando")},
        success: Mostrar,
        timeout: 4000,
        error: function(){console.log("Error en el Servidor")}
    })
    return false;
    }

function Mostrar(xml){
   
    var  contenido ='<option value="0" selected>Selecciona Un Producto  </option>';
      alert(xml);
    $(xml).find('datos').each(function()
    {     
     	contenido += '<option ';
     	contenido += ' value=" '+$(this).find('id').text()+'" >';
     	contenido += $(this).find('nombre').text();
     	contenido += '</option>';
     })
        $(".cat").html(contenido);
        alert(contenido);
}
</script>
