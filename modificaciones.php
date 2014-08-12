<!DOCTYPE>
<html>
	<head></head>

	<body>

		<!--pongo el id del usuario que se va a modificar en un txtbox invisible-->
 		<input type="text" id="ids" name="clave" size="3" hidden="true" value="<?php echo $_GET['ref'];?> ">


     <form name="Form1" id="Form1" method="POST" action="db_agregar.php">
			PRODUCTO<input type="text" id="txtproducto" name="txtproducto">
			PRECIO  $<input type="text" id="txtprecio" name="txtprecio"><br>
			<input type="submit" value="AGREGAR">


		</form>



<?php
include("conexion.php");

$id = $_GET['ref']; #se recive el valor del dato que se envio de la otra pag




	
		$conexion2=mysqli_connect($host,$user,$pw,$bd) or die("problema al conectar el host");
		mysqli_select_db($conexion2,$bd)or die("problemas de conexion db");



		$extra="SELECT * FROM productos where id ='$id' ";


		$extraer=mysqli_query($conexion2,$extra) or die
		("<br> ERROR en la consulta hee");
		/*$extraer contendra los valoes q se agan de la interaccion con la db

		mysql_query($extra,$conexion2) -contiene la linea de inteccions con la bd

		*/


		$nfiles=mysqli_num_rows($extraer);
		/*$nfiles de dice el numero de 
		(en este caso) registros que tiene la tabla*/

	echo "<br>";echo "<br>";echo "<br>";

		if($nfiles>0)
			/*para validar que alla aunq sea 1 registro*/
		{

	
		for ($i=0; $i < $nfiles; $i++)
				/*recorre todas las pociones del registro desde 0 asta $nfiles*/
		 { 
			$fila=mysqli_fetch_array($extraer);
			/*$fila  extra toda la informacion por registro desde 1 asta n registros
			*/

			//para cambiar el color



			?>



 <script type="text/javascript">

//		insertamso los datos de la tabla a lso campos correspondientes	    	
		var nameproducto="<?php  echo $fila['producto'];  ?>";
		var valorprecio="<?php  echo $fila['precio_prod'];  ?>";
		
		
		document.getElementById("txtproducto").value=nameproducto;
		document.getElementById("txtprecio").value=valorprecio;
		
			
	</script>





			
			<?php
	
				
		}
	
			
		
		

	}
	

	
	mysqli_close($conexion2);
	
?>
	

		  		
 </body>