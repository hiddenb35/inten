<?php

class Model_Offparticipant extends \Orm\Model
{
	protected static $_table_name = 'offparticipant';
	protected static $_primary_key = array('id');

	protected static $properties = array(
		'id',
		'offcampus_id' => array(
			'data_type' => 'int',
		),
		'student_id' => array(
			'data_type' => 'int',
		),
		'entry_at' => array(
			'data_type' => 'int',
		),
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
			'property' => 'entry_at',
		),
	);


	protected static $_belongs_to = array(
		'offcampus' => array(
			'model_to' => 'Model_Offcampus',
			'key_from' => 'offcampus_id',
			'key_to'   => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'student' => array(
			'model_to' => 'Model_Student',
			'key_from' => 'student_id',
			'key_to'   => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);
}