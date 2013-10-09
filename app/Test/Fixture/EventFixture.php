<?php
/**
 * EventFixture
 *
 */
class EventFixture extends CakeTestFixture {

	/**
	 * Fields
	 *
	 * @var array
	 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 256, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'start' => array('type' => 'datetime', 'null' => true, 'default' => null, 'key' => 'index'),
		'stop' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'duration' => array('type' => 'integer', 'null' => false, 'default' => '0', 'comment' => 'duration-in-seconds'),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'name' => array('column' => 'id', 'unique' => 0),
			'start' => array('column' => array('start', 'stop'), 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	/**
	 * Records
	 *
	 * @var array
	 */
	public $records = array(
		array(
			'id' => 'event-1',
			'created' => '2013-10-09 18:07:00',
			'modified' => '2013-10-09 18:07:00',
			'name' => 'Lorem ipsum dolor sit amet',
			'start' => '2013-01-01 00:00:00',
			'stop' => '2013-01-01 23:59:59',
			'duration' =>86399, // 86400 - 1
			'description' => 'Here is my first event',
		),
	);

}
