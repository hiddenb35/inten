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
		\DBUtil::create_index('course', array('code'), 'unique', 'unique');

	}

	public function down()
	{
		\DBUtil::drop_table('course');
	}
}