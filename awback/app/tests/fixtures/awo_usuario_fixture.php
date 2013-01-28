<?php 
/* SVN FILE: $Id$ */
/* AwoUsuario Fixture generated on: 2012-04-16 17:54:20 : 1334598860*/

class AwoUsuarioFixture extends CakeTestFixture {
	var $name = 'AwoUsuario';
	var $table = 'awo_usuarios';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'username' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'nombre' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'apellidos' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'password' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'email' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'tipo' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'created_at' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'updated_at' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'username' => 'Lorem ipsum dolor sit amet',
		'nombre' => 'Lorem ipsum dolor sit amet',
		'apellidos' => 'Lorem ipsum dolor sit amet',
		'password' => 'Lorem ipsum dolor sit amet',
		'email' => 'Lorem ipsum dolor sit amet',
		'tipo' => 1,
		'created_at' => '2012-04-16 17:54:20',
		'updated_at' => '2012-04-16 17:54:20'
	));
}
?>