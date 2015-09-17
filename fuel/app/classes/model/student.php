<?php

Class Model_Student extends \Orm\Model
{
	protected static $_table_name = 'student';
	protected static $_primary_key = array('id');

	protected static $_properties = array(
		'id',
		'username' => array(
			'data_type' => 'varchar',
		),
		'first_name' => array(
			'data_type' => 'varchar',
		),
		'first_name_kana' => array(
			'data_type' => 'varchar',
		),
		'last_name' => array(
			'data_type' => 'varchar',
		),
		'last_name_kana' => array(
			'data_type' => 'varchar',
		),
		'birthday' => array(
			'data_type' => 'date',
		),
		'password' => array(
			'data_type' => 'varchar',
		),
		'email' => array(
			'data_type' => 'varchar',
		),
		'gender' => array(
			'data_type' => 'int',
		),
		'group' => array(
			'data_type' => 'int',
		),
		'last_login' => array(
			'data_type' => 'varchar',
		),
		'profile_fields' => array(
			'data_type' => 'text',
		),
		'login_hash' => array(
			'data_type' => 'varchar',
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
			'key_to' => 'student_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);
}