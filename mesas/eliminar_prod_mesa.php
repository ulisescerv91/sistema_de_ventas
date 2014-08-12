<!DOCTYPE>
<html>
	<head><TITLE>borrar</TITLE></head>
	<body></body>
</html>


<?php
include("../conexion.php");




//$id = $_GET['ref']; #se recive el valor del dato que se envio de la otra pag cuando se utiliza metodo get

$id=$_POST['valor'];




	
		$conexion2=mysqli_connect($host,$user,$pw,$bd) or die("problema al conectar el host");
		mysqli_select_db($conexion2,$bd)or die("problemas de conexion db");
		/*$extra="SELECT * FROM pedidosmesas where id ='$id' ";
		$extraer=mysqli_query($conexion2,$extra) or die("<br> ERROR en la consulta hee");
//eliminar del menu
		if($reg=mysqli_fetch_array($extraer))
		{
			echo "1";*/
			mysqli_query($conexion2,"delete from pedidosmesas where id='$id'") or die ("PROBLEMAS AL ELIMINAR producto  de  mesa");
			/*
			
		}
		else{
			echo "2";
		}*/

//eliminar del pedido  encaso que se alla agregadoa uun pedido

 							
	?>