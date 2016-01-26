<?php

class Model_Session extends \Orm\Model
{
	protected static $_table_name = 'session';
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
			'data_type' => 'int',
		),
		'entry_end' => array(
			'data_type' => 'int',
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
		'entry_method' => array(
			'data_type' => 'text',
		),
		'tel' => array(
			'data_type' => 'varchar',
		),
		'email' => array(
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
			'model_to' => 'Model_Participant',
			'key_from' => 'id',
			'key_to'   => 'session_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		)
	);

	public static function validate()
	{
		$val = Validation::forge();
		$val->add_callable('exvalidation');
		$val->add_field('company_name', '企業名', 'trim|required|max_length[128]');
		$val->add_field('company_code', '企業コード', 'trim|required|max_length[64]');
		$val->add_field('start_date', '開催日', 'trim|required')->add_rule('valid_date', 'Y-m-d');
		$val->add_field('start_time', '開始時間', 'trim|required')->add_rule('valid_date', 'H:i');
		$val->add_field('end_time', '終了時間', 'trim|required')->add_rule('valid_date', 'H:i');
		$val->add_field('entry_start', '申込期限(開始)', 'trim|required')->add_rule('valid_date', 'Y-m-d H:i');
		$val->add_field('entry_end', '申込期限(終了)', 'trim|required')->add_rule('valid_date', 'Y-m-d H:i');
		$val->add_field('target', '対象者', 'trim');
		$val->add_field('location', '開催場所', 'trim|required');
		$val->add_field('content', '内容', 'trim');
		$val->add_field('explainer', '説明者', 'trim');
		$val->add_field('bring', '持ち物', 'trim');
		$val->add_field('url', 'URL', 'trim|valid_url');
		$val->add_field('entry_method', '申し込み方法', 'trim');
		$val->add_field('tel', '電話番号', 'trim');
		$val->add_field('email', 'メールアドレス', 'trim|valid_email');
		$val->add_field('recruitment','募集職種', 'valid_array');
		$val->add_field('note', '備考', 'trim');
		return $val;
	}

	public static function validate_edit()
	{
		$val = self::validate();
		$val->add_field('id', '学外説明会ID', 'trim|required')->add_rule('exist_id', 'session');
		return $val;
	}

	public static function to_lists($sessions)
	{
		$lists = array();

		foreach($sessions as $session)
		{
			$lists[] = self::to_list($session);
		}

		return $lists;
	}

	public static function to_list($session)
	{
		$list = array();

		$list['id'] = $session['id'];
		$list['company_name'] = $session['company_name'];
		$list['company_code'] = $session['company_code'];
		$list['start_date'] = $session['start_date'];
		$list['start_time'] = $session['start_time'];
		$list['end_time'] = $session['end_time'];
		$list['entry_start'] = $session['entry_start'];
		$list['entry_end'] = $session['entry_end'];
		$list['target'] = $session['target'];
		$list['location'] = $session['location'];
		$list['content'] = $session['content'];
		$list['explainer'] = $session['explainer'];
		$list['bring'] = $session['bring'];
		$list['url'] = $session['url'];
		$list['entry_method'] = $session['entry_method'];
		$list['tel'] = $session['tel'];
		$list['email'] = $session['email'];
		$list['recruitment'] = json_decode($session['recruitment'], true);
		$list['files'] = json_decode($session['files'], true);
		$list['note'] = $session['note'];
		$list['participant_link'] = Uri::create('session/participant', array(), array('id' => $session['id']));
		$list['detail_link'] = Uri::create('session/detail', array(), array('id' => $session['id']));
		$list['edit_link'] = Uri::create('session/edit', array(), array('id' => $session['id']));
		$list['delete_link'] = Uri::create('session/delete', array(), array('id' => $session['id']));
		$list['created_at'] = $session['created_at'];
		$list['updated_at'] = $session['updated_at'];

		return $list;
	}
}