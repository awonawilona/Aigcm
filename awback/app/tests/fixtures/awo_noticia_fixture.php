<?php 
/* SVN FILE: $Id$ */
/* AwoNoticia Fixture generated on: 2012-04-16 17:53:18 : 1334598798*/

class AwoNoticiaFixture extends CakeTestFixture {
	var $name = 'AwoNoticia';
	var $table = 'awo_noticias';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'titulo' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'entradilla' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'imagen' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'archivo' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'contenido' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'estado' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'portada' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'created_at' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'updated_at' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
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
}
?>