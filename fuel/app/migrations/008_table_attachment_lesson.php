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

		\DB::insert('attachment_lesson')->columns(array('teacher_id','lesson_id'))
			->values(array(1,1))->execute();
		\DB::insert('attachment_lesson')->columns(array('teacher_id','lesson_id'))
			->values(array(1,2))->execute();
		\DB::insert('attachment_lesson')->columns(array('teacher_id','lesson_id'))
			->values(array(1,3))->execute();
		\DB::insert('attachment_lesson')->columns(array('teacher_id','lesson_id'))
			->values(array(1,4))->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('attachment_lesson');
	}
}