<?php

namespace Fuel\Migrations;

class Table_lesson
{
	public function up()
	{
		\DBUtil::create_table('lesson', array(
			'id'         => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => '授業ID'),
			'name'       => array('type' => 'varchar', 'constraint' => 64, 'comment' => '授業名'),
			'term'       => array('type' => 'int', 'comment' => '前期or後期'),
			'sum_credit' => array('type' => 'int', 'unsigned' => true, 'comment' => '総単位数'),
			'created_at' => array('type' => 'int', 'comment' => '作成日時'),
			'updated_at' => array('type' => 'int', 'null' => true, 'comment' => '更新日時'),
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
		\DBUtil::drop_table('lesson');
	}
}