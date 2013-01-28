<?php
/* SVN FILE: $Id$ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset();     ?>
	<title>
		<?php //__('CakePHP: the rapid development php framework:'); ?>
		<?php 
            
            $current = $this->here;
            
            if($current === '/awback/' || $current === '/awback/pages' || $current === '/awback/pages/home')
            {
                echo 'awonawilona | desarrollo, dise&ntilde;o y programaci&oacute;n web';
            }
            else
            {
                $secciones = array('Awo Noticias' => 'Noticias', 'Awo Bibliotecas' => 'Bibliotecas', 'Awo Galeria' => 'Galer&iacute;as', 'Awo Usuarios' => 'Usuarios', 'Awo Configs' => 'Administraci&oacute;n');
            
        
                echo 'awonawilona | '.$secciones[$title_for_layout];  
            }
            
             ?>
	</title>
	<?php
		//echo $html->meta('icon');
        
        //var_dump($current);
        
        /**
         * Estilos AwBack
         */
        
        echo $html->css('reset');
        
        echo $html->css('layout');
        
        echo $html->css('format');
        
        echo $html->css('form');       
        
        echo $html->css('tables');

		echo $scripts_for_layout;
	?>
</head>
<body>
    
    <div id="header">
            <h1>awonawilona</h1>
            <h2>desarrollo, dise&ntilde;o y programaci&oacute;n Web</h2>
	</div>
    
    <?php 
    
    if(isset($perfil[0]['b']['perfil']))
    {
        $profile = $perfil[0]['b']['perfil'];
    }
    else
    {
        $profile = '';
    }
    
    echo $this->element('menu', array('perfil' => $profile));?>
 
	<div id="content">
    
		<?php $session->flash(); ?>

		<?php echo $content_for_layout; ?>
    
        <div id="footer">
        
            <a href="mailto:comunicacion@awonawilona.es">comunicacion@awonawilona.es</a>
    		
    	</div>
    
	</div>
	
	<?php //echo $cakeDebug; ?>
</body>
</html>