<!DOCTYPE>
<html>
	<head>
		<meta charset='utf-8'>
		<title>AUTOCOMPLETE</title>
    <!--Este estilo se descargo de jquery themeroll-->
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
		<!--Necesarios ya que hace q funcione el codigo jquery-->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

  		<!--funcion de autocompletad--> 
  		<script type="text/javascript">
$(function() {

//se  hace referencia a input donde se esta escribiendo y esperando el autocompletado
  $( "#search" ).autocomplete(
  {
    //source es donde jquery recibe la lista de posibles valores
     source:'producto_auto.php',
     //una ves se selecciona una opcion del autocomplete ara todo lo que este dentro del select
      select : function (event,ui){
        //con esto hago que un div de un efecto que se levanta
         $('#otros').slideUp('fast');

//aqui aparecen tags html que quiero que tenga la informacion de la opc que selecciones
        $('#otros').html(
          '<h2>detalles</h2>'+
          '<p>nombre:</p>'+
          //esta opcion ui.item.value la mando llamar de producto_auto.php
          ui.item.value+
          '<p id="hola">precio:</p>'+
          ui.item.foto

          
      );
        //una ves se alla recivido la informacion hace un efecto de desplegado havia abajo
         $('#otros').slideDown('slow');
         //solo para saber la manera de meter un valor de la seleccion en un campo de la pag actual
         document.getElementById("otro").value = ui.item.foto;


    }


  });

});
  		</script>
	</head>
	<body>
    <!--donde se hace la busqueda-->
		<input type="text" class="busca" id="search" />
<div id="display">
  <input id="otro" type="text "></input>
</div>
<div id="otros"></div>
	</body>
<html>
