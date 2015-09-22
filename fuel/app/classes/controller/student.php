<?php

class Controller_Student extends Controller_Loggedin
{
	public function action_add()
	{
		$this->template->title = '生徒の追加';
		$this->template->content = View::forge('student/student_add');
	}

	public function action_edit()
	{
		$this->template->title = '生徒の編集';
		$this->template->content = View::forge('student/student_edit');
	}

	public function action_list()
	{
		$this->template->title = '生徒の一覧';
		$this->template->content = View::forge('student/student_list');
	}

}