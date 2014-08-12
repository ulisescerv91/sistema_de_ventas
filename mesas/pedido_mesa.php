<?php
include("../conexion.php");




	$total=0;
	
		$conexion2=mysqli_connect($host,$user,$pw,$bd) or die("problema al conectar el host");
		mysqli_select_db($conexion2,$bd)or die("problemas de conexion db");




		//este es para el color cambie en cada linea que exista de registro
		$colorear=array('ded5fd','50e061');
		//este es una matriz con 2 colores

		//esta indicara la posicion de $colorear para cambiar el color
		$num_color=0;
		
		//$buscar=$_POST['extraername'];
		//se extrae del texbox el nombre a buscar





$id=1;
		$extra="SELECT * FROM pedidosmesas where mesa='$id' ";

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

		echo " <table style='top: 500px' border=1 aling='center' id='hor-minimalist-a'>";
		echo "<head>

			<th>-ID-</th>
			<th>-MESA-</th>
			<th>-PRODUCTO-</th>
			<th>CANTIDAD</th>
			<th>PRECIO</th>
			<th>TOTAL</th>
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
			echo "<td> $fila[id]</td>";
			echo "<td> $fila[mesa]</td>";
#
			########################################3
			#esto es para sacar el nombre de l a base de datos del produto y el precio
			$producto_name= $fila['id_producto'];
			$db_prod="SELECT * FROM productos where id=$producto_name ";
			$extproducto=mysqli_query($conexion2,$db_prod) or die
			("<br> ERROR en la consulta hee");
			$numfiles=mysqli_num_rows($extproducto);
			for ($j=0; $j < $numfiles; $j++)
				{ 
			$fila_prod=mysqli_fetch_array($extproducto);
		}








			echo "<td> $fila_prod[producto]</td>";
			echo "<td> $fila[id_cantidad]</td>";
			echo "<td> $fila_prod[precio_prod]</td>";
			##para sacar el total por producto
			$cant=intval($fila['id_cantidad']);
			$prec=intval($fila_prod['precio_prod']);
			
			$subtotal=intval($fila['id_cantidad'])*intval($fila_prod['precio_prod']);
			
			echo "<td> $subtotal</td>";
			echo " <td align='center' class='contenido'>
			<a class='delete'  target='' href=''  onClick='eliminar(".$fila['id'].")'><img src='delete.PNG' title='Eliminar' width='20px' height='20px' alt='Eliminar'>
			</a></td>"; 
			


			$total=$total+$subtotal;
			?>
			

			

			<?php
			echo "</tr>";



			//echo $fila["nombre_db"]."  TEL-->  ".$fila["telefono_db"];

			/*$fila["nombre_db"]  contiene el valor del registro q existe en la tabla
			tambeine entre los corchetes puede ir el numero de la columna 0-n
			."  TEL-->  ".  concatena 



			href el que tiene esete link es para enviar un valor  a otra pag y que lo obtengar por get()
	`			

	<a  target='_blank' href='eliminar_prod_mesa.php?ref=".$fila['id']."'><img src='delete.PNG' title='Eliminar' width='20px' height='20px' alt='Eliminar'>
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
		//aqui se manda el total de la cuenta en la measa
		echo "<input type='text' id='totaldecuenta' value='".$total."' disabled='disabled>'</input>";
#		echo "se pudo";

			
		
		

	}
	else
	{
		echo "NO hay  pedidos de mesa ";
	}

	
	mysqli_close($conexion2);
	
?>