<?php

    session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1	" />
<title>Asociaci&oacute;n de Ingenieros Ge&oacute;logos de la Comunidad de Madrid</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<link href="css/format.css" rel="stylesheet" type="text/css" />

	<?php
	
        if (isset($_POST['email'])){
			
				// Datos del email	
				$mandar_a ="prueda@awonawilona.es,info@aigcm.es,presidente@aigcm.es";
				$nombre_origen    = "Formulario Alta de Socio";
				$email_origen     = $_POST['email'];
				
				// Mensaje a enviar
				$mensaje          = '	<h1>Formulario Alta de Socio</h1>
				
										<h2>Datos Generales</h2>
										<ul>
											<li>Nombre: '.$_POST['name'].'</li>
											<li>Apellidos: '.$_POST['apellido1'].' '.$_POST['apellido2'].'</li>
											<li>Nif: '.$_POST['nif'].'</li>
											<li>Fecha de Nacimiento: '.$_POST['fecha'].'</li>
											<li>Localidad de Nacimiento: '.$_POST['localidad_nac'].'</li>
											<li>Provincia de Nacimiento: '.$_POST['provincia_nac'].'</li>
											<li>Nacionalidad: '.$_POST['nacional_nac'].'</li>
											<li>Direccion: '.$_POST['direccion'].'</li>
											<li>Codigo Postal: '.$_POST['cp'].'</li>
											<li>Localidad: '.$_POST['localidad'].'</li>
											<li>Provincia: '.$_POST['provincia'].'</li>
											<li>Telefono Fijo: '.$_POST['tel1'].'</li>
											<li>Telefono Movil: '.$_POST['tel2'].'</li>
											<li>Email: '.$_POST['email'].'</li>
										</ul>
										
										<h2>Datos Academicos</h2>
										<ul>
											<li>Titulacion: '.$_POST['titulacion'].'</li>
											<li>Centro: '.$_POST['centro'].'</li>
											<li>Universidad: '.$_POST['universidad'].'</li>
											<li>Año Inicio: '.$_POST['ano_inicio'].'</li>
											<li>Año Fin: '.$_POST['ano_fin'].'</li>
										</ul>
										
										<h2>Datos Profesional</h2>
										<ul>
											<li>Empresa o Entidad: '.$_POST['empresa'].'</li>
											<li>Cargo: '.$_POST['cargo'].'</li>
											<li>Campo de Actividad: '.$_POST['campo'].'</li>
											<li>Años de experiencia: '.$_POST['experiencia'].'</li>
										</ul>
									';
				$formato          = "html";
				
				 //*****************************************************************//
				 
				$headers  = "From: $nombre_origen <$email_origen> \r\n";
				$headers .= "Return-Path: <$email_origen> \r\n";
				$headers .= "Reply-To: $email_origen \r\n";
				
				$headers .= "X-Priority: 1 \r\n";
				$headers .= "MIME-Version: 1.0 \r\n";
				$headers .= "Content-Transfer-Encoding: 7bit \r\n";
				
				//*****************************************************************//
				 
				if($formato == "html")
				 { $headers .= "Content-Type: text/html; charset=iso-8859-1 \r\n";  }
				   else
					{ $headers .= "Content-Type: text/plain; charset=iso-8859-1 \r\n";  }
				if (isset($_POST['email'])){
				if (@mail($mandar_a, $nombre_origen, $mensaje, $headers)) 
					{ 	$respuesta = 'Envio correcto, Nos pondremos en contacto con usted lo antes posible.';
					} 
					 else 
					{ $respuesta = "Error, No se ha establecido la conexión con el servidor, por favor intentelo de nuevo pasados unos minutos.";}
				}
		}
     ?>


</head>

