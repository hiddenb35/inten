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
		), array('id'), true, false, null, array(
			array(
				'key'       => 'class_id',
				'reference' => array(
					'table'  => 'class',
					'column' => 'id',
				),
			),
		));

		\Auth::instance('studentauth')
			->create_student('k013c1129','watanabe','1994/9/3','ywatanabeznzt@gmail.com',0,'優樹','ユウキ',
				'渡辺','ワタナベ',1);
		\Auth::instance('studentauth')
			->create_student('k013c1112','narumi','1994/10/13','k013c1112@it-neec.jp',0,'翔太','ショウタ',
				'鳴海','ナルミ',1);
		\Auth::instance('studentauth')
			->create_student('k013c1345','kasai','1994/12/30','k013c1345@it-neec.jp',0,'啓太','ケイタ',
				'笠井','カサイ',1);
		\Auth::instance('studentauth')
			->create_student('k013c1140','kato','1994/10/12','k013c1140@it-neec.jp',0,'拓磨','タクマ',
				'加藤','カトウ',1);
		\Auth::instance('studentauth')
			->create_student('k013c1118','ashizawa','1993/5/25','k013c1118@it-neec.jp',0,'勇輝','ユウキ',
				'芦沢','アシザワ',1);
	}

	public function down()
	{
		\DBUtil::drop_table('student');
	}
}