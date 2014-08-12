<!DOCTYPE>
<html>
<head>
	<title></title>
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

	//



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




<?php
	include("../conexion.php");


		//total vendido de ese dia
		
		$tfecha1=$_POST['fechas1'];
		$tfecha2=$_POST['fechas2'];
		




		$conexion2=mysqli_connect($host,$user,$pw,$bd) or die("problema al conectar el host");
		mysqli_select_db($conexion2,$bd)or die("problemas de conexion db");
		//este es para el color cambie en cada linea que exista de registro
		$colorear=array('9de7fa','cef3fd');
		//este es una matriz con 2 colores
		//esta indicara la posicion de $colorear para cambiar el color
		$num_color=0;
		//$buscar=$_POST['extraername'];
		//se extrae del texbox el nombre a buscar
		$extra="SELECT * FROM productosvendidos where fecha BETWEEN '$tfecha1' and '$tfecha2' ";
		//$extra="SELECT * FROM `datos` WHERE nombre_db='$buscar'";
		/*linea de codigo para interactuar con la db
		SELECT -para hacer referencia a q  se seleccionarar un dato de la db
		*FROM -dtodos los campos desde  (el asterisco quiere decir todos los campos)
		'datos'- nombre de la tabla donde se quiere seleccionar el dato
		WHERE - espesificar un campo de la tabla
		nombre_db='ada'  -   (nombre_db) campo de la tabla ='la palabra ada'
		*/
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

		echo " <table id='hor-minimalist-a' >";
		echo "<head>
			<th>PRODUCTO</th>
			<th>CANTIDAD</th>
			<th>FECHA</th>
			<th>ELIMINAR</th>
			</head>";
		for ($i=0; $i < $nfiles; $i++)
				/*recorre todas las pociones del registro desde 0 asta $nfiles*/
		 { 
			$fila=mysqli_fetch_array($extraer);
			/*$fila  extra toda la informacion por registro desde 1 asta n registros
			*/
			//para cambiar el color
			$num_color++;
			$num_color %=2;//si es divisible entre 2 el num color sera 0 y cuando 
			//no  su valor sera 0 para manejar los 2 valores el en arrar colorear
			echo "<tr bgcolor=${colorear[$num_color]}>";
			//  bgcolor es el color d fondo  q pondra del array colorear 
			// de la posicion num color 0 o 1

			#buscamos el ide en tabla productos apra que aparesca el nomrbe en vez del id
			$idprod=$fila['id_prod'];
			$extraernombre=mysqli_query($conexion2,"SELECT * FROM productos where id='$idprod'");
			$fila2=mysqli_fetch_array($extraernombre);
			echo "<td> $fila2[producto]</td>";			


			echo "<td> $fila[cantidad]</td>";
			echo "<td> $fila[fecha]</td>";

			

			?>
			<td align="center" class="contenido"><a class='delete'  target='' href=''  onClick='eliminardemenu(<?php echo"$fila[id]";?>)'><img src='../imagenes/delete.PNG' title='Eliminar' width='20px' height='20px' alt='Eliminar'></td>	

			<?php
			echo "</tr>";

			//echo $fila["nombre_db"]."  TEL-->  ".$fila["telefono_db"];

			/*$fila["nombre_db"]  contiene el valor del registro q existe en la tabla
			tambeine entre los corchetes puede ir el numero de la columna 0-n
			."  TEL-->  ".  concatena 

			*/

			# code...

			/*otra forma de buscar todos los registros que hay en una tabla es asi 
				
				while($fila=mysql_fetch_array($extraer)  mientras exista un registro ingresara al while
				{
					echo $fila["nombre_db"]."  TEL-->  ".$fila["telefono_db"];
					echo "<br>";
	
				}

			*/
				
		}
		echo "</table>";

		

	}
	else
	{
		echo "NO EXISTEN REGISTROS EN LA BASE DE DATOS<br>INTENTA CON OTRA FECHA";
	}

	mysqli_close($conexion2);
	echo "<br><br>";


?>


</body>
</html>
