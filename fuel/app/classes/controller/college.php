<?php

class Controller_College extends Controller_Loggedin
{
	public function action_add()
	{
		$this->template->title = 'カレッジの追加';
		$this->template->content = View::forge('college/college_add');
	}

	public function action_edit()
	{
		$this->template->title = 'カレッジの編集';
		$this->template->content = View::forge('college/college_update');
	}

	public function action_list()
	{
		$this->template->title = 'カレッジ一覧';
		$this->template->content = View::forge('college/college_list');
	}
}