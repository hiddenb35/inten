<?php

class Model_Status extends \Orm\Model
{
	protected static $_table_name = 'attendance_status';
	protected static $_primary_key = array('id');

	protected static $_properties = array(
		'id',
		'status' => array(
			'data_type' => 'int',
		),
		'student_id' => array(
			'data_type' => 'int',
		),
		'attendance_id' => array(
			'data_type' => 'int',
		),
		'created_at' => array(
			'data_type' => 'int',
		),
		'updated_at' => array(
			'data_type' => 'int',
		),
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
			'property' => 'created_at',
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
			'property' => 'updated_at',
		),
	);

	protected static $_belongs_to = array(
		'student' => array(
			'model_to' => 'Model_Student',
			'key_from' => 'student_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'attendance' => array(
			'model_to' => 'Model_Attendance',
			'key_from' => 'attendance_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	public static function validate()
	{
		$val = Validation::forge();
		$val->add_callable('exvalidation');
		$val->add_field('student_id','教員ID','required|max_length[10]')->add_rule('exist_id', 'student');
		$val->add_field('attendance_id','出席ID','required|max_length[10]')->add_rule('exist_id', 'attendance');
		return $val;
	}
}