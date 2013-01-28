<?php 
/* SVN FILE: $Id$ */
/* AwoModulosController Test cases generated on: 2012-04-16 18:43:10 : 1334601790*/
App::import('Controller', 'AwoModulos');

class TestAwoModulos extends AwoModulosController {
	var $autoRender = false;
}

class AwoModulosControllerTest extends CakeTestCase {
	var $AwoModulos = null;

	function startTest() {
		$this->AwoModulos = new TestAwoModulos();
		$this->AwoModulos->constructClasses();
	}

	function testAwoModulosControllerInstance() {
		$this->assertTrue(is_a($this->AwoModulos, 'AwoModulosController'));
	}

	function endTest() {
		unset($this->AwoModulos);
	}
}
?>