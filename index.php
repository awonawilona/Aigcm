<?php
    
    require_once('./php/classes/awback.class.php');
    
    session_start();
    
    $redir = false;
    
    if(isset($_GET['op']))
    {
        session_destroy();
        
        $redir = true;
    }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Asociaci&oacute;n de Ingenieros Ge&oacute;logos de la Comunidad de Madrid</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<link href="css/format.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/swfobject.js"></script>

<?php

if($redir)
{
    ?>
    
    <script>
    
        document.location.href = 'index.php';
    
    </script>
    
    <?php
}

?>
</head>

<body>
<div id="global">
		<?php include("./php/header00.php"); ?>
	<div id="sidebar">
		<?php include("./php/form.php"); ?>
		<?php include("./php/haztesocio.php"); ?>
		<?php include("./php/enlaces.php"); ?>	
	</div>
	<div id="content">
		<h2 id="noticias">Noticias &amp; Eventos</h2>
		<!--Noticia-->
		<!--<p class="fecha">Madrid, 12 de Abril de 2012</p>
		<p><a href="#" class="titulo">Jornada T&eacute;cnica de T&uacute;neles</a> <img src="img/img09.jpg" alt="Global Tunnelling" class="left" />El pr&oacute;ximo 10 de mayo se celebra la Jornada sobre Excavaci&oacute;n Mec&aacute;nica de T&uacute;neles con Equipos No Integrales, organizada por AETOS y la UPM, que tendr&aacute; lugar en el Sal&oacute;n de Actos de la ETSI de Minas de Madrid (C/R&iacute;os Rosas, 21; 28003 Madrid) y en la que adem&aacute;s, se presentar&aacute; el nuevo Manual de Excavaci&oacute;n de T&uacute;neles con Rozadoras por parte de D. Carlos L&oacute;pez Jimeno. Para m&aacute;s informaci&oacute;n incluimos el <a href="pdf/jornada_tuneles_mayo_2012.pdf">tr&iacute;ptico informativo</a> de la Jornada. Desde la AIGCM deseamos el mayor &eacute;xito posible para este evento y animamos a todos los interesados a acudir a una cita tan interesante para el estado del arte de la excavaci&oacute;n mecanizada de t&uacute;neles.</p>-->
		<?php
        
            $noticias = new awback();
            
            if(isset($_SESSION['usuario']))
            {
                $notPortada = $noticias->getNoticias(true);
            }
            else
            {
                $notPortada = $noticias->getNoticias();
            }
            
            echo $notPortada;
        
        ?>
	</div>
</div>
	<?php include("./php/footer.php"); ?>	
</body>
</html>
