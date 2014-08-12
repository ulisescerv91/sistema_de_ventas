<!DOCTYPE>
<html>
<head>
	
	<title>Productos Vendidos</title>

<meta charset='utf-8'><!--para aceptar asentos-->
	
	<link rel="stylesheet" type="text/css" href="../estilos/tablestyle.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

<script>

$('document').ready(function(){

	//mostar el calendario
	$("#fechas1,#fechas2").datepicker({
	      changeMonth: true,
	      changeYear: true,
	      yearRange: "2014:2030",
	      dayNames: [ "Domingo,", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Lunes" ],
	      dayNamesMin:[ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ] ,
	      monthNamesShort: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ] ,
	      dateFormat: "yy-mm-dd"

	    });//#fechas

	//cuando pierde el foco
	//$("#fechas1").blur(function(){
//		$("#fechas2").focus();
//	});



});//document.ready







</script>

	<style type="text/css">
		body{
			padding: 0em;
			margin: 0em;
		}
		
			
		#menu{

			margin-top: 0em;
		}

		#tabla{
			
			margin-top: 5em;
		}
		#titulov{
			margin-top: 3em;
			margin-left: 45%;
			font-size: 3em;
		}

	</style>
</head>


<body>



<div id="menu">

	<?php include("plantilla.php"); ?>


</div><!--menu-->
<br>
<div id="titulov">Productos vendidos</div>
<center><h4>Seleccciona las fechas de busqueda</h4></center>
<form action="productosvendidos.php" method="POST">
	<center><input type="text" id="fechas1" name="fechas1" placeholder="selecciona una fecha...." required></center>
	<br>
	<center><input type="text" id="fechas2" name="fechas2" placeholder="selecciona una fecha...." required></center>
	<br>
	<center> <input type="submit" value="BUSCAR" id="buscar" name="buscar"> </center>
</form>

</body>
</html>