<?php

class NoticiasComponent extends Object
{
    var $controller = true;
    
    function getNoticias()
    {
        $modelo = ClassRegistry::init('AwoNoticia');
        
        $query = 'SELECT id, titulo, entradilla, contenido, created_at FROM awo_noticias ORDER BY created_at DESC LIMIT 3';
        
        $noticias = $modelo->query($query);
        
        return $noticias;
    }
}

?>