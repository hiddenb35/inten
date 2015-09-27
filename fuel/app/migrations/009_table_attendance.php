<?php

namespace Fuel\Migrations;

class Table_attendance
{
	public function up()
	{
		\DBUtil::create_table('attendance', array(
			'id'                => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => '出席ID'),
			'created_at'        => array('type' => 'int', 'comment' => '作成日時'),
			'updated_at'        => array('type' => 'int', 'null' => true, 'comment' => '更新日時'),
			'attendance_status' => array('type' => 'int', 'comment' => '出席ステータス'),
			'student_id'        => array('type' => 'int', 'unsigned' => true, 'comment' => '生徒ID'),
			'lesson_id'         => array('type' => 'int', 'unsigned' => true, 'comment' => '授業ID'),
		), array('id'), true, false, null, array(
			array(
				'key' => 'student_id',
				'reference' => array(
					'table' => 'student',
					'column' => 'id',
				),
			),
			array(
				'key' => 'lesson_id',
				'reference' => array(
					'table' => 'lesson',
					'column' => 'id',
				),
			),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('attendance');
	}
}