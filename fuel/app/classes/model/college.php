<?php

class Model_College extends \Orm\Model
{
	protected static $_table_name = 'college';
	protected static $_primary_key = array('id');

	protected static $_properties = array(
		'id',
		'name' => array(
			'data_type' => 'varchar',
		),
		'created_at' => array(
			'data_type' => 'int'
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
		'courses' => array(
			'model_to' => 'Model_Course',
			'key_from' => 'id',
			'key_to' => 'college_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	public static function validate()
	{
		$val = Validation::forge();
		$val->add_callable('exvalidation');
		$val->add_field('name','カレッジ名','trim|required|max_length[64]')->add_rule('unique', 'college', 'name');
		return $val;
	}
}