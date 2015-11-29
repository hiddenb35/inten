<?php

class Model_Onparticipant extends \Orm\Model
{
	protected static $_table_name = 'onparticipant';
	protected static $_primary_key = array('id');

	protected static $properties = array(
		'id',
		'oncampus_id' => array(
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
		'oncampus' => array(
			'model_to' => 'Model_Oncampus',
			'key_from' => 'oncampus_id',
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

	public static function validate()
	{
		$val = Validation::forge();
		$val->add_callable('exvalidation');
		$val->add_field('oncampus_id', '学内説明会ID', 'required|max_length[10]')->add_rule('exist_id', 'oncampus');
		$val->add_field('student_id', '生徒ID', 'required|max_length[10]')->add_rule('exist_id', 'student');
		return $val;
	}
}