<?php

class Model_Student extends \Orm\Model
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
		'major_id' => array(
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
		'attendance_statuses' => array(
			'model_to' => 'Model_Status',
			'key_from' => 'id',
			'key_to' => 'student_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	protected static $_belongs_to = array(
		'major' => array(
			'model_to' => 'Model_Major',
			'key_from' => 'major_id',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
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
		$val->add_field('username','学籍番号','trim|required|max_length[50]')->add_rule('unique', 'student', 'username');
		$val->add_field('first_name','名','trim|required|max_length[64]');
		$val->add_field('first_name_kana','名(カナ)','trim|required|max_length[64]');
		$val->add_field('last_name','姓','trim|required|max_length[64]');
		$val->add_field('last_name_kana','姓(カナ)','trim|required|max_length[64]');
		$val->add_field('birthday','生年月日','required|max_length[10]');
		$val->add_field('password','パスワード','required|max_length[255]');
		$val->add_field('email','メールアドレス','trim|required|max_length[255]|valid_email')->add_rule('unique', 'student', 'email');
		$val->add_field('gender','性別','required|max_length[11]');
		$val->add_field('group','グループ','required|max_length[11]');
		$val->add_field('last_login','最終ログイン日時','required|max_length[25]');
		$val->add_field('profile_fields','備考','required|max_length[255]');
		$val->add_field('login_hash','ログインハッシュ','required|max_length[255]');
		$val->add_field('class_id','クラスID','required|max_length[10]')->add_rule('exist_id', 'class');
		$val->add_field('major_id','専攻ID','max_length[10]');
		return $val;
	}

	public static function to_list($students)
	{
		$lists = array();

		foreach($students as $student)
		{
			$array = array();
			$array['id'] = $student['id'];
			$array['number'] = $student['username'];
			$array['full_name'] = $student['last_name'] . ' ' . $student['first_name'];
			$array['full_name_kana'] = $student['last_name_kana'] . ' ' . $student['first_name_kana'];
			$array['birthday'] = $student['birthday'];
			$array['email'] = $student['email'];
			$array['gender'] = $student['gender'];
			$array['last_login'] = $student['last_login'];
			$array['created_at'] = $student['created_at'];
			$array['updated_at'] = $student['updated_at'];
			$array['class_name'] = $student->class->name;
			$array['major_name'] = (isset($student->major->name)) ? $student->major->name : '';

			$lists[] = $array;
		}

		return $lists;
	}
}