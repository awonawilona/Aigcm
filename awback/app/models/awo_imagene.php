<?php
class AwoImagene extends AppModel {

	var $name = 'AwoImagene';
	var $validate = array(
		'titulo' => array('notempty'),
		'estado' => array('numeric'),
		//'created_at' => array('date'),
		//'updated_at' => array('date')
	);

}
?>