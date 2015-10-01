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
		$this->template->content->set('teacher_lists',Model_Teacher::to_list(Model_Teacher::find('all')));
	}

	public function action_attachment_lesson()
	{
		$this->template->title = '教員の授業割り当て';
		$this->template->content = View::forge('teacher/attachment_lesson');
	}

}