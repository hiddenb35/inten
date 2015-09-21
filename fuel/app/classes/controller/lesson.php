<?php

class Controller_Lesson extends Controller_Loggedin
{
	public function action_add()
	{
		$this->template->title = '授業の追加';
		$this->template->content = View::forge('lesson/lesson_add');
	}
}