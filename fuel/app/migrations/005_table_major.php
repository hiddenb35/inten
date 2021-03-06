<?php

namespace Fuel\Migrations;

class Table_major
{
	public function up()
	{
		\DBUtil::create_table('major', array(
			'id'         => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => '専攻ID'),
			'name'       => array('type' => 'varchar', 'constraint' => 64, 'comment' => '専攻名'),
			'created_at' => array('type' => 'int', 'comment' => '作成日時'),
			'updated_at' => array('type' => 'int', 'null' => true, 'comment' => '更新日時'),
			'course_id'  => array('type' => 'int', 'unsigned' => true, 'comment' => '学科ID'),
		), array('id'), true, false, null, array(
			array(
				'key'       => 'course_id',
				'reference' => array(
					'table'  => 'course',
					'column' => 'id',
				),
			),
		));

	}

	public function down()
	{
		\DBUtil::drop_table('major');
	}
}