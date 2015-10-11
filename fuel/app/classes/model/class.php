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
		'Orm\Observer_Typing' => array(
			'events' => array('before_save', 'after_save', 'after_load')
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

	public static function validate($id = null)
	{
		$val = Validation::forge();
		$val->add_callable('exvalidation');
		$val->add_field('name','クラス名','trim|required|max_length[64]')->add_rule('unique', 'class', 'name', $id);
		$val->add_field('course_id','学科ID','required|max_length[10]')->add_rule('exist_id', 'course');
		$val->add_field('teacher_id','教員ID','required|max_length[10]')->add_rule('exist_id', 'teacher');
		return $val;
	}

	public static function to_lists($classes)
	{
		$lists = array();

		foreach($classes as $class)
		{
			$lists[] = self::to_list($class);
		}

		return $lists;
	}

	public static function to_list($class)
	{
		$list = array();

		$list['id'] = $class['id'];
		$list['name'] = $class['name'];
		$list['teacher_id'] = $class->teacher->id;
		$list['teacher_name'] = $class->teacher->last_name . ' ' . $class->teacher->first_name;
		$list['course_id'] = $class->course->id;
		$list['course_name'] = $class->course->name;
		$list['college_id'] = $class->course->college->id;
		$list['college_name'] = $class->course->college->name;
		$list['created_at'] = $class['created_at'];
		$list['updated_at'] = $class['updated_at'];

		return $list;
	}
}