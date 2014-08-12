<?php
                                    include("../conexion.php");

                                   
                                    if(  isset($_POST['mesa_idprod']) && !empty($_POST['mesa_idprod']) &&  
                                         isset($_POST['num_mesa']) && !empty($_POST['num_mesa']) &&
                                         isset($_POST['cantidad_prod']) && !empty($_POST['cantidad_prod']))
        
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
                           mysql_query("INSERT INTO pedidosmesas (mesa,id_producto,id_cantidad)
                            VALUES('$_POST[num_mesa]','$_POST[mesa_idprod]','$_POST[cantidad_prod]')",$conexion);
                                            
                          }
                          else{
                          	
                          }

                          if(mysql_affected_rows()>0){
                            echo "1";
                            }
                            else{
                            echo "2";
                            }
 
                                            

                            ?>