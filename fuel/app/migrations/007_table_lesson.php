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
			'updated_at' => array('type' => 'int', 'comment' => '更新日時'),
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

		\DB::insert('lesson')
			->columns(array('name','term','sum_credit','created_at','updated_at','class_id'))
			->values(array('資格対策講座',0,40,time(),0,1))
			->execute();

		\DB::insert('lesson')
			->columns(array('name','term','sum_credit','created_at','updated_at','class_id'))
			->values(array('C言語プログラミング',0,60,time(),0,1))
			->execute();

		\DB::insert('lesson')
			->columns(array('name','term','sum_credit','created_at','updated_at','class_id'))
			->values(array('経営科学',0,34,time(),0,1))
			->execute();

		\DB::insert('lesson')
			->columns(array('name','term','sum_credit','created_at','updated_at','class_id'))
			->values(array('Javaプログラミング',0,62,time(),0,1))
			->execute();

		\DB::insert('lesson')
			->columns(array('name','term','sum_credit','created_at','updated_at','class_id'))
			->values(array('Linux実習',0,55,time(),0,1))
			->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('lesson');
	}
}