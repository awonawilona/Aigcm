
<h1><?php echo $cliente.' | '.$usuarioIdentificado?></h1>
	<!--<div class="column">
		<p>Etiam dignissim odio erat. Duis non erat metus. Maecenas venenatis, leo non hendrerit sagittis, odio nunc dictum massa, nec mollis est lacus sed dolor. In hac habitasse platea dictumst. </p>
	</div>
	<div class="column right">
		<p>Donec id convallis leo. Morbi id tincidunt lorem. Donec pulvinar, augue vitae pellentesque molestie, lacus velit commodo justo, sit amet tempor dolor diam quis nibh.</p>
	</div>-->
	
	<h2>NOTICIAS<?php echo $html->link(__('A&Ntilde;ADIR', true).' '.$html->image('mas.gif'), array('action' => 'add'), null, null, false); ?></h2>

<table id="listado">
<?php

$i = 0;
foreach ($awoNoticias as $awoNoticia):

$ts = strtotime($awoNoticia['AwoNoticia']['created_at']);
	
?>
	<tr>
    
        <td class="td_img">
        
            <?php echo $html->link($html->image('borrar.gif'), array('action' => 'delete', $awoNoticia['AwoNoticia']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $awoNoticia['AwoNoticia']['id']), false); ?>
        
        </td>
        
        <td class="td_img">
        
            <?php echo $html->link($html->image('modificar.gif'), array('action' => 'edit', $awoNoticia['AwoNoticia']['id']), null, null, false); ?>
        
        </td>
        
        <td class="td_img">
        
            <?php
            
                if((int)$awoNoticia['AwoNoticia']['portada'] == 1)
                {
                    echo $html->image('portada.gif');
                }
                else
                {
                    echo '&nbsp;';
                }
            
            ?>
        
        </td>
        
        <td class="td_img">
        
            <?php
            
                if((int)$awoNoticia['AwoNoticia']['socios'] == 1)
                {
                    echo $html->image('privado.gif');
                }
                else
                {
                    echo '&nbsp;';
                }
            
            ?>
        
        </td>
        
		<td class="td_txt">
			<?php echo $awoNoticia['AwoNoticia']['titulo']; ?>
		</td>
	
		<td class="td_fecha">
			<?php echo date('d/m/Y', $ts); ?>
		</td>
        
	</tr>
<?php endforeach; ?>
</table>

<p class="nota"><img src="img/borrar.gif" /> Borrar <img src="img/modificar.gif" /> Modificar <img src="img/privado.gif" /> Privado <img src="img/portada.gif" /> Portada</p>

<!--</a><p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>

<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New AwoNoticia', true), array('action' => 'add')); ?></li>
	</ul>
</div>-->
