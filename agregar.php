	<!DOCTYPE html>
	<html>
		<head>
			<meta charset='utf-8'><!--para aceptar asentos-->
			<title>plantilla</title>
			<link rel="stylesheet" type="text/css" href="estyle.css">
			<link rel="stylesheet" type="text/css" href="estilos/menu-style.css">

		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>


			<style type="text/css">
			#insertar{
				margin-left: 55%;
				margin-top: -15em;
				height:22em; ;
				width:37em ;

				
				padding-top: 2em;

			}
			#bgagregar{
				padding-top: 30em;
				background-image: url('imagenes/b3.JPG');
				height: 12em;
			}
			#formulario{
				/*LETRAS de etiquetas de formulario*/
				color:#1b12cc;
				font-weight: bold;
				margin-top: 5em;
				font-family: Arial;

			}
			/*inputs*/
			.txt{
				
				background-color: transparent;
				border-radius: 1em;

				border-style: solid;
				border-color: #216830;
				border-width: 2px;

				box-shadow:7px 7px 7px 7px #216830;
				color: white;
				font-weight: bold;
				font-size: 2em;
				font-family: Helvetica;
				height: 2.1em;
				margin-left: 1em;
				text-align: center;
				text-shadow: 1px 1px #ad0b35;
				width: 15em;




			}
			p{
				color:#ad0b35;
				float: right;
				font-size: 3em;
				font-family: Arial;
				font-weight: bold;
			}

			#boton{
				border-radius: 1em;
				font-weight: bold;
				height: 3em;
				width: 15em;
				box-shadow:2px 2px 2px 2px #216830;

			}

			</style>

			<script type="text/javascript">
   $('document').ready(function(){
  $("#boton").click(function(){
	var x = $('#producto').val();
 	var y= $('#precio').val();
 
          jQuery.post("db_agregar.php", {

            	txtproducto:x,
            	txtprecio:y
            
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
          document.getElementById('producto').value="";
          document.getElementById('producto').focus();
          document.getElementById('precio').value="";

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
<?php include("plantilla.php"); ?>


<div id="bgagregar">
	<div id="insertar">
		<p>Agregar producto</p>
			<div id="formulario">
				&nbsp&nbsp&nbsp&nbsp&nbspPRODUCTO<br><input class="txt" type="text" id="producto" name="producto" placeholder="Nombre de producto..."><br><br>
				&nbsp&nbsp&nbsp&nbsp&nbspPRECIO  $<br><input  class="txt" type="text" id="precio" name="precio" placeholder="Precio del producto..."><br>
				<center><br><br><br><input type="button" value="AGREGAR" id="boton"></center>
			</div>
	</div>
</div>

		
	</body>
	</html>