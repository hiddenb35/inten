<?php

namespace Fuel\Migrations;

class Table_course
{
	public function up()
	{
		\DBUtil::create_table('course', array(
			'id'          => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => '学科ID'),
			'code'        => array('type' => 'char', 'constraint' => 2, 'unique' => true, 'comment' => '学科コード'),
			'name'        => array('type' => 'varchar', 'constraint' => 64, 'comment' => '学科名'),
			'year_system' => array('type' => 'int', 'unsigned' => true, 'comment' => '年制'),
			'created_at'  => array('type' => 'int', 'comment' => '作成日時'),
			'updated_at'  => array('type' => 'int', 'comment' => '更新日時'),
			'college_id'  => array('type' => 'int', 'unsigned' => true, 'comment' => 'カレッジID'),
		), array('id'), true, false, null, array(
			array(
				'key'       => 'college_id',
				'reference' => array(
					'table'  => 'college',
					'column' => 'id',
				),
			),
		));

		\DB::insert('course')->columns(array('code','name','year_system','created_at','updated_at','college_id'))
			->values(array('IS', 'ITスペシャリスト科', 4, time(), 0, 1))
			->values(array('CD', '情報処理科', 2, time(), 0, 1))
			->values(array('NT', 'パソコン・ネットワーク科', 2, time(), 0, 1))
			->values(array('J2', '情報ビジネス科', 2, time(), 0, 1))
			->values(array('BD', '放送・映画科', 2, time(), 0, 2))
			->values(array('AD', '声優・俳優科', 2, time(), 0, 2))
			->values(array('MU', 'ミュージックアーティスト科', 2, time(), 0, 3))
			->values(array('CE', 'コンサート・イベント科', 2, time(), 0, 3))
			->values(array('E2', '電子・電気科', 2, time(), 0, 4))
			->values(array('ID', 'CAD設計製図科', 2, time(), 0, 4))
			->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('course');
	}
}