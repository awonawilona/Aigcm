<?php 
/* SVN FILE: $Id$ */
/* AwoGaleriaController Test cases generated on: 2012-04-16 18:41:38 : 1334601698*/
App::import('Controller', 'AwoGaleria');

class TestAwoGaleria extends AwoGaleriaController {
	var $autoRender = false;
}

class AwoGaleriaControllerTest extends CakeTestCase {
	var $AwoGaleria = null;

	function startTest() {
		$this->AwoGaleria = new TestAwoGaleria();
		$this->AwoGaleria->constructClasses();
	}

	function testAwoGaleriaControllerInstance() {
		$this->assertTrue(is_a($this->AwoGaleria, 'AwoGaleriaController'));
	}

	function endTest() {
		unset($this->AwoGaleria);
	}
}
?>