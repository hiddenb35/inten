<?php

class Model_Major extends \Orm\Model
{
	protected static $_table_name = 'major';
	protected static $_primary_key = array('id');

	protected static $_properties = array(
		'id',
		'name' => array(
			'data_type' => 'varchar',
		),
		'course_id' => array(
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

	public static $_has_one = array(
		'course' => array(
			'model_to' => 'Model_Course',
			'key_from' => 'course_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	public static $_has_many = array(
		'student' => array(
			'model_to' => 'Model_Student',
			'key_from' => 'id',
			'key_to' => 'major_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	public static function validate()
	{
		$val = Validation::forge();
		$val->add_callable('exvalidation');
		$val->add_field('name','専攻名','trim|required|max_length[64]')->add_rule('unique', 'major', 'name');
		$val->add_field('course_id','学科ID','required|max_length[10]');
		return $val;
	}
}
