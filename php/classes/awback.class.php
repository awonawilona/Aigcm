<?php

class awback
{
    
    var $root = '/homepages/40/d389298220/htdocs';
    
    function getDBO()
    {
        $default = array(
    		'driver' => 'mysql',
    		'persistent' => false,
    		'host' => 'db417969347.db.1and1.com',
    		'login' => 'dbo417969347',
    		'password' => '1v1nt1s31',
    		'database' => 'db417969347',
    	);
        
        $conexion = mysql_connect($default['host'], $default['login'], $default['password']);
        
        mysql_select_db($default['database'], $conexion);
        
        return $conexion;
    }
    
    function getNoticias($socio = false)
    {
        $link = $this->getDBO();
        
        if($socio)
        {
            $query = 
        
                'SELECT '.
                
                'id, titulo, contenido, imagen '.
                
                'FROM '.
                
                'awo_noticias '.
                
                'WHERE portada = 1 '.
                
                'ORDER BY created_at DESC LIMIT 4';
        }
        else
        {
            $query = 
        
                'SELECT '.
                
                'id, titulo, contenido, imagen '.
                
                'FROM '.
                
                'awo_noticias '.
                
                'WHERE portada = 1 '.
                
                'AND socios = 0 '.
                
                'ORDER BY created_at DESC LIMIT 4';
        }
            
        $resNot = mysql_query($query, $link);
        
        $totNot = mysql_num_rows($resNot);
        
        $noticias = '';
        
        if($totNot > 0)
        {
            while($portada = mysql_fetch_object($resNot))
            {
                $noticias .= 
                
                '<p class="fecha">'.$portada->created_at.'</p>'.
                
                '<p>
                
                    <a href="#" class="titulo">
                    
                        '.$portada->titulo.'
                        
                    </a>
                     
                    <img src="'.$root.'/awback/app/webroot/img/noticias/img/thumbs/'.$portada->imagen.'" class="left" />
                    
                    '.$portada->contenido.'
                
                </p>';
            }
            
            return $noticias;
        }
    }
    
    function getBibliotecas()
    {
        $link = $this->getDBO();
        
        $query = 
        
            'SELECT '.
            
            'id, titulo, archivo '.
            
            'FROM '.
            
            'awo_biblioteca '.
            
            'WHERE estado = 1 '.
            
            'ORDER BY created_at';
            
        $resBiblio = mysql_query($query, $link);
        
        $totBiblio = mysql_num_rows($resBiblio);
        
        $bibliotecas = '';
        
        if($totBiblio > 0)
        {
            while($portada = mysql_fetch_object($resBiblio))
            {
                $bibliotecas .= 
                
                    '<li>
                        <a href="/awback/app/webroot/img/bibliotecas/'.$portada->archivo.'" target="_blank">
                            '.$portada->titulo.'
                        </a>
                    </li>';
            }
            
            return $bibliotecas;   
        }
    }
    
    function login()
    {
        $link = $this->getDBO();
        
        $username = $_POST['username'];
        
        $passwd = md5($_POST['passwd']);
        
        $query = 
        
            'SELECT COUNT(*)
            
            FROM 
            
            awo_usuarios 
            
            WHERE 
            
            username = "'.$username.'" AND password = "'.$passwd.'"';
            
        $resUser = mysql_query($query, $link);
            
        $totUser = mysql_num_rows($resUser);
    
        if($totUser == 1)
        {
            session_start();
            
            return true;   
        }
    }
        
}

?>