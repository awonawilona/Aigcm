<h1><?php echo $cliente.' | '.$usuarioIdentificado?></h1>
	<div class="column">
		<p>En la p&aacute;gina de administrador podr&aacute; cambiar las caracter&iacute;sticas del gestor de contenidos.Por eso es muy importante que si no esta seguro de lo que esta haciendo por favor pongase en contacto con el</p>
	</div>
	<div class="column right">
		<p>administrador por medio del correo electr&oacute;nico <a href="mailto:comunicacion@awonawilona.es">comunicacion@awonawilona.es</a>, y le daremos soluci&oacute;n antes posibles a sus necesidades.</p>
	</div>
<?php 
    
//var_dump($this->data);
        
        //var_dump($modulos);
        
        $elemArch = explode(',', $this->data['AwoConfig']['bibl_file_type']);

        echo $form->create('AwoConfig');?>
	
	<?php
		echo $form->input('id');
        
        echo '<h2>GENERAL</h2>';
        
        foreach($modulos as $modulo)
        {
            if((int)$modulo['modulos']['estado'] == 1)
            {
                echo $form->input('modulo'.$modulo['modulos']['id'], array('options' => array('1'), 'value' => $modulo['modulos']['id'], 'type' => 'checkbox', 'label' => utf8_encode($modulo['modulos']['modulo']), 'checked' => 'checked'));
            }
            else
            {
                echo $form->input('modulo'.$modulo['modulos']['id'], array('options' => array('1'), 'value' => $modulo['modulos']['id'], 'type' => 'checkbox', 'label' => utf8_encode($modulo['modulos']['modulo'])));   
            }
        }
        
        echo '<h2>NOTICIAS</h2>';
        
		echo $form->input('not_max_titulo', array('label' => 'T&iacute;tulo (M&aacute;x. Caracteres)'));
		echo $form->input('not_max_entradilla', array('label' => 'Entradilla (M&aacute;x. Caracteres)'));
		echo $form->input('not_max_contenido', array('label' => 'Noticias (M&aacute;x. Caracteres)'));
		echo $form->input('not_max_portada', array('label' => 'Portada (N&ordm; de noticias)'));
        
        echo '<h2>BIBLIOTECA</h2>';
        
		//echo $form->input('bibl_file_type', array('label' => 'Tipos de archivos'));
        //echo $form->input('bibl_file_type', array('options' => array('PDF', 'WWW', 'DOC', 'XLS'), 'type' => 'checkbox'));
        
        if( in_array('PDF', $elemArch) )
        {
            echo $form->input('tipoArch1', array('options' => array('pdf' => 'pdf'), 'type' => 'checkbox', 'label' => 'PDF', 'checked' => 'checked'));
        }
        else
        {
            echo $form->input('tipoArch1', array('options' => array('pdf' => 'pdf'), 'type' => 'checkbox', 'label' => 'PDF'));
        }
        
        if( in_array('WWW', $elemArch) )
        {
            echo $form->input('tipoArch2', array('options' => array('www'), 'type' => 'checkbox', 'label' => 'WWW', 'checked' => 'checked'));
        }
        else
        {
            echo $form->input('tipoArch2', array('options' => array('www'), 'type' => 'checkbox', 'label' => 'WWW'));
        }
        
        if( in_array('DOC', $elemArch) )
        {
            echo $form->input('tipoArch3', array('options' => array('doc'), 'type' => 'checkbox', 'label' => 'DOC', 'checked' => 'checked'));
        }
        else
        {
            echo $form->input('tipoArch3', array('options' => array('doc'), 'type' => 'checkbox', 'label' => 'DOC'));
        }
        
        if( in_array('XLS', $elemArch) )
        {
            echo $form->input('tipoArch4', array('options' => array('xls'), 'type' => 'checkbox', 'label' => 'XLS', 'checked' => 'checked'));
        }
        else
        {
            echo $form->input('tipoArch4', array('options' => array('xls'), 'type' => 'checkbox', 'label' => 'XLS'));
        }
        
		echo $form->input('bibl_max_size', array('label' => 'Tama&ntilde;o M&aacute;ximo (MB)'));
        
        echo '<h2>GALER&Iacute;A DE IM&Aacute;GENES</h2>';
        
		echo $form->input('gal_max_titulo', array('label' => 'T&iacute;tulo Galer&iacute;a (M&aacute;x. Caract.)'));
		echo $form->input('gal_max_imagen', array('label' => 'T&iacute;tulo Images (M&aacute;x. Caract.)'));
		echo $form->input('gal_max_resumen', array('label' => 'Resumen Galer&iacute;a (M&aacute;x. Caract.)'));
		echo $form->input('gal_max_size', array('label' => 'Tama&ntilde;o M&aacute;ximo (MB)'));
		echo $form->input('gal_tb_width', array('label' => 'Thumb PX Ancho'));
		echo $form->input('gal_tb_height', array('label' => 'Thumb PX Largo'));
		echo $form->input('gal_img_width', array('label' => 'Imagen PX Ancho'));
		echo $form->input('gal_img_height', array('label' => 'Imagen PX Largo'));
		//echo $form->input('usu_tipo_granted');
	?>
	
<?php echo $form->end('Publicar');?>

