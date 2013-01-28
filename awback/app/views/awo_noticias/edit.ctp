<h1><?php echo $cliente.' | '.$usuarioIdentificado?></h1>
	<!--<div class="column">
		<p>Etiam dignissim odio erat. Duis non erat metus. Maecenas venenatis, leo non hendrerit sagittis, odio nunc dictum massa, nec mollis est lacus sed dolor. In hac habitasse platea dictumst. </p>
	</div>
	<div class="column right">
		<p>Donec id convallis leo. Morbi id tincidunt lorem. Donec pulvinar, augue vitae pellentesque molestie, lacus velit commodo justo, sit amet tempor dolor diam quis nibh.</p>
	</div>-->
<?php 
        
        $tam = (int)$config[0]['awo_config']['gal_max_size'] / 1024;
        
        echo $form->create('AwoNoticia', array('enctype' => 'multipart/form-data'));
        
        echo 
            
            '<h2>
            
                NOTICIA
                
                <div>
                    
                    '.$form->input('socios', array('options' => array('1' => 'privado'), 'type' => 'checkbox')).'
                    
                </div>
            </h2>';
	
		echo $form->input('id');
		echo $form->input('titulo');
		//echo $form->input('entradilla', array('type' => 'textarea'));
		echo $form->input('imagen', array('between'=>'<br />','type'=>'file'));
        
        echo 
        
            '<p>'.
            
                'Para no saturar el servidor y la conexi&oacute;n la foto debe pesar menos de '.$tam.' Mb, Por favor, compruebe que su foto esta en baja resoluci&oacute;n antes de intentar subirla.'.
            
            '</p>';
        
        
		//echo $form->input('archivo', array('between'=>'<br />','type'=>'file'));
		echo $tinymce->input('contenido', null, array(
                                                        'theme' => 'advanced',
                                                        'theme_advanced_buttons1' => 'bold,italic,underline,undo,redo,link,unlink,removeformat,cleanup,code',
                                                        'theme_advanced_buttons2' => '',
                                                        'theme_advanced_buttons3' => '', 
                                                        'theme_advanced_toolbar_location'   => 'top',
                                                        'theme_advanced_toolbar_align'      => 'left',
                                                        'theme_advanced_statusbar_location' => 'bottom',
                                                        'height' => '550'
                                                    ));
	
        echo $form->end('Actualizar');?>

