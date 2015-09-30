<?php

class Controller_Lesson extends Controller_Loggedin
{
	public function action_add()
	{
		$this->template->title = '授業の追加';
		$this->template->content = View::forge('lesson/lesson_add');
	}

	public function action_list()
	{
		$this->template->title = '授業一覧';
		$this->template->content = View::forge('lesson/lesson_list');
		$this->template->content->set('lesson_lists',Model_Lesson::get_list());
	}
}