<?php 
	include ("../conexion.php");
	//es para  el envio de informacion de los optiones q se tiene a lo q  se a escrito

	 $conexion=mysql_connect($host,$user,$pw) or die("problema al conectar el host");
	/*$conexion  esta variable guardara  conexioncon la base de datos
	donde la sintaxis es
	mysql_connect(host,user,password) 
	es aqui donde se utiliza las variales de conexion.php
                                            OR DIE es en caso que exista problemas al hacer la sentencia mysql_connect()*/
	mysql_select_db($bd,$conexion)or die("problemas de conexion db");

	#se utiliza para darle fecha a los pedidos
	date_default_timezone_set("America/Mexico_City");
	$fecha=date("Y-m-d");
	#esto es para insertar el total de la venta por mesa en las ventass del dia
	 mysql_query("INSERT INTO ventadeldia (id_mesa,totalmesa,fecha)
                       VALUES('$_POST[num_mesa]','$_POST[total]','$fecha')",$conexion);
                          	



#agregar lso productos que se vendienron
     

	#se seleccionan todos los datos que hay en la mesa
		$extraer=mysql_query("SELECT * FROM pedidosmesas where mesa='$_POST[num_mesa]'",$conexion);
		 #or die ("<br> ERROR en la consulta hee");
	

		#se conoce el numero total de registros dentro de la tabla 
		$nfiles=mysql_num_rows($extraer);
#se pregunta si hay mas de 0 archivos
	if($nfiles>0)
			/*para validar que alla aunq sea 1 registro*/
		{



			#se hace un recorrido de todos los registros encontrados
			for ($i=0; $i < $nfiles; $i++)
					/*recorre todas las pociones del registro desde 0 asta $nfiles*/
			 { 
			 	#fila recibe los valores de cada  registro en cada vuelta
				$fila=mysql_fetch_array($extraer);
				

				/*$fila  extra toda la informacion por registro desde 1 asta n registros
				*/


				#obtenemos id de los producto de los cuales esta en la mesa
				$producto= $fila['id_producto'];
			
				$cant= $fila['id_cantidad'];
				
				#esto es para saber si ese prodtuco ya esta registrado en la mesa de productosvendiso y con esa fecha

				$revisar=mysql_query("SELECT * FROM productosvendidos where id_prod='$producto' and fecha='$fecha'",$conexion);				
				$numregistros=mysql_num_rows($revisar);

				if($numregistros==0){



					#se interta cada producto en la tabla de productoventas				
				mysql_query("INSERT INTO productosvendidos (id_prod,cantidad,fecha)
										VALUES ('$producto','$cant','$fecha')",$conexion);
					}					# or die("<br> ERROR en la consulta hee");
					else{
						#se supone que ya esta registrado y solo ponemos el numero nuevo de productos
						$newfila=mysql_fetch_array($revisar);
						$x= $newfila['cantidad'];
						$x=$x+$cant;

						mysql_query("UPDATE productosvendidos
									SET cantidad='$x' WHERE id_prod=$producto");

					}


				
			}
	            
       }         
                 

                 #eliminar los datos de la mesa en la que se acaba de hacer la venta                          
	mysql_query("DELETE from pedidosmesas where mesa='$_POST[num_mesa]'",$conexion); 
                                      

?>
