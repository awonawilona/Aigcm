<?php
class AwoGalerium extends AppModel {

	var $name = 'AwoGalerium';
	var $validate = array(
		'titulo' => array('notempty')
		//'created_at' => array('date'),
		//'updated_at' => array('date')
	);

}
?>