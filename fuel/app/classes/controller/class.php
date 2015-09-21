<?php

class Controller_Class extends Controller_Loggedin
{
	public function action_add()
	{
		$this->template->title = 'クラスの追加';
		$this->template->content = View::forge('class/class_add');
	}

	public function action_edit()
	{
		$this->template->title = 'クラスの編集';
		$this->template->content = View::forge('class/class_edit');
	}
}