<?php

//Llamamos al archivo que contiene la clase.
require ("class_antispam.php");

//Creamos el objeto que necesitamos
$antispam= new ClaseAntiSpam();

echo '<h2 id="contacto">Contacto</h2>';

//Comprobamos si los datos se han enviado
if (isset($_POST['enviar']))
 {
	 //Comprobamos si la respuesta es correcto
	 if ($antispam->ComprobarRespuesta())
		{
	 	//Hacemos lo conveniente con los datos que llegan del formulario.
		$antispam->EnviarFormulario();
	 	//Mostramos que todo esta ok
	 	echo '<p>Gracias por enviar su formulario nos pondremos en contacto con usted lo antes posible</p>';
 		}
	else
 		{
	 	//Devolvemos que el resultado es incorrecto.
	 	echo '<p>Error vuelva a intentarlo.</a></p>';
 		}
}else{
		echo '<p>Para cualquier consulta o aclaraci&oacute;n puede rellenar el siguiente cuestionario:</p>';
	}

//Cargamos el formulario
include("formulario.php");
	 
?>