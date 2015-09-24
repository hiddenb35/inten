<?php

Class Model_Class extends \Orm\Model
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

	protected static $_has_one = array(
		'student' => array(
			'model_to' => 'Model_Student',
			'key_from' => 'id',
			'key_to' => 'class_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'teacher' => array(
			'model_to' => 'Model_Teacher',
			'key_from' => 'teacher_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	protected static $_has_many = array(
		'lesson' => array(
			'model_to' => 'Model_Lesson',
			'key_from' => 'id',
			'key_to' => 'class_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'timetable' => array(
			'model_to' => 'Model_Timetable',
			'key_from' => 'id',
			'key_to' => 'class_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	protected static $_belongs_to = array(
		'course' => array(
			'model_to' => 'Model_Course',
			'key_from' => 'course_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);
}