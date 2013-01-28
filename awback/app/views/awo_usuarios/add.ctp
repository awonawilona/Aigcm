

<?php echo $form->create('AwoUsuario');?>
    
    <h1><?php echo $cliente.' | '.$usuarioIdentificado?></h1>
	<!--<div class="column">
		<p>Etiam dignissim odio erat. Duis non erat metus. Maecenas venenatis, leo non hendrerit sagittis, odio nunc dictum massa, nec mollis est lacus sed dolor. In hac habitasse platea dictumst. </p>
	</div>
	<div class="column right">
		<p>Donec id convallis leo. Morbi id tincidunt lorem. Donec pulvinar, augue vitae pellentesque molestie, lacus velit commodo justo, sit amet tempor dolor diam quis nibh.</p>
	</div>-->
    
    <h2>USUARIO</h2>
    
	<?php
		echo $form->input('username', array('label' => array('class' => 'top')));
		echo $form->input('nombre');
		echo $form->input('apellidos');
		echo $form->input('password');
		echo $form->input('email');
		echo $form->input('tipo', array('options' => array('2' => 'administrador', '3' => 'editor', '4' => 'socio'), 'type' => 'radio', array('class' => 'txt')));
		//echo $form->input('created_at');
        //echo $form->input('updated_at');
	?>
    <?php echo $form->end('Publicar');?>
