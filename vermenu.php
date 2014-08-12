<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

  		<style type="text/css">

  		#titlemenu{
  			font-size: 40px; 
  			font-family: Comic Sans MS;
  			font-weight: bold;
  			float: left;	
  			margin-top: 0em;
  			margin-left: 18em;
  			
  			color: white;
  		}
  		#bgtabla{
  			width: 100%;
  			height: 100%;
  			 /*background-image:    url('imagenes/bg.JPG');*/
  			 /*background: -webkit-linear-gradient(red, blue);*/
  			 background-image: url('imagenes/b2.JPG');
  			 background-repeat:no-repeat;
			 background-attachment:fixed;


			 box-shadow:10	px 10px 10px rgba(50, 50, 50, 0.75);
			 padding-top: 14em;
  		}
  		</style>
	<script type="text/javascript">
  
function eliminardemenu(c){
 var x = c;
          jQuery.post("eliminar.php", {
            
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
          //document.getElementById('datosdetabla').innerHTML="hola soy un div";
          //$("#datosdetabla").load("consulta.php",function(){
            alert("Producto eliminado del menu");

            //esto hara que el div que tiene a la tabla se refresce en .5 segundo una ves se alla pulsdo el boton de agregar
            setTimeout(function(){ $("#bgtabla").load("vermenu.php");},2000);
        };
  		</script>	
	<link rel="stylesheet" type="text/css" href="estilos/tablestyle.css">
	
	</head>
	<body>
		<div id="res"></div>
	<?php 
		include ("plantilla.php");
	?>
		<div id="bgtabla">
<div id="titlemenu">Productos del menu</div>
			<?php
include("conexion.php");

		$conexion2=mysqli_connect($host,$user,$pw,$bd) or die("problema al conectar el host");
		mysqli_select_db($conexion2,$bd)or die("problemas de conexion db");
		//este es para el color cambie en cada linea que exista de registro
		$colorear=array('9de7fa','cef3fd');
		//este es una matriz con 2 colores
		//esta indicara la posicion de $colorear para cambiar el color
		$num_color=0;
		//$buscar=$_POST['extraername'];
		//se extrae del texbox el nombre a buscar
		$extra="SELECT * FROM productos order by producto";
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
			<th>NOMBRE</th>
			<th>PRECIO</th>
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
			echo "<td> $fila[producto]</td>";
			echo "<td> "."$"."$fila[precio_prod]</td>";

			?>
			<td align="center" class="contenido"><a class='delete'  target='' href=''  onClick='eliminardemenu(<?php echo"$fila[id]";?>)'><img src='mesas/delete.PNG' title='Eliminar' width='20px' height='20px' alt='Eliminar'></td>	

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
		echo "NO EXISTEN REGISTROS EN LA BASE DE DATOS";
	}

	mysqli_close($conexion2);
	echo "<br><br>";
?>
	</div><!--bgtable-->
	</body>
	</html?
