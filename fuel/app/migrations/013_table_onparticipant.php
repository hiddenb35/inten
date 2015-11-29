<?php

namespace Fuel\Migrations;

class Table_onparticipant
{
	public function up()
	{
		\DBUtil::create_table('onparticipant', array(
			'id'          => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => '学内説明会参加ID'),
			'oncampus_id' => array('type' => 'int', 'unsigned' => true, 'comment' => '学内説明会ID'),
			'student_id'  => array('type' => 'int', 'unsigned' => true, 'comment' => '生徒ID'),
			'entry_date'  => array('type' => 'int', 'comment' => '申し込んだ日'),
		), array('id'), true, false, null, array(
			array(
				'key'       => 'oncampus_id',
				'reference' => array(
					'table'  => 'oncampus',
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
		\DBUtil::drop_table('onparticipant');
	}
}