<?php

namespace Fuel\Migrations;

class Table_attendance_status
{
	public function up()
	{
		\DBUtil::create_table('attendance_status', array(
			'id'                => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => '出席ID'),
			'status'            => array('type' => 'int', 'comment' => '出席ステータス'),
			'created_at'        => array('type' => 'int', 'comment' => '作成日時'),
			'updated_at'        => array('type' => 'int', 'null' => true, 'comment' => '更新日時'),
			'student_id'        => array('type' => 'int', 'unsigned' => true, 'comment' => '生徒ID'),
			'attendance_id'     => array('type' => 'int', 'unsigned' => true, 'comment' => '出席ID'),
		), array('id'), true, false, null, array(
			array(
				'key' => 'student_id',
				'reference' => array(
					'table' => 'student',
					'column' => 'id',
				),
			),
			array(
				'key' => 'attendance_id',
				'reference' => array(
					'table' => 'attendance',
					'column' => 'id',
				),
			),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('attendance_status');
	}
}