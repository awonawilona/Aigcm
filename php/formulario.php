
<form id="contacto" method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
	<label for="name">NOMBRE:</label><input type="text" name="name" value="NAME"/>
	<label for="email">EMAIL:</label><input type="text" name="email" value="EMAIL"/>
	<label for="tel">TEL&Eacute;FONO:</label><input type="text" name="tel" value="PHONE"/>
	<label for="comment">COMENTARIO:</label><textarea name="comment">COMMENTS</textarea>
	<p>Pregunta Antispam</p>
	<?php echo $antispam->GeneraPregunta(); ?>
    <input type="submit"  name="enviar" value="Enviar" />
</form>