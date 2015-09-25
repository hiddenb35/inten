<?php

class Controller_Major extends Controller_Loggedin
{
	public function action_add()
	{
		$this->template->title = '専攻の追加';
		$this->template->content = View::forge('major/major_add');
	}

	public function action_edit()
	{
		$this->template->title = '専攻の編集';
		$this->template->content = View::forge('major/major_edit');
	}

	public function action_list()
	{
		$this->template->title = '専攻一覧';
		$this->template->content = View::forge('major/major_list');
	}
}