<div class="awoConfigs form">
<?php echo $form->create('AwoConfig');?>
	<fieldset>
 		<legend><?php __('Add AwoConfig');?></legend>
	<?php
		echo $form->input('modulo');
		echo $form->input('estado');
		echo $form->input('not_max_titulo');
		echo $form->input('not_max_entradilla');
		echo $form->input('not_max_contenido');
		echo $form->input('not_max_portada');
		echo $form->input('bibl_file_type');
		echo $form->input('bibl_max_size');
		echo $form->input('gal_max_titulo');
		echo $form->input('gal_max_imagen');
		echo $form->input('gal_max_resumen');
		echo $form->input('gal_max_size');
		echo $form->input('gal_tb_width');
		echo $form->input('gal_tb_height');
		echo $form->input('gal_img_width');
		echo $form->input('gal_img_height');
		echo $form->input('usu_tipo_granted');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List AwoConfigs', true), array('action' => 'index'));?></li>
	</ul>
</div>
