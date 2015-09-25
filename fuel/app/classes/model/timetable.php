<?php

Class Model_Timetable extends \Orm\Model
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
		$val->add_field('name','時間割','required|max_length[64]');
		$val->add_field('html','html','required');
		$val->add_field('class_id','クラスID','required|max_length[10]');
		$val->add_field('is_active','アクティブ情報','required|max_length[11]');
		return $val;
	}
}