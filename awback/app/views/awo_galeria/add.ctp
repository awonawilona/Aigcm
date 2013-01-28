<h1><?php echo $cliente.' | '.$usuarioIdentificado?></h1>
	<div class="column">
		<p>Etiam dignissim odio erat. Duis non erat metus. Maecenas venenatis, leo non hendrerit sagittis, odio nunc dictum massa, nec mollis est lacus sed dolor. In hac habitasse platea dictumst. </p>
	</div>
	<div class="column right">
		<p>Donec id convallis leo. Morbi id tincidunt lorem. Donec pulvinar, augue vitae pellentesque molestie, lacus velit commodo justo, sit amet tempor dolor diam quis nibh.</p>
	</div>
	<h2>IM&Aacute;GENES</h2>
	<?php
        
        echo 
        
            $form->create('AwoGaleria', array('enctype' => 'multipart/form-data')).
        
            $form->input('titulo').
            
            $form->input('imagen', array('type' => 'file')).
            
            $form->input('descripcion');
		
	?>
	
<?php echo $form->end('Publicar');?>

