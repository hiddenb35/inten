<?php

namespace Fuel\Migrations;

class Table_timetable
{
	public function up()
	{
		\DBUtil::create_table('timetable', array(
			'id'         => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => '時間割ID'),
			'name'       => array('type' => 'varchar', 'constraint' => 64, 'comment' => '時間割名'),
			'html'       => array('type' => 'text', 'comment' => '時間割内容'),
			'created_at' => array('type' => 'int', 'comment' => '作成日時'),
			'updated_at' => array('type' => 'int', 'comment' => '更新日時'),
			'is_active'  => array('type' => 'int', 'comment' => '有効フラグ'),
			'class_id'   => array('type' => 'int', 'unsigned' => true, 'comment' => 'クラスID'),
		), array('id'), true, false, null, array(
			array(
				'key'       => 'class_id',
				'reference' => array(
					'table'  => 'class',
					'column' => 'id',
				),
			),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('timetable');
	}
}