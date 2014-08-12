<!DOCTYPE html>
	<html>
		<head>
			<meta charset='utf-8'><!--para aceptar asentos-->
			<title>plantilla</title>
			
			

		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>


			<style type="text/css">
			body{
				background-image: url('../imagenes/b5.JPG');


			}

			#insertar{
				margin-left: 30%;
				margin-top: -15em;
				height:22em; ;
				width:22em ;

				
				padding-top: 2em;

			



				background-color: #ff4b3a;
				border-radius: .5em;
			}
			#bgagregar{
				padding-top: 29em;
				
				
				height: 12.7em;

				
			}
			#formulario{
				/*LETRAS de etiquetas de formulario*/

				color:white;
				margin-top: 5em;
				font-family: sans-serif;




			}
			/*inputs*/
			.txt{
				
/*				background-color: transparent;*/	
				/*border-radius: 1em;*/

				border-style: solid;
				

				/*box-shadow:2px 2px 2px 2px white;*/
				color: #ff4b3a;
				
				font-size: 1.5em;
				font-family: sans-serif;
				height: 1.5em;
				margin-left: 1em;
				text-align: center;
				/*text-shadow: 1px 1px #ad0b35;*/
				width: 12em;
				border-color: white;




			}
			p{
				margin-left: .6em;
				color:white;
				float: left;
				font-size: 2em;
				font-family: sans-serif;
				
				text-align: center;
			}

			#boton{
				border-radius: .5em;
				
				height: 3em;
				width: 9em;
				/*box-shadow:2px 2px 2px 2px #216830;*/
				background-color: #0aaad3;
				color:white;

			}

			.txt:focus{
				box-shadow:1px 1px 1px 1px black;
				
			}
			/*placeholder de txt*/
			.txt::-webkit-input-placeholder{
				font-family: sans-serif;
				color: #ff4b3a;
			}

			</style>

			<script type="text/javascript">
   $('document').ready(function(){
  $("#boton").click(function(){
	var w = $('#txtproducto').val();
 	var x= $('#txtcantidad').val();
 	var y=$('#txttotal').val();
 	var z=$('#txtdesc').val();
 
          jQuery.post("agregar_compra.php", {

            	txtproducto:w,
            	txtcantidad:x,
				txttotal:y,
            	txtdesc:z

            
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
         /* document.getElementById('producto').value="";
          document.getElementById('producto').focus();
          document.getElementById('precio').value="";*/

          //document.getElementById('datosdetabla').innerHTML="hola soy un div";
          //$("#datosdetabla").load("consulta.php",function(){
            alert("Producto EGREGADO");

            //esto hara que el div que tiene a la tabla se refresce en .5 segundo una ves se alla pulsdo el boton de agregar
            //setTimeout(function(){ $("#bgtabla").load("vermenu.php");},2000);
        });
  });
  		</script>	




		</head>
	<body>
		<div id="menus">
			<?php include("plantilla.php"); ?>
		</div>

<div id="bgagregar">
	<div id="insertar">
		<p>AGREGAR COMPRA</p>
			<div id="formulario">
				&nbsp&nbsp&nbsp&nbsp&nbspPRODUCTO<br>
				<input class="txt" type="text" id="txtproducto" name="txtproducto" placeholder="Nombre de producto..."><br>
				&nbsp&nbsp&nbsp&nbsp&nbspCANTIDAD  $<br>
				<input  class="txt" type="text" id="txtcantidad" name="txtcantidad" placeholder="Cantidad del producto...">
				<br>&nbsp&nbsp&nbsp&nbsp&nbspTOTAL<br>
				<input class="txt" type="text" id="txttotal" name="txttotal" placeholder="Total de producto..."><br>
				&nbsp&nbsp&nbsp&nbsp&nbspDESCRIPCION<br>
				<input class="txt" type="text" id="txtdesc" name="txtdesc" placeholder="Descp. de producto...">
				<br><br><center><input type="button" value="AGREGAR" id="boton"></center>
			</div>
	</div>
</div>

		
	</body>
	</html>