<?php 
/* SVN FILE: $Id$ */
/* AwoNoticia Test cases generated on: 2012-04-16 17:53:18 : 1334598798*/
App::import('Model', 'AwoNoticia');

class AwoNoticiaTestCase extends CakeTestCase {
	var $AwoNoticia = null;
	var $fixtures = array('app.awo_noticia');

	function startTest() {
		$this->AwoNoticia =& ClassRegistry::init('AwoNoticia');
	}

	function testAwoNoticiaInstance() {
		$this->assertTrue(is_a($this->AwoNoticia, 'AwoNoticia'));
	}

	function testAwoNoticiaFind() {
		$this->AwoNoticia->recursive = -1;
		$results = $this->AwoNoticia->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('AwoNoticia' => array(
			'id' => 1,
			'titulo' => 'Lorem ipsum dolor sit amet',
			'entradilla' => 'Lorem ipsum dolor sit amet',
			'imagen' => 'Lorem ipsum dolor sit amet',
			'archivo' => 'Lorem ipsum dolor sit amet',
			'contenido' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'estado' => 1,
			'portada' => 1,
			'created_at' => '2012-04-16 17:53:18',
			'updated_at' => '2012-04-16 17:53:18'
		));
		$this->assertEqual($results, $expected);
	}
}
?>