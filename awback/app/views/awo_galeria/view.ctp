<div class="awoGaleria view">
<h2><?php  __('AwoGalerium');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $awoGalerium['AwoGalerium']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Imagen'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $awoGalerium['AwoGalerium']['imagen']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripcion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $awoGalerium['AwoGalerium']['descripcion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Galeria'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $awoGalerium['AwoGalerium']['galeria']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created At'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $awoGalerium['AwoGalerium']['created_at']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated At'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $awoGalerium['AwoGalerium']['updated_at']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit AwoGalerium', true), array('action' => 'edit', $awoGalerium['AwoGalerium']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete AwoGalerium', true), array('action' => 'delete', $awoGalerium['AwoGalerium']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $awoGalerium['AwoGalerium']['id'])); ?> </li>
		<li><?php echo $html->link(__('List AwoGaleria', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New AwoGalerium', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
