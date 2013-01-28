<?php

class ArchivosComponent extends Object
{
    var $controller = true;

    function getArchivos()
    {
        $modelo = ClassRegistry::init('AwoBiblioteca');
        
        $query = 'SELECT a.id, a.titulo, b.tipo AS archivo FROM awo_biblioteca a JOIN awo_cat_archivos b ON ( a.tipo = b.id ) ORDER BY a.created_at DESC LIMIT 5';
        
        $archivos = $modelo->query($query);
        
        return $archivos;
    }
   
}

?>