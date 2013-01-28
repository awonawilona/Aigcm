<?php
class AwoModulo extends AppModel {

	var $name = 'AwoModulo';
	var $validate = array(
		'nombre' => array('notempty')
	);

}
?>