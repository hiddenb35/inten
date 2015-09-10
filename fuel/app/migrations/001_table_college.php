<?php

namespace Fuel\Migrations;

class Table_college
{
	function up()
	{
		\DBUtil::create_table('college', array(
			'id'         => array('type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'comment' => 'カレッジID'),
			'name'       => array('type' => 'varchar', 'constraint' => 64, 'comment' => 'カレッジ名'),
			'created_at' => array('type' => 'int', 'comment' => '作成日時'),
			'updated_at' => array('type' => 'int', 'comment' => '更新日時'),
		), array('id'));

		\DB::insert('college')->columns(array('name','created_at','updated_at'))
			->values(array('ITカレッジ'           , time(), 0))
			->values(array('クリエイターズカレッジ', time(), 0))
			->values(array('ミュージックカレッジ'  , time(), 0))
			->values(array('テクノロジーカレッジ'  , time(), 0))
			->execute();
	}

	function down()
	{
		\DBUtil::drop_table('college');
	}
}