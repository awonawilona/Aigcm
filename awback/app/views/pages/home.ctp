

<h1><?php echo $cliente.' | '.$usuarioIdentificado?></h1>
	<!--<div class="column">
		<p>Esta es la entrada al gestor de contenidos de la p&aacute;gina web de las Asociaci&oacute;n de Ingenieros Ge&oacute;logos introduzca su usuario y su contrase&ntilde;a.</p>
	</div>
	<div class="column right">
		<p>Si usted, tiene permisos y no puede entrar pongas en contacto con el administrador de la web en el correo electr&oacute;nico <a href="mailto:comunicacion@awonawilona.es">comunicacion@awonawilona.es</a>.</p>
	</div>-->
	
	<h2>&Uacute;LTIMAS NOTICIAS</h2>
	<!--<a href="#" class="noticia top">
		<h3>Etiam dignissim odio erat. Duis non erat metus. Maecenas venenatis, leo non hendrerit sagittis, odio nunc dictum massa, nec mollis est lacus sed dolor. </h3>
		<p class="fecha">(13/03/2012)</p>
		<p>Etiam dignissim odio erat. Duis non erat metus. Maecenas venenatis, leo non hendrerit sagittis, odio nunc dictum massa, nec mollis est lacus sed dolor. In hac habitasse platea dictumst.</p>
	</a>-->
<?php
    
    $contNoticia = 0;
    
    if(sizeof($u_noticias) > 0)
    {
        foreach($u_noticias as $noticia)
        {   
            if(strlen($noticia['awo_noticias']['entradilla']) == 0)
            {
                $texto = strip_tags($noticia['awo_noticias']['contenido']);
                
                $partes = explode(' ', $texto);
                
                $tam = 250;
                
                $contenido = '';
                
                foreach($partes as $parteCont)
                {
                    $tamCont = strlen($contenido);
                    
                    if($tamCont < $tam)
                    {
                        $contenido .= $parteCont.' ';
                    }
                }
                
                $cont = 
                
                '<h3>'.
                
                    $noticia['awo_noticias']['titulo'].
                
                '</h3>'.
                
                '<p class="fecha">'.
                
                    '( '.$noticia['awo_noticias']['created_at'].' )'.
                
                '</p>'.
                
                '<p>'.
                
                    $contenido.'...'.
                
                '</p>';   
                
            }
            else
            {
                $cont = 
                
                '<h3>'.
                
                    $noticia['awo_noticias']['titulo'].
                
                '</h3>'.
                
                '<p class="fecha">'.
                
                    '( '.$noticia['awo_noticias']['created_at'].' )'.
                
                '</p>'.
                
                '<p>'.
                
                    $noticia['awo_noticias']['entradilla'].
                
                '</p>';   
            }
            
            if($contNoticia == 0)
            {
                echo $html->link($cont, '/awo_noticias/edit/'.$noticia['awo_noticias']['id'], array('class' => 'noticia top'), null, false);
            }
            else
            {
                echo $html->link($cont, '/awo_noticias/edit/'.$noticia['awo_noticias']['id'], array('class' => 'noticia'), null, false);
            }
            
            $contNoticia++;
        }
    }
    else
    {
        echo 'No hay noticias para mostrar en estos momentos.';
    }

?>

	<!--<h2>&Uacute;LTIMAS IM&Aacute;GENES</h2>
	<a class="muestra" href="#"><?php echo $html->image('img.jpg');?></a>
	<a class="muestra" href="#"><?php echo $html->image('img.jpg');?></a>
	<a class="muestra" href="#"><?php echo $html->image('img.jpg');?></a>
	<a class="muestra" href="#"><?php echo $html->image('img.jpg');?></a>
	<a class="muestra" href="#"><?php echo $html->image('img.jpg');?></a>
	<a class="muestra" href="#"><?php echo $html->image('img.jpg');?></a>-->

	<h2>&Uacute;LTIMOS ARCHIVOS</h2>
	<!--<a class="file pdf" href="#">Etiam dignissim odio erat.</a>
	<a class="file doc" href="#">Maecenas venenatis, leo non hendrerit sagittis, odio nunc dictum massa.</a>
	<a class="file www" href="#">Pellentesque cursus, purus in sagittis ullamcorper, lectus massa rhoncus nisi.</a>
	<a class="file doc" href="#">Nam sit amet sapien nunc, ut vehicula leo.</a>
	<a class="file pdf" href="#">Aenean et laoreet lacus. Pellentesque quis dolor quam.</a>-->
    
<?php
    
    if(sizeof($u_archivos) > 0)
    {
        foreach($u_archivos as $archivo)
        {
            $contArchivo = 
            
                    $archivo['a']['titulo'];
                    
            echo $html->link($contArchivo, '/awo_bibliotecas/edit/'.$archivo['a']['id'], array('class' => 'file '.$archivo['b']['archivo']), null, false);
        }  
    }
    else
    {
        echo 'Por el momento no hay archivos que mostrar.';   
    }

?>