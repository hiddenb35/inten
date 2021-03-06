<?php

class Model_Lesson extends \Orm\Model
{
	protected static $_table_name = 'lesson';
	protected static $_primary_key = array('id');

	protected static $_properties = array(
		'id',
		'name' => array(
			'data_type' => 'varchar',
		),
		'term' => array(
			'data_type' => 'int',
		),
		'sum_credit' => array(
			'data_type' => 'int',
		),
		'class_id' => array(
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

	protected static $_has_many = array(
		'attendances' => array(
			'model_to' => 'Model_Attendance',
			'key_from' => 'id',
			'key_to' => 'lesson_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'attachment_lessons' => array(
			'model_to' => 'Model_Attachment',
			'key_from' => 'id',
			'key_to' => 'lesson_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	protected static $_belongs_to = array(
		'class' => array(
			'model_to' => 'Model_Class',
			'key_from' => 'class_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	public static function validate()
	{
		$val = Validation::forge();
		$val->add_field('name','授業名','trim|required|max_length[64]');
		$val->add_field('term','前期or後期','required|max_length[11]');
		$val->add_field('sum_credit','総単位数','trim|required|max_length[10]');
		$val->add_field('class_id','クラスID','required|max_length[10]');
		return $val;
	}

	public static function to_lists($lessons)
	{
		$lists = array();

		foreach($lessons as $lesson)
		{
			$lists[] = self::to_list($lesson);
		}

		return $lists;
	}

	public static function to_list($lesson)
	{
		$list = array();

		$list['id'] = $lesson['id'];
		$list['name'] = $lesson['name'];
		$list['term'] = $lesson['term'];
		$list['sum_credit'] = $lesson['sum_credit'];
		$list['class_name'] = $lesson->class->name;
		$teachers = array();
		foreach($lesson->attachment_lessons as $attach)
		{
			$teachers[] = $attach->teacher->last_name . ' ' . $attach->teacher->first_name;
		}

		$list['teacher_name'] = implode(',', $teachers);

		return $list;
	}
}