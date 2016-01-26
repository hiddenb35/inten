<?php

namespace Fuel\Migrations;

class Table_participant
{
	public function up()
	{
		\DBUtil::create_table('participant', array(
			'id'          => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => '学外説明会参加ID'),
			'session_id' => array('type' => 'int', 'unsigned' => true, 'comment' => '学外説明会ID'),
			'student_id'  => array('type' => 'int', 'unsigned' => true, 'comment' => '生徒ID'),
			'entry_at'  => array('type' => 'int', 'comment' => '申し込んだ日'),
		), array('id'), true, false, null, array(
			array(
				'key'       => 'session_id',
				'reference' => array(
					'table'  => 'session',
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
		\DBUtil::drop_table('participant');
	}
}