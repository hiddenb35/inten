<?php

namespace Fuel\Migrations;

class Table_course
{
	public function up()
	{
		\DBUtil::create_table('course', array(
			'id'         => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => '学科ID'),
			'name'       => array('type' => 'varchar', 'constraint' => 64, 'comment' => '学科名'),
			'created_at' => array('type' => 'int', 'comment' => '作成日時'),
			'updated_at' => array('type' => 'int', 'comment' => '更新日時'),
			'college_id' => array('type' => 'int', 'unsigned' => true, 'comment' => 'カレッジID'),
		), array('id'), true, false, null, array(
			array(
				'key'       => 'college_id',
				'reference' => array(
					'table'  => 'college',
					'column' => 'id',
				),
			),
		));

		\DB::insert('course')->columns(array('name','created_at','updated_at','college_id'))
			->values(array('ITスペシャリスト科', time(), 0, 1))
			->values(array('情報処理科', time(), 0, 1))
			->values(array('パソコン・ネットワーク科', time(), 0, 1))
			->values(array('情報ビジネス科', time(), 0, 1))
			->values(array('放送・映画科', time(), 0, 2))
			->values(array('声優・俳優科', time(), 0, 2))
			->values(array('ミュージックアーティスト科', time(), 0, 3))
			->values(array('コンサート・イベント科', time(), 0, 3))
			->values(array('電子・電気科', time(), 0, 4))
			->values(array('CAD設計製図科', time(), 0, 4))
			->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('course');
	}
}