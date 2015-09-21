<?php

Class Model_Lesson extends \Orm\Model
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
	);

	protected static $_has_many = array(
		'attendance' => array(
			'model_to' => 'Model_Attendance',
			'key_from' => 'id',
			'key_to' => 'lesson_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'attachment' => array(
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
}