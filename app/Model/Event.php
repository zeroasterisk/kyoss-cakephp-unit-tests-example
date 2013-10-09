<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 */
class Event extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'name';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'duration' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	/**
	 * Standard beforeSave callback
	 */
	public function beforeSave($options = array()) {
		if (empty($this->data['Event']['duration'])) {
			// auto-calculate duration if not set
			$this->data['Event']['duration'] = $this->calculateDuration($this->data);
			if (empty($this->data['Event']['duration'])) {
				unset($this->data['Event']['duration']);
			}
		}
		return parent::beforeSave($options);
	}

	/**
	 * Calculate a duration based on the start/stop dates provided for an event
	 *
	 * @param array $event
	 * @return int $duration in seconds
	 */
	public function calculateDuration($event) {
		if (empty($event['Event']['start'])) {
			// error case, should we throw an error?
			return 0;
		}
		if (empty($event['Event']['stop'])) {
			// default to 1 day if no stop
			return 86400;
		}
		$startEpoch = strtotime($event['Event']['start']);
		$stopEpoch = strtotime($event['Event']['stop']);
		$duration = $stopEpoch - $startEpoch;
		return $duration;
	}




}
