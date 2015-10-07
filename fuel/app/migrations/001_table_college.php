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
			'updated_at' => array('type' => 'int', 'null' => true, 'comment' => '更新日時'),
		), array('id'));
		\DBUtil::create_index('college', array('name'), 'unique', 'unique');

	}

	function down()
	{
		\DBUtil::drop_table('college');
	}
}