<?php
/**
 * Database config
 *
 CREATE DATABASE `example_main`;
 CREATE DATABASE `example_test`;
 *
 */
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'dbuser',
		'password' => 'xxxxxxxxx',
		'database' => 'example_main',
	);

	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'dbuser',
		'password' => 'xxxxxxxxx',
		'database' => 'example_test',
	);

}
