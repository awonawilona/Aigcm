<?php 
    
    $agregar = $html->image('mas.gif');            
            
?>

<h1><?php echo $cliente.' | '.$usuarioIdentificado?></h1>
	<!--<div class="column">
		<p>Etiam dignissim odio erat. Duis non erat metus. Maecenas venenatis, leo non hendrerit sagittis, odio nunc dictum massa, nec mollis est lacus sed dolor. In hac habitasse platea dictumst. </p>
	</div>
	<div class="column right">
		<p>Donec id convallis leo. Morbi id tincidunt lorem. Donec pulvinar, augue vitae pellentesque molestie, lacus velit commodo justo, sit amet tempor dolor diam quis nibh.</p>
	</div>-->
    
    	<h2>USUARIOS<?php echo $html->link(__('A&Ntilde;ADIR', true).' '.$agregar, array('action' => 'add'), null, null, false);?></h2>
        
        <table id="listado">
            <?php
            $i = 0;
            foreach ($awoUsuarios as $awoUsuario):
                
                $ts = strtotime($awoUsuario['AwoUsuario']['created_at']);
                
                $editar = $html->image('modificar.gif');
                
                $eliminar = $html->image('borrar.gif');
                
                $perfil = $html->image($awoUsuario['AwoUsuario']['tipo'].'.gif');
                
            ?>
            	<tr>
                    
                    
        			<?php
                        
                        if($awoUsuario['AwoUsuario']['tipo'] <> 1)
                        {
                            echo 
                            
                            '<td class="td_img">'.
                            
                                $html->link($editar, array('action' => 'edit', $awoUsuario['AwoUsuario']['id']), null, null, false).
                            
                            '</td>'.
                            
                            '<td class="td_img">'.
                            
                                $html->link($eliminar, array('action' => 'delete', $awoUsuario['AwoUsuario']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $awoUsuario['AwoUsuario']['id']), false).
                            
                            '</td>';  
                        }
                        else
                        {
                            echo 
                            
                            '<td class="td_img">'.
                            
                                '&nbsp;'.
                            
                            '</td>'.
                            
                            '<td class="td_img">'.
                            
                                '&nbsp;'.
                            
                            '</td>';  
                        }
                        
                    ?>
                    
                    <td class="td_txt">
            			<?php echo $awoUsuario['AwoUsuario']['nombre']; ?>
            		</td>
                    
            		<td class="td_txt">
            			<?php echo utf8_encode($awoUsuario['AwoUsuario']['apellidos']); ?>
            		</td>
                    
                    <td class="td_txt">
            			<?php echo $awoUsuario['AwoUsuario']['email']; ?>
            		</td>
                    
                    <td class="td_txt">
            			<?php echo $perfil; ?>
            		</td>
                    
                    <td>
                        
                        &nbsp;
                    
                    </td>
                    
                    <td class="td_fecha">
            			<?php echo date('d/m/Y', $ts); ?>
            		</td>
            		
            	</tr>
            <?php endforeach; ?>
            </table>
            
            <p class="nota"><img src="img/borrar.gif" /> Borrar <img src="img/modificar.gif" /> Modificar </p>
            
        <!--<div class="paging">
        	<?php echo $paginator->prev('<< '.__('anterior', true), array(), null, array('class'=>'disabled'));?>
            <?php echo $paginator->numbers();?>
        	<?php echo $paginator->next(__('siguiente', true).' >>', array(), null, array('class' => 'disabled'));?>
        </div>

        <div id="results">
            <p>
            <?php
            echo $paginator->counter(array(
            'format' => __('P&aacute;gina %page% de %pages%, mostrando %current% registros de %count%, del %start% al %end%', true)
            ));
            ?></p>
        </div>-->