<body>
<div id="global">
	<?php include("./php/header.php"); ?>
	<div id="sidebar">
		<p>AIGCM es la Demarcaci&oacute;n auton&oacute;mica de Madrid de la Confederaci&oacute;n de Ingenieros Ge&oacute;logos</p>
		<a href="http://www.coig.org.es/" id="coig" alt="Confederación de Ingenieros Geólogos">Coig</a>
		<h2 id="enlaces_top">Enlaces de inter&eacute;s</h2>
		<ul id="link">
			<li><a href="http://www.coig.org.es" target="_blank">Confederaci&oacute;n de Ingenieros Ge&oacute;logos, COIG</a></li>
			<li><a href="http://www.semr.es" target="_blank">Sociedad Espa&ntilde;ola de Mec&aacute;nica de Rocas</a></li>
			<li><a href="http://www.semsig.org/" target="_blank">Sociedad Española de Mecánica del Suelo e Ingeniería Geotécnica</a></li>
			<li><a href="http://www.aetos.es" target="_blank">Asociación Española de Túneles y Obras Subterráneas</a></li>
			<li><a href="http://www.aeis-sismica.es" target="_blank">Asociación Española de Ingeniería Sísmica</a></li>
			<li><a href="http://www.igme.es" target="_blank">Instituto Geológico y Minero de España</a></li>
			<li><a href="http://www.ign.es " target="_blank">Instituto Geográfico Nacional</a></li>
		</ul>
	</div>
	<div id="content">
		<h2 id="alta">Petici&oacute;n de alta de socio de AIGCM</h2>
		<form id="formulario_alta" action="#" method="post">
			<h3>DATOS GENERALES</h3>
			<div>
				<label for="name"><span>NOMBRE:</span>
					<input name="name" type="text" />
				</label>
				<label for="apellido1"><span>PRIMER APELLIDO:</span>
					<input name="apellido1" type="text"  />
				</label>
				<label for="apellido2"><span>SEGUNDO APELLIDO:</span>
					<input name="apellido2" type="text"  />
				</label>
				<label for="nif"><span>NIF:</span>
					<input name="nif" type="text" />
				</label>
			</div>
			<div>
				<label for="fecha"><span>FECHA DE NACIMIENTO:</span>
					<input name="fecha" type="text" />
				</label>
				<label for="localidad_nac"><span>LOCALIDAD DE NAC.:</span>
					<input name="localidad_nac" type="text"  />
				</label>
				<label for="provincia_nac"><span>PROVINCIA DE NAC.:</span>
					<input name="provincia_nac" type="text"  />
				</label>
				<label for="nacional_nac"><span>NACIONALIDAD:</span>
					<input name="nacional_nac" type="text"  />
				</label>
			</div>
			<div>
				<label for="direccion"><span>DIRECCI&Oacute;N</span>
					<input name="direccion" type="text"/>
				</label>
				<label for="cp"><span>C&Oacute;DIGO POSTAL:</span>
					<input name="cp" type="text"/>
				</label>
				<label for="localidad"><span>LOCALIDAD:</span>
					<input name="localidad" type="text"/>
				</label>
				<label for="provincia"><span>PROVINCIA:</span>
					<input name="provincia" type="text"/>
				</label>
			</div>
			<div>
				<label for="tel1"><span>TEL&Eacute;FONO FIJO:</span>
					<input name="tel1" type="text"/>
				</label>
				<label for="tel2"><span>TEL&Eacute;FONO M&Oacute;VIL:</span>
					<input name="tel2" type="text"/>
				</label>
				<label for="email"><span>EMAIL:</span>
					<input name="email" type="text"/>
				</label>
			</div>
			<h3>DATOS ACAD&Eacute;MICOS</h3>
			<div class="doble">
				<label for="titulacion"><span>TITULACI&Oacute;N:</span>
					<input name="titulacion" type="text" />
				</label>
				<label for="centro"><span>CENTRO DONDE CURS&Oacute; O CURSA LA TITULACI&Oacute;N:</span>
					<input name="centro" type="text"  />
				</label>
				<label for="universidad"><span>UNIVERSIDAD DONDE CURS&Oacute; O CURSA LA TITULACI&Oacute;N:</span>
					<input name="universidad" type="text"  />
				</label>
				<label for="ano_inicio"><span>A&Ntilde;O DE INICIO DE LOS ESTUDIOS UNIVERSITARIOS:</span>
					<input name="ano_inicio" type="text" />
				</label>
				<label for="ano_fin"><span>A&Ntilde;O DE FINALIZACI&Oacute;N DE LOS ESTUDIOS UNIVERSITARIOS:</span>
					<input name="ano_fin" type="text" />
				</label>
			</div>
			<h3>DATOS PROFESIONALES</h3>
			<div class="doble">
				<label for="empresa"><span>EMPRESA O ENTIDAD</span>
					<input name="empresa" type="text" />
				</label>
				<label for="cargo"><span>CARGO</span>
					<input name="cargo" type="text"  />
				</label>
				<label for="campo"><span>CAMPO DE ACTIVIDAD</span>
					<input name="campo" type="text"  />
				</label>
				<label for="experiencia"><span>NÚMERO DE AÑOS DE EXPERIENCIA PROFESIONAL</span>
					<input name="experiencia" type="text" />
				</label>
			</div>
			<input type="submit" value="ENVIAR" class="enviar" />
		</form>
	</div>
</div>

		<?php include("./php/footer.php"); ?>
</body>
</html>
