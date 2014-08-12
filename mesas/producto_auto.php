<?php

include ("../conexion.php");


//es para  el envio de informacion de los optiones q se tiene a lo q  se a escrito
mysql_connect($host, $user, $pw);
mysql_select_db($bd);

$req = "SELECT * FROM productos WHERE producto LIKE '%".$_REQUEST['term']."%'  order by producto"; 

$query = mysql_query($req);

while($row = mysql_fetch_array($query))
{
  $results[] = array('value' =>$row['producto'],'precio' =>$row['precio_prod'],'idprod' =>$row['id']


                      
    );

}

echo json_encode($results);

?>