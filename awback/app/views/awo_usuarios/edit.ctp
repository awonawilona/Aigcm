<h1><?php echo $cliente.' | '.$usuarioIdentificado?></h1>
	<!--<div class="column">
		<p>Etiam dignissim odio erat. Duis non erat metus. Maecenas venenatis, leo non hendrerit sagittis, odio nunc dictum massa, nec mollis est lacus sed dolor. In hac habitasse platea dictumst. </p>
	</div>
	<div class="column right">
		<p>Donec id convallis leo. Morbi id tincidunt lorem. Donec pulvinar, augue vitae pellentesque molestie, lacus velit commodo justo, sit amet tempor dolor diam quis nibh.</p>
	</div>-->
    
    <h2>USUARIO</h2>
<?php echo $form->create('AwoUsuario');?>
	
	<?php
		echo $form->input('id');
		echo $form->input('username');
		echo $form->input('nombre');
		echo $form->input('apellidos');
		echo $form->input('password', array('value' => ''));
        echo $form->input('passwordConf', array('type' => 'password'));
		echo $form->input('email');
		echo $form->input('tipo', array('options' => array('2' => 'administrador', '3' => 'editor', '4' => 'socio'), 'type' => 'radio'));
		//echo $form->input('created_at');
		//echo $form->input('updated_at');
	?>
<?php echo $form->end('Actualizar');?>

