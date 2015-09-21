<?php

namespace Fuel\Migrations;

class Table_attachment_lesson
{
	public function up()
	{
		\DBUtil::create_table('attachment_lesson', array(
			'id'         => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => '授業割当ID'),
			'teacher_id' => array('type' => 'int', 'unsigned' => true, 'comment' => '教員ID'),
			'lesson_id'  => array('type' => 'int', 'unsigned' => true, 'comment' => '授業ID'),
		), array('id'), true, false, null, array(
			array(
				'key'       => 'teacher_id',
				'reference' => array(
					'table'  => 'teacher',
					'column' => 'id',
				),
			),
			array(
				'key'       => 'lesson_id',
				'reference' => array(
					'table'  => 'lesson',
					'column' => 'id',
				),
			),
		));

	}

	public function down()
	{
		\DBUtil::drop_table('attachment_lesson');
	}
}