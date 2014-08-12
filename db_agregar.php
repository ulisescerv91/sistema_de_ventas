
                      
                           <?php
                                    include("conexion.php");

                                    if(  isset($_POST['txtproducto']) && !empty($_POST['txtproducto']) &&  
                                         isset($_POST['txtprecio']) && !empty($_POST['txtprecio']))
        
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
                           mysql_query("INSERT INTO productos (producto,precio_prod) VALUES('$_POST[txtproducto]','$_POST[txtprecio]')",$conexion);
                                            
                          }
                                        
                                        else{
                                          
                                        }    

                            ?>
			                               
                                
     
    </body>

  </html>
