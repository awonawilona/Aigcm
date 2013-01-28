<?php 
/* SVN FILE: $Id$ */
/* AwoUsuario Test cases generated on: 2012-04-16 17:54:20 : 1334598860*/
App::import('Model', 'AwoUsuario');

class AwoUsuarioTestCase extends CakeTestCase {
	var $AwoUsuario = null;
	var $fixtures = array('app.awo_usuario');

	function startTest() {
		$this->AwoUsuario =& ClassRegistry::init('AwoUsuario');
	}

	function testAwoUsuarioInstance() {
		$this->assertTrue(is_a($this->AwoUsuario, 'AwoUsuario'));
	}

	function testAwoUsuarioFind() {
		$this->AwoUsuario->recursive = -1;
		$results = $this->AwoUsuario->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('AwoUsuario' => array(
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
		$this->assertEqual($results, $expected);
	}
}
?>