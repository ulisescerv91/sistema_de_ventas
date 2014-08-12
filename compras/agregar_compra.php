
                      
                           <?php

                           //fecha y hora actual
                            date_default_timezone_set("America/Mexico_City");
                            $n=date("Y-m-d h:i:s");
                            
                                    include("../conexion.php");
/*
                                    if(  isset($_POST['txtproducto']) && !empty($_POST['txtproducto']) &&  
                                         isset($_POST['txtprecio']) && !empty($_POST['txtprecio']))
        */
                                      {
                            
                                        #conexion y seleccion de tabla de la base de datos
                                        $conexion=mysql_connect($host,$user,$pw) or die("problema al conectar el host");
                                            /*$conexion  esta variable guardara  conexioncon la base de datos
                                                  donde la sintaxis es
                                            mysql_connect(host,user,password) 
                                                  es aqui donde se utiliza las variales de conexion.php
                                            OR DIE es en caso que exista problemas al hacer la sentencia mysql_connect()*/
                                            mysql_select_db($bd,$conexion)or die("problemas de conexion db");
                                            /*
                                            se selecciona a la base de datos a la cual se quiere conectar

                                            */

                                        
                                        #insertar valores obligatorios
                           mysql_query("INSERT INTO compras (producto,cantidad,total,descripcion,fecha) 
                                      VALUES('$_POST[txtproducto]','$_POST[txtcantidad]','$_POST[txttotal]','$_POST[txtdesc]','$n')",$conexion);
                                            
                          }
                                        
                                       /* else{
                                          
                                        }*/    

                            ?>
			                               
                                
     
    </body>

  </html>
