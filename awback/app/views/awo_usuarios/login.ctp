
<h1>Aigcm</h1>
	<div class="column">
		<p>Esta es la entrada al gestor de contenidos de la p&aacute;gina web de las Asociaci&oacute;n de Ingenieros Ge&oacute;logos introduzca su usuario y su contrase&ntilde;a.</p>
	</div>
	<div class="column right">
		<p>Si usted, tiene permisos y no puede entrar pongas en contacto con el administrador de la web en el correo electr&oacute;nico <a href="mailto:comunicacion@awonawilona.es">comunicacion@awonawilona.es</a>.</p>
	</div>

<h2>Registro</h2>    
    <?php echo $form->create('AwoUsuario', array('action' => 'login'));?>
        <?php echo $form->input('username', array('label' => 'Usuario:'));?>
        <?php echo $form->input('password', array('label' => 'Contrase&ntilde;a:'));?>
        <?php echo $form->submit('Enviar');?>
    <?php echo $form->end(); ?>
    
    <p><strong>Nota:</strong> Si has olvidado tu usuario o contrase&ntilde;a ponte en contacto con el administrador en <a href="mailto:comunicacion@awonawilona.es">comunicacion@awonawilona.es</a></p>
