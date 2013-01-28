
<h1><?php echo $cliente.' | '.$usuarioIdentificado?></h1>
	<div class="column">
		<p>Etiam dignissim odio erat. Duis non erat metus. Maecenas venenatis, leo non hendrerit sagittis, odio nunc dictum massa, nec mollis est lacus sed dolor. In hac habitasse platea dictumst. </p>
	</div>
	<div class="column right">
		<p>Donec id convallis leo. Morbi id tincidunt lorem. Donec pulvinar, augue vitae pellentesque molestie, lacus velit commodo justo, sit amet tempor dolor diam quis nibh.</p>
	</div>
	
	<h2>GALER&Iacute;A DE IM&Aacute;GENES<?php echo $html->link(__('A&Ntilde;ADIR', true).' '.$html->image('mas.gif'), array('action' => 'add'), null, null, false); ?></h2>

<table id="listado">

<?php
$i = 0;
foreach ($awoGaleria as $awoGalerium):
	
 $ts = strtotime($awoGalerium['AwoGalerium']['created_at']);
?>
	<tr>
    
        <td class="td_img">
        
            <?php echo $html->link($html->image('borrar.gif'), array('action' => 'delete', $awoGalerium['AwoGalerium']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $awoGalerium['AwoGalerium']['id']), false); ?>
        
        </td>
        
        <td class="td_img">
        
            <?php echo $html->link($html->image('modificar.gif'), array('action' => 'edit', $awoGalerium['AwoGalerium']['id']), null, null, false); ?>
        
        </td>
        
		<td class="td_txt">
			<?php echo $awoGalerium['AwoGalerium']['imagen']; ?>
		</td>
        
		<td class="td_fecha">
        
			<?php echo date('d-m-Y', $ts); ?>
            
		</td>
        
	</tr>
<?php endforeach; ?>
</table>


<!--<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New AwoGalerium', true), array('action' => 'add')); ?></li>
	</ul>
</div>

<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>-->
