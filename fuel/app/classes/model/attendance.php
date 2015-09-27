<?php

class Model_Attendance extends \Orm\Model
{
	protected static $_table_name = 'attendance';
	protected static $_primary_key = array('id');

	protected static $_properties = array(
		'id',
		'teacher_id' => array(
			'data_type' => 'int',
		),
		'lesson_id' => array(
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
		'teacher' => array(
			'model_to' => 'Model_Teacher',
			'key_from' => 'teacher_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'lesson' => array(
			'model_to' => 'Model_Lesson',
			'key_from' => 'lesson_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	public static function validate()
	{
		$val = Validation::forge();
		$val->add_callable('exvalidation');
		$val->add_field('teacher_id','教員ID','required|max_length[10]');
		$val->add_field('lesson_id','授業ID','required|max_length[10]');
		return $val;
	}
}