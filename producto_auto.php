<?php

//en este archivo incluye la info que se necesita para conectarse ala db
include ("conexion.php");


//se hace la coneccion
mysql_connect($host, $user, $pw);
//se selecciona la base de datos que se trabajara
mysql_select_db($bd);

//esta es la sentencia  donde se filtran las opcones de busqueda
//'%".$_REQUEST['term']."%' esta nos hace buscar coincidencias antes o despues de lo que se alla escrito


$req = "SELECT * FROM productos WHERE producto LIKE '%".$_REQUEST['term']."%'  order by producto"; 
//se manda hacer la busquerada
$query = mysql_query($req);
//se empieza la busqueda de la informacion
while($row = mysql_fetch_array($query))
{
	//se guarda la informacion  que necesitamos de opc que se selecciono en variables  ejemplo, value, foto..
	//estas variables pueden tener cualquier nombre. y se hacen llamar en la pag auto.php
  $results[] = array('value' =>$row['producto'],'foto' =>$row['precio_prod'],'idprod' =>$row['id']


                      
    );

}

//se manda el resultado como un json_encode
echo json_encode($results);

?>