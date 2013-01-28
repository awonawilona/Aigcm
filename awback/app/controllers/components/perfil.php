<?php

class PerfilComponent extends Object
{
    var $controller = true;
    
    function getPerfil($username)
    {
        $modelo = ClassRegistry::init('AwoUsuario');
        
        if(!is_null($username))
        {
            $query = 'SELECT b.tipo AS perfil FROM awo_usuarios a JOIN awo_tipos_usuario b ON(a.tipo = b.id) WHERE a.username = "'.$username.'";';
        
            $perfil = $modelo->query($query);   
        }
        else
        {
          $perfil = NULL;  
        }
        
        
        return $perfil;
    }
}

?>