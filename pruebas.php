<?php 
//fecha y hora actual
	date_default_timezone_set("America/Mexico_City");
	$n=date("Y-m-d h:i:s");
	echo $n;

?>


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
  			background-color: #e6e6e6;
  		}
  		#m1{
  			height: 5em;
  			width: 10em;
  			text-align: center;
  			border-radius: 5px;
  			border-style: solid;
  			border-color: blue;
  			border-width: 10px;
  			background-color: transparent;

  		}




  		</style>
  		
		</head>

		<body>
			<input  id="m1"  class="target" type="text" value="hola">

      <form action="pruebas1.php" method="GET">
        <input type="text" id="si" name="si"> 
        <input type="submit" value="enviar">
      </form>
		</body>
</html>