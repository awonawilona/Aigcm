
<h1><?php echo $cliente.' | '.$usuarioIdentificado?></h1>
	<!--<div class="column">
		<p>Etiam dignissim odio erat. Duis non erat metus. Maecenas venenatis, leo non hendrerit sagittis, odio nunc dictum massa, nec mollis est lacus sed dolor. In hac habitasse platea dictumst. </p>
	</div>
	<div class="column right">
		<p>Donec id convallis leo. Morbi id tincidunt lorem. Donec pulvinar, augue vitae pellentesque molestie, lacus velit commodo justo, sit amet tempor dolor diam quis nibh.</p>
	</div>-->
	
	<h2>ARCHIVOS<?php echo $html->link(__('A&Ntilde;ADIR', true).' '.$html->image('mas.gif'), array('action' => 'add'), null, null, false); ?></h2>

<table id="listado">

<?php

$tipoArchivo = array('1' => 'a_pdf.gif', '2' => 'a_www.gif', '3' => 'a_doc.gif');

foreach ($awoBibliotecas as $awoBiblioteca):

$ts = strtotime($awoBiblioteca['AwoBiblioteca']['created_at']);
	
?>
	<tr>
        
        <td class="td_img">
        
            <?php echo $html->link($html->image('borrar.gif'), array('action' => 'delete', $awoBiblioteca['AwoBiblioteca']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $awoBiblioteca['AwoBiblioteca']['id']), false); ?>
        
        </td>
        
        <td class="td_img">
        
            <?php echo $html->link($html->image('modificar.gif'), array('action' => 'edit', $awoBiblioteca['AwoBiblioteca']['id']), null, null, false); ?>
        
        </td>
        
        <td class="td_img">
        
            <?php
            
                if((int)$awoBiblioteca['AwoBiblioteca']['portada'] == 1)
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
            
                if($awoBiblioteca['AwoBiblioteca']['privada'] == '1')
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
			<?php echo $awoBiblioteca['AwoBiblioteca']['titulo']; ?>
		</td>
	
		<td>
			<?php echo $html->image($tipoArchivo[$awoBiblioteca['AwoBiblioteca']['tipo']]); ?>
		</td>
        
        <td>        
            <?php
                $fTs = strtotime($awoBiblioteca['AwoBiblioteca']['created_at']);
                
                echo date('d/m/Y', $fTs);
            ?>        
        </td>
		
		<!--<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $awoBiblioteca['AwoBiblioteca']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $awoBiblioteca['AwoBiblioteca']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $awoBiblioteca['AwoBiblioteca']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $awoBiblioteca['AwoBiblioteca']['id'])); ?>
		</td>-->
	</tr>
<?php endforeach; ?>
</table>


<p class="nota"><img src="img/borrar.gif" /> Borrar <img src="img/modificar.gif" /> Modificar <img src="img/privado.gif" /> Privado <img src="img/portada.gif" /> Portada</p>
<!--<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New AwoBiblioteca', true), array('action' => 'add')); ?></li>
	</ul>
</div>-->
