<?php

class Model_Oncampus extends \Orm\Model
{
	protected static $_table_name = 'oncampus';
	protected static $_primary_key = array('id');

	protected static $properties = array(
		'id',
		'company_name' => array(
			'data_type' => 'varchar',
		),
		'company_code' => array(
			'data_type' => 'varchar',
		),
		'start_date' => array(
			'data_type' => 'date',
		),
		'start_time' => array(
			'data_type' => 'time',
		),
		'end_time' => array(
			'data_type' => 'time',
		),
		'entry_start' => array(
			'data_type' => 'date',
		),
		'entry_end' => array(
			'data_type' => 'date',
		),
		'target' => array(
			'data_type' => 'text',
		),
		'location' => array(
			'data_type' => 'varchar',
		),
		'content' => array(
			'data_type' => 'text',
		),
		'explainer' => array(
			'data_type' => 'varchar',
		),
		'bring' => array(
			'data_type' => 'text',
		),
		'url' => array(
			'data_type' => 'varchar',
		),
		'recruitment' => array(
			'data_type' => 'text',
		),
		'files' => array(
			'data_type' => 'text',
		),
		'note' => array(
			'data_type' => 'text',
		),
		'created_at' => array(
			'data_type' => 'int',
		),
		'updated_at' => array(
			'data_type' => 'int',
		),
		'teacher_id' => array(
			'data_type' => 'int',
		)
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
			'property' => 'created_at',
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_load'),
			'mysql_timestamp' => false,
			'property' => 'updated_at',
		),
	);


	protected static $_belongs_to = array(
		'teacher' => array(
			'model_to' => 'Model_Teacher',
			'key_from' => 'teacher_id',
			'key_to'   => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		)
	);

	protected static $_has_many = array(
		'participants' => array(
			'model_to' => 'Model_Onparticipant',
			'key_from' => 'id',
			'key_to'   => 'oncampus_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		)
	);
}