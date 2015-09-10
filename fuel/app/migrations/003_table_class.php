<?php

namespace Fuel\Migrations;

class Table_class
{
	public function up()
	{
		\DBUtil::create_table('class', array(
			'id'         => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => 'クラスID'),
			'name'       => array('type' => 'varchar', 'constraint' => 64, 'comment' => 'クラス名'),
			'created_at' => array('type' => 'int', 'comment' => '作成日時'),
			'updated_at' => array('type' => 'int', 'comment' => '更新日時'),
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

		\DB::insert('class')->columns(array('name','created_at','updated_at','course_id'))
			->values(array('IS-07',time(),0,1))
			->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('class');
	}
}