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
		'Orm\Observer_Typing' => array(
			'events' => array('before_save', 'after_save', 'after_load')
		),
	);

	public static $_belongs_to = array(
		'course' => array(
			'model_to' => 'Model_Course',
			'key_from' => 'course_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	public static $_has_many = array(
		'students' => array(
			'model_to' => 'Model_Student',
			'key_from' => 'id',
			'key_to' => 'major_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	public static function validate($id = null)
	{
		$val = Validation::forge();
		$val->add_callable('exvalidation');
		$val->add_field('name','専攻名','trim|required|max_length[64]')->add_rule('unique', self::$_table_name, 'name', $id);
		$val->add_field('course_id','学科ID','required|max_length[10]')->add_rule('exist_id', 'course');
		return $val;
	}

	public static function validate_edit($id = null)
	{
		$val = self::validate($id);
		$val->add_field('id', '専攻ID', 'trim|required')->add_rule('exist_id', self::$_table_name);
		return $val;
	}

	public static function to_lists($majors)
	{
		$lists = array();

		foreach($majors as $major)
		{
			$lists[] = self::to_list($major);
		}

		return $lists;
	}

	public static function to_list($major)
	{
		$list = array();

		$list['id'] = $major['id'];
		$list['name'] = $major['name'];
		$list['created_at'] = $major['created_at'];
		$list['updated_at'] = $major['updated_at'];
		$list['course_id'] = $major->course->id;
		$list['course_name'] = $major->course->name;
		$list['college_id'] = $major->course->college->id;
		$list['college_name'] = $major->course->college->name;

		return $list;
	}
}
