<?php

    require_once('./php/classes/awback.class.php');
    
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
			<li><a href="http://www.ign.es" target="_blank">Instituto Geográfico Nacional</a></li>
		</ul>
		
		<a href="haztesocio.php" id="haztesocio" alt="Hazte Socio">Hazte Socio</a>
		
	</div>
	<div id="content">
	
		<h2 id="biblioteca">Biblioteca</h2>
		<img src="img/img08.jpg" alt="AIGCM" class="top"/>
<p>La documentaci&oacute;n t&eacute;cnica proporcionada desde  esta p&aacute;gina web se ha tomado legalmente de la web del M&ordm; de Fomento bajo los  <a href="http://www.fomento.gob.es/MFOM/LANG_CASTELLANO/ESTADISTICAS_Y_PUBLICACIONES/PUBLICACIONES/PUB_OF_LINEA/">t&eacute;rminos de reproducci&oacute;n y reutilizaci&oacute;n</a>   especificados por la fuente.</p>
		<ul id="archivos">
			<!--<li><a href="pdf/gcoc.pdf">Gu&iacute;a de cimentaciones en obras de carretera. M&ordm;Fom.2009</a></li>
			<li><a href="pdf/gato01.pdf">Gu&iacute;a para el dise&ntilde;o y ejecuci&oacute;n de anclajes al terreno en obras de carretera. M&ordm;Fom.2001</a></li>
			<li><a href="pdf/gmoc05.pdf">Gu&iacute;a para el proyecto y la ejecuci&oacute;n de micropilotes en obras de carretera. M&ordm;Fom.2005</a></li>
			<li><a href="pdf/gmeoc01.pdf">Gu&iacute;a para el proyecto y la ejecuci&oacute;n de muros de escollera en obras de carretera. M&ordm;Fom.2006</a></li>
			<li><a href="pdf/msr09.pdf">Manual para el proyecto y ejecuci&oacute;n de estructuras de suelo reforzado. MOPU.1989</a></li>
			<li><a href="pdf/ncsr02.pdf">Norma de construcci&oacute;n sismorresistente: parte general y edificaci&oacute;n. M&ordm;Fom.2002</a></li>
			<li><a href="pdf/ncsp07.pdf">Norma de construcci&oacute;n sismorresistente: puentes. M&ordm;Fom.2007</a></li>
			<li><a href="pdf/iap11.pdf">Instrucci&oacute;n sobre acciones a considerar en el proyecto de puentes de carretera. M&ordm;Fom.2011</a></li>
			<li><a href="pdf/ehe2008.pdf">Instrucci&oacute;n de hormig&oacute;n estructural (EHE-08). M&ordm;Fom. 2011</a></li>
			<li><a href="pdf/ctedbsec.pdf">C&oacute;digo t&eacute;cnico de la edificacion. Parte II, Seguridad Estructural:Cimientos. M&ordm;Fom. 2008</a></li>
			<li><a href="pdf/pg32004.pdf">Pliego de prescripciones t&eacute;cnicas generales para obras de carreteras y puentes (PG-3). M&ordm;Fom. 2004</a></li>
			<li><a href="pdf/eae.pdf">Instrucci&oacute;n del acero estructural (EAE). M&ordm;Fom. 2011</a></li>-->
            
            <?php
            
                $bibliotecas = new awback();
            
                $bibliotecasAlm = $bibliotecas->getBibliotecas();
                
                echo utf8_decode($bibliotecasAlm);
            
            ?>
            
		</ul>
		<!--<h2 id="boletin">Boletín</h2>
		<ul id="archivos">
			<li><a href="pdf/kpa_oct_2011.pdf">kPa Boletín Electrónico AIGCM-Octubre 2011</a></li>
			<li><a href="pdf/kpa_dic_2009.pdf">kPa Boletín Electrónico AIGCM-Diciembre 2009</a></li>
		</ul>
		<h2 id="asociacion">Asociación</h2>
		<ul id="archivos">
			<li><a href="pdf/aag_sept_2011.pdf">Acta Asamblea General - Septiembre 2011</a></li>
			<li><a href="pdf/aag_mar_2001.pdf">Acta Asamblea General - Marzo 2011</a><a href="pdf/gato01.pdf"></a></li>
		</ul>-->
	</div>
</div>

		<?php include("./php/footer.php"); ?>
</body>
</html>
