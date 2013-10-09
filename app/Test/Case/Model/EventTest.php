<?php
App::uses('Event', 'Model');

/**
 * Event Test Case
 *
 */
class EventTest extends CakeTestCase {

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = array(
		'app.event'
	);

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$this->Event = ClassRegistry::init('Event');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->Event);

		parent::tearDown();
	}


	public function testValidation() {
		$init = $event = $this->Event->read(null, 'event-1');

		$result = $this->Event->save($event);
		$this->assertEqual($event, $result);
		$this->assertTrue(empty($this->Event->validationErrors));

		$this->Event->create(false);
		$event['Event']['name'] = '';
		$this->assertFalse($this->Event->save($event));
		$this->assertEqual(array('name'), array_keys($this->Event->validationErrors));

		$this->Event->create(false);
		$event = $init;
		$event['Event']['duration'] = 'blah';
		$this->assertFalse($this->Event->save($event));
		$this->assertEqual(array('duration'), array_keys($this->Event->validationErrors));

	}

}
