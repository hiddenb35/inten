<?php

namespace Fuel\Migrations;

class Table_Session
{
	public function up()
	{
		\DBUtil::create_table('session', array(
			'id' => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => '学外説明会ID'),
			'company_name' => array('type' => 'varchar', 'constraint' => 128, 'comment' => '企業名'),
			'company_code' => array('type' => 'varchar', 'constraint' => 64, 'comment' => '企業コード'),
			'start_date'   => array('type' => 'date', 'comment' => '開催日'),
			'start_time'   => array('type' => 'time', 'comment' => '開始時間'),
			'end_time'     => array('type' => 'time', 'comment' => '終了時間'),
			'entry_start'  => array('type' => 'int', 'comment' => '申し込み期限(開始)'),
			'entry_end'    => array('type' => 'int', 'comment' => '申込期限(終了)'),
			'target'       => array('type' => 'text', 'comment' => '対象者'),
			'location'     => array('type' => 'varchar', 'constraint' => 128, 'comment' => '開催場所'),
			'content'      => array('type' => 'text', 'comment' => '内容'),
			'explainer'    => array('type' => 'varchar', 'constraint' => 64, 'comment' => '説明者'),
			'bring'        => array('type' => 'text', 'comment' => '当日の持ち物'),
			'url'          => array('type' => 'varchar', 'constraint' => 255, 'comment' => '参考URL'),
			'entry_method' => array('type' => 'text', 'comment' => '申し込み方法'),
			'tel'          => array('type' => 'varchar', 'constraint' => 64, 'comment' => '電話番号'),
			'email'        => array('type' => 'varchar', 'constraint' => 255, 'comment' => 'メールアドレス'),
			'recruitment'  => array('type' => 'text', 'comment' => '募集職種'),
			'files'        => array('type' => 'text', 'comment' => '添付ファイル'),
			'note'         => array('type' => 'text', 'comment' => '備考'),
			'created_at'   => array('type' => 'int', 'comment' => '作成日時'),
			'updated_at'   => array('type' => 'int', 'null' => true, 'comment' => '更新日時'),
			'teacher_id'   => array('type' => 'int', 'unsigned' => true, 'comment' => '作成した教員ID'),
		), array('id'), true, false, null, array(
			array(
				'key' => 'teacher_id',
				'reference' => array(
					'table' => 'teacher',
					'column' => 'id',
				),
			)
		));

		\DBUtil::create_index('session', 'company_code', '', 'unique');
	}

	public function down()
	{
		\DBUtil::drop_table('session');
	}
}