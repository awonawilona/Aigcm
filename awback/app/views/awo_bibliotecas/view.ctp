<div class="awoBibliotecas view">
<h2><?php  __('AwoBiblioteca');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $awoBiblioteca['AwoBiblioteca']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Titulo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $awoBiblioteca['AwoBiblioteca']['titulo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $awoBiblioteca['AwoBiblioteca']['tipo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Archivo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $awoBiblioteca['AwoBiblioteca']['archivo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $awoBiblioteca['AwoBiblioteca']['estado']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Portada'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $awoBiblioteca['AwoBiblioteca']['portada']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created At'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $awoBiblioteca['AwoBiblioteca']['created_at']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated At'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $awoBiblioteca['AwoBiblioteca']['updated_at']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit AwoBiblioteca', true), array('action' => 'edit', $awoBiblioteca['AwoBiblioteca']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete AwoBiblioteca', true), array('action' => 'delete', $awoBiblioteca['AwoBiblioteca']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $awoBiblioteca['AwoBiblioteca']['id'])); ?> </li>
		<li><?php echo $html->link(__('List AwoBibliotecas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New AwoBiblioteca', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
