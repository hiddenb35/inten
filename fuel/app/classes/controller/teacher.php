<?php

class Controller_Teacher extends Controller_Loggedin
{
	public function action_add()
	{
		$this->template->title = '教員の追加';
		$this->template->content = View::forge('teacher/teacher_add');
	}

	public function action_edit()
	{
		$this->template->title = '教員の編集';
		$this->template->content = View::forge('teacher/teacher_edit');
	}

	public function action_list()
	{
		$this->template->title = '教員の一覧';
		$this->template->content = View::forge('teacher/teacher_list');
	}

	public function action_hrteacher()
	{
		$this->template->title = '教員の担任割り当て';
		$this->template->content = View::forge('teacher/hrteacher');
	}
}