<?php 
/* SVN FILE: $Id$ */
/* AwoUsuariosController Test cases generated on: 2012-04-16 18:46:15 : 1334601975*/
App::import('Controller', 'AwoUsuarios');

class TestAwoUsuarios extends AwoUsuariosController {
	var $autoRender = false;
}

class AwoUsuariosControllerTest extends CakeTestCase {
	var $AwoUsuarios = null;

	function startTest() {
		$this->AwoUsuarios = new TestAwoUsuarios();
		$this->AwoUsuarios->constructClasses();
	}

	function testAwoUsuariosControllerInstance() {
		$this->assertTrue(is_a($this->AwoUsuarios, 'AwoUsuariosController'));
	}

	function endTest() {
		unset($this->AwoUsuarios);
	}
}
?>