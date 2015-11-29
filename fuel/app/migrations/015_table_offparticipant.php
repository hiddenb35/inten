<?php

namespace Fuel\Migrations;

class Table_offparticipant
{
	public function up()
	{
		\DBUtil::create_table('offparticipant', array(
			'id'          => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => '学外説明会参加ID'),
			'offcampus_id' => array('type' => 'int', 'unsigned' => true, 'comment' => '学外説明会ID'),
			'student_id'  => array('type' => 'int', 'unsigned' => true, 'comment' => '生徒ID'),
			'entry_at'  => array('type' => 'int', 'comment' => '申し込んだ日'),
		), array('id'), true, false, null, array(
			array(
				'key'       => 'offcampus_id',
				'reference' => array(
					'table'  => 'offcampus',
					'column' => 'id',
				),
			),
			array(
				'key'       => 'student_id',
				'reference' => array(
					'table'  => 'student',
					'column' => 'id',
				),
			)
		));

	}

	public function down()
	{
		\DBUtil::drop_table('offparticipant');
	}
}