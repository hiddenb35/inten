<?php

namespace Fuel\Migrations;

class Table_teacher
{
	public function up()
	{
		\DBUtil::create_table('teacher', array(
			'id'              => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => '教員ID'),
			'username'        => array('type' => 'varchar', 'constraint' => 50, 'comment' => '教員番号'),
			'password'        => array('type' => 'varchar', 'constraint' => 255, 'comment' => 'パスワード'),
			'first_name'      => array('type' => 'varchar', 'constraint' => 64, 'comment' => '名'),
			'first_name_kana' => array('type' => 'varchar', 'constraint' => 64, 'comment' => '姓'),
			'last_name'       => array('type' => 'varchar', 'constraint' => 64, 'comment' => '名(カナ)'),
			'last_name_kana'  => array('type' => 'varchar', 'constraint' => 64, 'comment' => '姓(カナ)'),
			'birthday'        => array('type' => 'date', 'comment' => '生年月日'),
			'group'           => array('type' => 'int', 'comment' => 'グループ'),
			'email'           => array('type' => 'varchar', 'constraint' => 255, 'comment' => 'メールアドレス'),
			'gender'          => array('type' => 'int', 'comment' => '性別'),
			'last_login'      => array('type' => 'varchar', 'constraint' => 25, 'comment' => '最終ログイン日時'),
			'login_hash'      => array('type' => 'varchar', 'constraint' => 255, 'comment' => 'ログインハッシュ'),
			'profile_fields'  => array('type' => 'text', 'comment' => '備考'),
			'created_at'      => array('type' => 'int', 'comment' => '作成日時'),
			'updated_at'      => array('type' => 'int', 'null' => true, 'comment' => '更新日時'),
		), array('id'));
		\DBUtil::create_index('teacher', 'username', '', 'unique');
		\DBUtil::create_index('teacher', 'email', '', 'unique');

	}

	public function down()
	{
		\DBUtil::drop_table('teacher');
	}
}