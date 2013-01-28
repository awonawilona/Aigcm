<?php 
/* SVN FILE: $Id$ */
/* AwoNoticiasController Test cases generated on: 2012-04-16 18:44:31 : 1334601871*/
App::import('Controller', 'AwoNoticias');

class TestAwoNoticias extends AwoNoticiasController {
	var $autoRender = false;
}

class AwoNoticiasControllerTest extends CakeTestCase {
	var $AwoNoticias = null;

	function startTest() {
		$this->AwoNoticias = new TestAwoNoticias();
		$this->AwoNoticias->constructClasses();
	}

	function testAwoNoticiasControllerInstance() {
		$this->assertTrue(is_a($this->AwoNoticias, 'AwoNoticiasController'));
	}

	function endTest() {
		unset($this->AwoNoticias);
	}
}
?>