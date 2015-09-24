<?php

class Model_Course extends \Orm\Model
{
	protected static $_table_name = 'course';
	protected static $_primary_key = array('id');

	protected static $_properties = array(
		'id',
		'code' => array(
			'data_type' => 'char',
		),
		'name' => array(
			'data_type' => 'varchar',
		),
		'year_system' => array(
			'data_type' => 'int',
		),
		'college_id' => array(
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

	protected static $_has_many = array(
		'class' => array(
			'model_to' => 'Model_Class',
			'key_from' => 'id',
			'key_to' => 'course_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	protected static $_belongs_to = array(
		'college' => array(
			'model_to' => 'Model_College',
			'key_from' => 'college_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);
}