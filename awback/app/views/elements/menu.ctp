<?php

$current = $this->here;

$partUrl = explode('/', $current);

echo

    '<div id="menu">';
            
            if(in_array('home', $partUrl) !== false)
            {
                echo 
                
                    /*'<a href="pages/home" class="activo">'.
            
                        'inicio'.
                    
                    '</a>';*/
                    
                    $html->link('inicio', '/pages/home', array('class' => 'activo'));
                    
            }
            else
            {
                echo 
                
                    $html->link('inicio', '/pages/home');
            }
            
            
            if(in_array('awo_noticias', $partUrl) !== false)
            {
                echo
                    
                    $html->link('noticias', '/awo_noticias', array('class' => 'activo'));
            }
            else
            {
                echo
                    
                    $html->link('noticias', '/awo_noticias');
            }
            
            if(in_array('awo_bibliotecas', $partUrl) !== false)
            {
                echo
                    
                    $html->link('bibliotecas', '/awo_bibliotecas', array('class' => 'activo'), null, null, false);
            }
            else
            {
                echo
                    
                    $html->link('bibliotecas', '/awo_bibliotecas', array(), null, null, false);
            }
            
            /*if(in_array('awo_galeria', $partUrl) !== false)
            {
                echo
                    
                    $html->link('im&aacute;genes', '/awo_galeria', array('class' => 'activo'), null, null, false);
            }
            else
            {
                echo
                    
                    $html->link('im&aacute;genes', '/awo_galeria', array(), null, null, false);
            }*/
            
            if($perfil === 'Administrador' || $perfil === 'Superadministrador')
            {
             
                if(in_array('awo_usuarios', $partUrl) && !in_array('login', $partUrl))
                {
                    echo
                        
                        $html->link('usuarios', '/awo_usuarios', array('class' => 'activo'));
                }
                else
                {
                    echo
                        
                        $html->link('usuarios', '/awo_usuarios');
                }
                
                if(in_array('awo_configs', $partUrl) !== false)
                {
                    echo
                        
                        $html->link('administraci&oacute;n', '/awo_configs/edit/1', array('class' => 'activo'), null, null, false);
                }
                else
                {
                    echo
                        
                        $html->link('administraci&oacute;n', '/awo_configs/edit/1', array(), null, null, false);
                }
                
            }
            
            echo
            
            
            $html->link('salir', '/awo_usuarios/logout').
            
            $html->link('ver sitio', 'http://www.aigcm.com/', array('target' => '_blank')).
    
    '</div>';