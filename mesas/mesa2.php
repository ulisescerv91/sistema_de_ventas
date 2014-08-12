<!DOCTYPE>
<html>
	<head>
		<meta charset='utf-8'>
		<title>AUTOCOMPLETE</title>

		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="../estilos/tablestyle.css">
		<!--Necesarios-->


		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

  		<!--funcion de autocompletad--> 
  		<script type="text/javascript">
  $('document').ready(function(){

            $( "#search" ).autocomplete(
            {
               source:'producto_auto.php',
               select : function (event,ui){
                   $('#otros').slideUp('fast');
                   $('#otros').html(
                     '<h2>detalles</h2>'+
                     '<label>NOMBRE : </label>'+
                     ui.item.value+
                     '<BR><label id="hola">PRECIO : $</label>'+
                      ui.item.precio
                );
                   $('#otros').slideDown('fast');
                   document.getElementById("mesa_idprod").value = ui.item.idprod;
              }
            });



//funcion para agregar 
  $("#boton").click(function(){
        
            var x = $('#mesa_idprod').val();
          
            var y = $('#num_mesa').val();
//            var cantidad_prod = $('#cantidad_prod').val();
            var z = $('#cantidad_prod').val();
          
          jQuery.post("agregar_pedido.php", {
            
            mesa_idprod:x,
            num_mesa:y,
            cantidad_prod:z

          }, function(data, textStatus){
            if(data == 1){
              $('#res').html("Datos insertados.");
              $('#res').css('color','green');
            }
            else{
              $('#res').html("Ha ocurrido un error.");
              $('#res').css('color','red');
            }
          });

          document.getElementById('search').value="";
          document.getElementById('otros').innerHTML="";
          //document.getElementById('datosdetabla').innerHTML="hola soy un div";
          //$("#datosdetabla").load("consulta.php",function(){

            //esto hara que el div que tiene a la tabla se refresce en .5 segundo una ves se alla pulsdo el boton de agregar
            setTimeout(function(){ $("#datosdetabla").load("pedido_mesa.php");},500);

        });




//para hacer la venta
 $("#vender").click(function(){
            var x = $('#num_mesa').val();
              //este viene de pedido_mesa.php
            var y = $('#totaldecuenta').val();

          jQuery.post("hacer_venta.php", {
            
            num_mesa:x,
            total:y

          },
           function(data, textStatus){
            if(data == 1){
              //
              
            }
            else{
              //
            }
            });
          
          setTimeout(function(){ $("#datosdetabla").load("pedido_mesa.php");},1000);
          alert("vendido y mesa lista ");
        

  });//vender

});//documen.ready


function eliminar(c){
 var x = c;
          
          
          jQuery.post("eliminar_prod_mesa.php", {
            
            valor:x
          

          }, function(data, textStatus){
            if(data == 1){
              $('#res').html("Datos eliminado.");
              $('#res').css('color','green');
            }
            else{
              $('#res').html("Ha ocurrido un error al eliminar.");
              $('#res').css('color','red');
            }
          }) ;

          document.getElementById('search').value="";
          document.getElementById('search').focus();
          document.getElementById('otros').innerHTML="";
          //document.getElementById('datosdetabla').innerHTML="hola soy un div";
          //$("#datosdetabla").load("consulta.php",function(){
            alert("Producto eliminado");

            //esto hara que el div que tiene a la tabla se refresce en .5 segundo una ves se alla pulsdo el boton de agregar
            setTimeout(function(){ $("#datosdetabla").load("pedido_mesa.php");},2000);
        };




        

  		</script>

      <style type="text/css">

        #bg{
          background-image: url('../imagenes/b11.JPG');
          background-repeat:no-repeat;
          background-attachment:fixed;
          padding-top: 9em;
          
        }
        #datosdetabla{/*div donde se despliega la tabla
          border-width: 2px;
          border-color: black;
          border-style: solid;*/
          margin-top: 3em;
          
        } 
        #pedido{/*div de busqueda
          border-width: 2px;
          border-color: black;
          border-style: solid;*/

          margin-left: 30%;
          /*position: fixed;*/
          width: 60em;

          background-color: transparent;




        }  
        .busca{/*inputs de busqueda*/
          
        background-color: transparent;
        border-radius: 1em;

        border-style: solid;
        border-color: black;
        border-width: 2px;

        box-shadow:3px 3px 3px 3px rgba(50, 50, 50, 0.75);
        color: black;
        font-weight: bold;
        font-size: 2em;
        font-family: Helvetica;
        height: 2.1em;
        margin-left: 10em;
        text-align: center;
        text-shadow: 1px 1px #ad0b35;
        width: 15em;

        }
        #cantidad_prod{/*input de cantidad*/
          width: 2em;
          border-radius: 15px;
          margin-left: 45%;


        }
        #title{
          color:black;
          font-weight: bold;
          font-size: 4em;
          font-family: Arial;
          margin-left: 20%;
        }

        #boton{
          border-radius: 1em;
          border-color: black;
          box-shadow:3px 3px 3px 3px rgba(50, 50, 50, 0.75);
          font-weight: bold;
          height: 4em;
          font-size: 20px;
          margin-left: 2em;
          width: 9em;
        }

        #cant{
           font-family: Arial;
           font-weight: bold;
           margin-left: 45%;
        }
        




      </style>




	</head>
	<body>

<div id="plantilla">
<?php include("plantilla.php"); ?>
		</div>
		
		
<div id="bg">

<div id="pedido">
      <p id="title">Seleccionan el producto</p>
        <input type="text" class="busca" id="search" placeholder="Buscar producto..." required><br>
        <!--estos 2 me ayudan para captar los valores tanto el ide del producto que se selecciono 
        ademas del nume de mesa al que se va a enviar para guardar-->
        <input id="mesa_idprod" name="mesa_idprod" type="text " hidden><BR>
        <input id="num_mesa"  name="num_mesa" type="text " value="2" hidden>

<input id="vender"  name="vender" type="submit" value="IMPRIMIR"></input>


        <span id="cant">Cantidad</span><select  class="busca" id="cantidad_prod" name="cantidad_prod">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3" >3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>

        <input type="submit" value="AGREGAR" id="boton">


      </div>
<br>
		
<div id="datosdetabla">

<?php 
		include ("pedido_mesa.php");
		?>
</div>





<div id="res"></div>
<div id="otros"></div>

</div><!--div de bg-->

	</body>
</html>
