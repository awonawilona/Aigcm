<h1><?php echo $cliente.' | '.$usuarioIdentificado?></h1>
	<!--<div class="column">
		<p>Etiam dignissim odio erat. Duis non erat metus. Maecenas venenatis, leo non hendrerit sagittis, odio nunc dictum massa, nec mollis est lacus sed dolor. In hac habitasse platea dictumst. </p>
	</div>
	<div class="column right">
		<p>Donec id convallis leo. Morbi id tincidunt lorem. Donec pulvinar, augue vitae pellentesque molestie, lacus velit commodo justo, sit amet tempor dolor diam quis nibh.</p>
	</div>-->
    
    <?php
    
        $javascript->link('biblioteca.js', false);
    
        $tam = (int)strlen($this->data['AwoBiblioteca']['titulo']);
        
        $total = (int)$config[0]['awo_config']['not_max_titulo'];
        
        $restante = $total - $tam;
        
        echo $form->create('AwoBiblioteca', array('enctype' => 'multipart/form-data'));
    
    ?>
    
    <h2>
    
        ARCHIVO<div>&nbsp;</div>
        
        <?php
        
            echo
        
            $form->input('socios', array('options' => array('1' => 'privado'), 'type' => 'checkbox'));
        
        ?>
        
    </h2>
<?php 
    
    
    
    echo $form->input('id');
    echo $form->input('Titulo', array('label' => array('for' => 'AwoBibliotecaTitulo'), 'id' => 'AwoBibliotecaTitulo', 'name' => 'data[AwoBiblioteca][titulo]', 'maxlenght' => $config[0]['awo_config']['not_max_titulo'], 'value' => $this->data['AwoBiblioteca']['titulo'], 'onKeyUp' => 'cuentaCaracteres('.$config[0]['awo_config']['not_max_titulo'].');'));
    echo '<div id="contador" class="contador">Caracteres: '.$tam.' de '.$restante.'</div>';  
    echo $form->input('Archivo', array('between'=>'<br />','type'=>'file'));
    
    $options = array('pdf' => 'PDF', 'www' => 'WWW', 'doc' => 'DOC', 'xls' => 'XLS');
    
    echo $form->input('Tipo de Archivo', array('options' => $options, 'type'=>'radio', 'value' => $idTipoArch[0]['awo_cat_archivos']['tipo']));
    //echo $form->input('estado');
    //echo $form->input('portada');
    /*echo $form->input('created_at');
    echo $form->input('updated_at');*/
	?>
<?php echo $form->end('Publicar');?>

