<?php

namespace Fuel\Migrations;

class Table_student
{
	public function up()
	{
		\DBUtil::create_table('student', array(
			'id'              => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => '生徒ID'),
			'username'        => array('type' => 'varchar', 'constraint' => 50, 'comment' => '学籍番号'),
			'password'        => array('type' => 'varchar', 'constraint' => 255, 'comment' => 'パスワード'),
			'first_name'      => array('type' => 'varchar', 'constraint' => 64, 'comment' => '名'),
			'first_name_kana' => array('type' => 'varchar', 'constraint' => 64, 'comment' => '姓'),
			'last_name'       => array('type' => 'varchar', 'constraint' => 64, 'comment' => '名(カナ)'),
			'last_name_kana'  => array('type' => 'varchar', 'constraint' => 64, 'comment' => '姓(カナ)'),
			'group'           => array('type' => 'int', 'comment' => 'グループ'),
			'email'           => array('type' => 'varchar', 'constraint' => 255, 'comment' => 'メールアドレス'),
			'gender'          => array('type' => 'int', 'comment' => '性別'),
			'birthday'        => array('type' => 'date', 'comment' => '生年月日'),
			'last_login'      => array('type' => 'varchar', 'constraint' => 25, 'comment' => '最終ログイン日時'),
			'login_hash'      => array('type' => 'varchar', 'constraint' => 255, 'comment' => 'ログインハッシュ'),
			'profile_fields'  => array('type' => 'text', 'comment' => '備考'),
			'created_at'      => array('type' => 'int', 'comment' => '作成日時'),
			'updated_at'      => array('type' => 'int', 'comment' => '更新日時'),
			'class_id'        => array('type' => 'int', 'unsigned' => true, 'comment' => 'クラスID'),
			'major_id'        => array('type' => 'int', 'unsigned' => true, 'null' => true, 'comment' => '専攻ID'),
		), array('id'), true, false, null, array(
			array(
				'key'       => 'class_id',
				'reference' => array(
					'table'  => 'class',
					'column' => 'id',
				),
			),
			array(
				'key' => 'major_id',
				'reference' => array(
					'table' => 'major',
					'column' => 'id',
				),
			),
		));

	}

	public function down()
	{
		\DBUtil::drop_table('student');
	}
}