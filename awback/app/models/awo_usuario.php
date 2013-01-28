<?php
class AwoUsuario extends AppModel {

	var $name = 'AwoUsuario';
	var $validate = array(
		'username' => array('notempty'),
		'nombre' => array('notempty'),
		'password' => array('notempty'),
		'email' => array('email'),
		'tipo' => array('numeric')
		//'created_at' => array('date'),
		//'updated_at' => array('date')
	);
    
    function validateLogin($data)
    {
        $user = $this->find(array('username' => $data['username'], 'password' => md5($data['password'])), array('id', 'username'));
        if(empty($user) == false)
            return $user['AwoUsuario'];
        return false;
    } 
}
?>