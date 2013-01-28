
<?php

class ClaseAntiSpam
{

    //Inicializamos la variable que contendra el array de preguntas.
    public $preguntas = array();

    function __construct()
        {
            //Incluimos las preguntas las cuales son candidatas a salir.
            include("preguntas.php");
        }

    //Funcion encargada de seleccionar la pregunta
    public function GeneraPregunta() {
        //Seleccionamos una pregunta al azar
        $mostrarpre = mt_rand(0, count($this->preguntas) - 1);
        //Mostramos el texto y convertimos los caracteres con htmlentities()
        return '<label>' .htmlentities($this->preguntas[$mostrarpre][0]) . '</label>
        <input type="text" name="respuesta" />
        <input type="hidden" name="correcta" value="' . $mostrarpre . '" /></p>';
    }

    // Recupera la respuesta y la comprueba
    public function ComprobarRespuesta() {
        $correcta = false;
        //Calculamos el tamaño del array de preguntas
        $contarcarac = count($this->preguntas);
        //Tomamos la respuesta correcta
        $indice =$_POST["correcta"];
        //Si el indice es cirrecti continuamos
        if ($indice > -1 && $indice < $contarcarac)
            {
                //Convertimos la respuesta del usuarios a minusculas con strtolower
                $respuestausu= strtolower($_POST["respuesta"]);
                //Si la respuesta no esta vacia continuamos
                if ($respuestausu != "")
                    {
                        //Dividimos las posibles respuestas para recorrerlas posteriomente
                        $trozos = explode(",", $this->preguntas[$indice][1]);

                        foreach ($trozos as $respuestafinal) {
                            //Si la respuesta coincide nos devuelve true.
                            if ($respuestafinal == $respuestausu)
                                $correcta = true;
                        }
                    }
            }

        return $correcta;
    }
	public function EnviarFormulario() {
		 if (isset($_POST['email'])){
				// Datos del email
				
				$mandar_a ="info@aigcm.es,presidente@aigcm.es";
				
				$nombre_origen    = "Formulario AIGCM";
				$email_origen     = $_POST['email'];
				
				// Mensaje a enviar
				
				$mensaje          = '	<p>Esto es un comentario desde la '.$nombre_origen.'<p>
										<h3>De: '.$_POST['name'].'</h3>
										<h4>email: '.$_POST['email'].'</h4>
										<h4>Tel&eacute;fono: '.$_POST['tel'].'</h4>
										<p>Observaciones:</p><p>'.$_POST['comment'].'</p>';
				
				$formato          = "html";
				
				 //*****************************************************************//
				 
				$headers  = "From: $nombre_origen <$email_origen> \r\n";
				$headers .= "Return-Path: <$email_origen> \r\n";
				$headers .= "Reply-To: $email_origen \r\n";
				
				$headers .= "X-Priority: 1 \r\n";
				$headers .= "MIME-Version: 1.0 \r\n";
				$headers .= "Content-Transfer-Encoding: 7bit \r\n";
				$headers .= "Bcc:prueda@awonawilona.es\r\n";
				
				//*****************************************************************//
				 
				if($formato == "html")
				 { $headers .= "Content-Type: text/html; charset=iso-8859-1 \r\n";  }
				   else
					{ $headers .= "Content-Type: text/plain; charset=iso-8859-1 \r\n";  }
				if (isset($_POST['email'])){
				if (@mail($mandar_a, $nombre_origen, $mensaje, $headers)) 
					{ 	
						$respuesta = 'Envio correcto, Nos pondremos en contacto con usted lo antes posible.';
					} 
					 else 
					{ $respuesta = "Error, No se ha establecido la conexión con el servidor, por favor intentelo de nuevo pasados unos minutos.";}
				}
		}
	}
}

?>