<?php

namespace Fuel\Migrations;

class Table_major
{
	public function up()
	{
		\DBUtil::create_table('major', array(
			'id'         => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => '専攻ID'),
			'name'       => array('type' => 'varchar', 'constraint' => 64, 'comment' => '専攻名'),
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

		\DB::insert('major')->columns(array('name', 'course_id'))
			->values(array('システム専攻', 1))
			->values(array('Web専攻', 1))
			->values(array('組み込み専攻', 1))
			->values(array('ネットワーク専攻', 1))
			->values(array('セキュリティ専攻', 1))
			->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('major');
	}
}