<?php
class AwoConfig extends AppModel {

	var $name = 'AwoConfig';
	var $useTable = 'awo_config';
	var $validate = array(
		//'modulo' => array('numeric'),
		//'estado' => array('numeric'),
		'not_max_titulo' => array('numeric'),
		'not_max_entradilla' => array('numeric'),
		'not_max_contenido' => array('numeric'),
		'not_max_portada' => array('numeric'),
		'bibl_max_size' => array('numeric'),
		'gal_max_titulo' => array('numeric'),
		'gal_max_imagen' => array('numeric'),
		'gal_max_resumen' => array('numeric'),
		'gal_max_size' => array('numeric'),
		'gal_tb_width' => array('numeric'),
		'gal_tb_height' => array('numeric'),
		'gal_img_width' => array('numeric'),
		'gal_img_height' => array('numeric')
	);
    
    public function getModulos()
    {
        $modulos = $this->query('SELECT * FROM awo_modulos_activos AS modulos');
        
        return $modulos;
    }
    
    public function guardaModulos($modulo)
    {
        if((int)$modulo->noticias == 0)
        {            
            //$this->updateAll(array('awo_modulos_activos.estado' => '0'), array('awo_modulos_activos.id = ' => '1'));
            
            $this->query('UPDATE awo_modulos_activos SET estado = 0 WHERE id = 1');
        }
        else
        {
            //$this->updateAll(array('awo_modulos_activos.estado' => '1'), array('awo_modulos_activos.id = ' => '1'));
            
            $this->query('UPDATE awo_modulos_activos SET estado = 1 WHERE id = 1');
        }
        
        if((int)$modulo->galerias == 0)
        {
            $this->query('UPDATE awo_modulos_activos SET estado = 0 WHERE id = 2');
        }
        else
        {
            $this->query('UPDATE awo_modulos_activos SET estado = 1 WHERE id = 2');
        }
        
        if((int)$modulo->bibliotecas == 0)
        {
            $this->query('UPDATE awo_modulos_activos SET estado = 0 WHERE id = 3');
        }
        else
        {
            $this->query('UPDATE awo_modulos_activos SET estado = 1 WHERE id = 3');
        }
    }

}
?>