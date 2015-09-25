<?php

Class Model_Teacher extends \Orm\Model
{
	protected static $_table_name = 'teacher';
	protected static $_primary_key = array('id');

	protected static $_properties = array(
		'id',
		'username' => array(
			'data_type' => 'varchar',
		),
		'birthday' => array(
			'data_type' => 'date',
		),
		'password' => array(
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
		'attachment' => array(
			'model_to' => 'Model_Attachment',
			'key_from' => 'id',
			'key_to' => 'teacher_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'class' => array(
			'model_to' => 'Model_Class',
			'key_from' => 'id',
			'key_to' => 'teacher_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	public static function validate()
	{
		$val = Validation::forge();
		$val->add_callable('exvalidation');
		$val->add_field('username','教員番号','required|max_length[50]');
		$val->add_field('first_name','名','required|max_length[64]');
		$val->add_field('first_name_kana','名(カナ)','required|max_length[64]');
		$val->add_field('last_name','姓','required|max_length[64]');
		$val->add_field('last_name_kana','姓(カナ)','required|max_length[64]');
		$val->add_field('birthday','生年月日','required|max_length[10]');
		$val->add_field('password','パスワード','required|max_length[255]');
		$val->add_field('email','メールアドレス','required|max_length[255]|valid_email');
		$val->add_field('gender','性別','required|max_length[11]');
		$val->add_field('group','グループ','required|max_length[11]');
		$val->add_field('last_login','最終ログイン日時','required|max_length[25]');
		$val->add_field('profile_fields','備考','required');
		$val->add_field('login_hash','ログインハッシュ','required|max_length[255]');
		return $val;
	}
}