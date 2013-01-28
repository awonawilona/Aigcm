<div class="awoConfigs index">
<h2><?php __('AwoConfigs');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('modulo');?></th>
	<th><?php echo $paginator->sort('estado');?></th>
	<th><?php echo $paginator->sort('not_max_titulo');?></th>
	<th><?php echo $paginator->sort('not_max_entradilla');?></th>
	<th><?php echo $paginator->sort('not_max_contenido');?></th>
	<th><?php echo $paginator->sort('not_max_portada');?></th>
	<th><?php echo $paginator->sort('bibl_file_type');?></th>
	<th><?php echo $paginator->sort('bibl_max_size');?></th>
	<th><?php echo $paginator->sort('gal_max_titulo');?></th>
	<th><?php echo $paginator->sort('gal_max_imagen');?></th>
	<th><?php echo $paginator->sort('gal_max_resumen');?></th>
	<th><?php echo $paginator->sort('gal_max_size');?></th>
	<th><?php echo $paginator->sort('gal_tb_width');?></th>
	<th><?php echo $paginator->sort('gal_tb_height');?></th>
	<th><?php echo $paginator->sort('gal_img_width');?></th>
	<th><?php echo $paginator->sort('gal_img_height');?></th>
	<th><?php echo $paginator->sort('usu_tipo_granted');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($awoConfigs as $awoConfig):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $awoConfig['AwoConfig']['id']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['modulo']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['estado']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['not_max_titulo']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['not_max_entradilla']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['not_max_contenido']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['not_max_portada']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['bibl_file_type']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['bibl_max_size']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['gal_max_titulo']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['gal_max_imagen']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['gal_max_resumen']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['gal_max_size']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['gal_tb_width']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['gal_tb_height']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['gal_img_width']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['gal_img_height']; ?>
		</td>
		<td>
			<?php echo $awoConfig['AwoConfig']['usu_tipo_granted']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $awoConfig['AwoConfig']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $awoConfig['AwoConfig']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $awoConfig['AwoConfig']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $awoConfig['AwoConfig']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New AwoConfig', true), array('action' => 'add')); ?></li>
	</ul>
</div>
