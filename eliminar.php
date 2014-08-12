<!DOCTYPE>
<html>
	<head><TITLE>borrar</TITLE></head>
	<body></body>
</html>


<?php
include("conexion.php");

$id =$_POST['valor']; #se recive el valor del dato que se envio de la otra pag




	
		$conexion2=mysqli_connect($host,$user,$pw,$bd) or die("problema al conectar el host");
		mysqli_select_db($conexion2,$bd)or die("problemas de conexion db");
		$extra="SELECT * FROM productos where id ='$id' ";
		$extraer=mysqli_query($conexion2,$extra) or die("<br> ERROR en la consulta hee");
//eliminar del menu
		if($reg=mysqli_fetch_array($extraer))
		{
			mysqli_query($conexion2,"delete from productos where id='$id'") or die ("PROBLEMAS AL ELIMINAR de menu");
			mysqli_query($conexion2,"delete from pedidosmesas where id_producto='$id'") or die ("PROBLEMAS AL ELIMINAR de  mesa");
			mysqli_query($conexion2,"delete from productosvendidos where id_prod='$id'") or die ("PROBLEMAS AL ELIMINAR de ventas");
			
		}
		else{
			
		}

//eliminar del pedido  encaso que se alla agregadoa uun pedido


		
	?>