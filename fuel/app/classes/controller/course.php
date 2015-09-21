<?php

class Controller_Course extends Controller_Loggedin
{
	public function action_add()
	{
		$this->template->title = '学科の追加';
		$this->template->content = View::forge('course/course_add');
	}

	public function action_edit()
	{
		$this->template->title = '学科の編集';
		$this->template->content = View::forge('course/course_edit');
	}

	public function action_list()
	{
		$this->template->title = '学科一覧';
		$this->template->content = View::forge('course/course_list');
	}
}