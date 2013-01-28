<?php

class AwoBiblioteca extends AppModel {

	var $name = 'AwoBiblioteca';
	var $useTable = 'awo_biblioteca';
	var $validate = array(
		'titulo' => array('notempty'),
		'tipo' => array('numeric'),
		'archivo' => array('notempty'),
		'estado' => array('numeric')
		//'created_at' => array('date'),
		//'updated_at' => array('date')
	);
    
    var $allowedMime = array('application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/msword',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            'text/html',
                            'application/pdf', 
                            'application/x-unknown');
    
    function getBibliotecaParams()
    {
        $config = $this->query('SELECT not_max_titulo, bibl_file_type, bibl_max_size FROM awo_config');
        
        return $config;
    }
    
    function validaTipo($data)
    {
        $tipo = $data['AwoBiblioteca']['Tipo de Archivo'];
        
        if(strlen($tipo) == 0)
        {
            return false;
        }
        else
        {
            $query = 'SELECT id FROM awo_cat_archivos WHERE tipo = "'.$tipo.'"';
        
            $idArch = $this->query($query);
            
            return $idArch[0]['awo_cat_archivos']['id'];
        }
    }
    
    function cargaArchivo($data)
    {
        $dir = 'img/bibliotecas';
        
        $infoArchivo = $data['AwoBiblioteca']['Archivo'];
        
        if(in_array($infoArchivo['type'], $this->allowedMime))
        {
            $saveAs = $dir.DS.$infoArchivo['name'];
            
            if(!file_exists($saveAs))
            {
                if(move_uploaded_file($infoArchivo['tmp_name'], $saveAs))
                {
                    return $infoArchivo['name'];
                }
            }
            else
            {
                return $infoArchivo['name'];
            }
        }        
    }
    
    function getIdArch($data)
    {
        $query = 'SELECT tipo FROM awo_cat_archivos WHERE id = '.$data['AwoBiblioteca']['tipo'].'';
        
        $tipoArch = $this->query($query);
        
        return $tipoArch;       
        
    }

}
?>