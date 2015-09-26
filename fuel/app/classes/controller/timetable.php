<?php

class Controller_timetable extends Controller_Loggedin
{
	public function action_add()
	{
		$this->template->title = '時間割作成';
		$this->template->content = View::forge('timetable/timetable_add');
	}

	public function action_edit()
	{
		$this->template->title = '時間割編集';
		$this->template->content = View::forge('timetable/timetable_edit');
	}

	public function action_list()
	{
		$this->template->title = '時間割一覧';
		$this->template->content = View::forge('timetable/timetable_list');
	}
}