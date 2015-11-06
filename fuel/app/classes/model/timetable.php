<?php

class Model_Timetable extends \Orm\Model
{
	protected static $_table_name = 'timetable';
	protected static $_primary_key = array('id');

	protected static $_properties = array(
		'id',
		'name' => array(
			'data_type' => 'varchar',
		),
		'html' => array(
			'data_type' => 'html',
		),
		'class_id' => array(
			'data_type' => 'int',
		),
		'is_active' => array(
			'data_type' => 'bool',
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
		$val->add_callable('exvalidation');
		$val->add_field('name','時間割','trim|required|max_length[64]');
		$val->add_field('json','html','required|timetable_json');
		$val->add_field('class_id','クラスID','required|max_length[10]')->add_rule('exist_id', 'class');
		$val->add_field('is_active','アクティブ情報','max_length[11]');
		return $val;
	}

	public static function validate_edit()
	{
		$val = self::validate();
		$val->add_field('id', '時間割ID', 'trim|required')->add_rule('exists_id', 'timetable');
		return $val;
	}

	public static function to_lists($timetables)
	{
		$lists = array();
		foreach($timetables as $timetable)
		{
			$lists[] = self::to_list($timetable);
		}

		return $lists;
	}

	public static function to_list($timetable)
	{
		$list = array();

		$list['name'] = $timetable['name'];
		$list['created_at'] = date('Y/m/d H:i:s', $timetable['created_at']);
		$list['updated_at'] = (is_null($timetable['updated_at'])) ? '' : date('Y/m/d H:i:s', $timetable['updated_at']);
		$list['status'] = ($timetable['is_active']) ? '有効' : '無効';
		$list['edit_link'] = Uri::create('timetable/edit', array(), array('class_id' => $timetable['class_id'], 'id' => $timetable['id']));
		$list['delete_link'] = Uri::create('timetable/delete', array(), array('id' => $timetable['id']));

		return $list;
	}
}