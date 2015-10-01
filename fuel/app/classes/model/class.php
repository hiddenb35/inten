<?php

class Model_Class extends \Orm\Model
{
	protected static $_table_name = 'class';
	protected static $_primary_key = array('id');

	protected static $_properties = array(
		'id',
		'name' => array(
			'data_type' => 'varchar',
		),
		'course_id' => array(
			'data_type' => 'int',
		),
		'teacher_id' => array(
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
		'course' => array(
			'model_to' => 'Model_Course',
			'key_from' => 'course_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	protected static $_has_many = array(
		'students' => array(
			'model_to' => 'Model_Student',
			'key_from' => 'id',
			'key_to' => 'class_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'lessons' => array(
			'model_to' => 'Model_Lesson',
			'key_from' => 'id',
			'key_to' => 'class_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'timetables' => array(
			'model_to' => 'Model_Timetable',
			'key_from' => 'id',
			'key_to' => 'class_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	public static function validate()
	{
		$val = Validation::forge();
		$val->add_callable('exvalidation');
		$val->add_field('name','クラス名','trim|required|max_length[64]')->add_rule('unique', 'class', 'name');
		$val->add_field('course_id','学科ID','required|max_length[10]');
		$val->add_field('teacher_id','教員ID','required|max_length[10]');
		return $val;
	}

	public static function to_list($classes)
	{
		$lists = array();

		foreach($classes as $class)
		{
			$array = array();
			$array['id'] = $class['id'];
			$array['name'] = $class['name'];
			$array['teacher_name'] = $class->teacher->last_name . ' ' . $class->teacher->first_name;
			$array['course_name'] = $class->course->name;
			$array['college_name'] = $class->course->college->name;
			$array['created_at'] = $class['created_at'];
			$array['updated_at'] = $class['updated_at'];

			$lists[] = $array;
		}

		return $lists;
	}
}